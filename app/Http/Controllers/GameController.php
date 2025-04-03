<?php

namespace App\Http\Controllers;

use App\Models\GameList;
use App\Models\GameScore;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GameController extends Controller
{


    public function getPuzzel()
    {

        $url = "http://marcconrad.com/uob/banana/api.php?out=json&base64=yes";

        try {
            $response = Http::get($url);
            if ($response->successful()) {
                $data = $response->json();
                return response()->json($data);
            } else {
                return response()->json(['error' => 'Failed to fetch puzzle data'], $response->status());
            }
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong', 'message' => $e->getMessage()], 500);
        }
    }

    public function showHome()
    {

        $user_id = auth()->user()->id;

        $this->deletePendingRecords($user_id);

        $game_hitory_data = GameScore::from('game_score_details as gsd')
            ->leftJoin('game_list as gl', 'gl.id', '=', 'gsd.game_id')
            ->leftJoin('users as u', 'u.id', '=', 'gsd.user_id')
            ->where('gsd.status', 'complete')
            ->select(
                'u.name as user_name',
                'gl.name as game_name',
                'gsd.level',
                'gsd.logged_ip',
                'gsd.user_id',
                DB::raw("SEC_TO_TIME(TIME_TO_SEC('03:00') - TIME_TO_SEC(gsd.time_taken)) as time_taken")
            )
            ->orderBy('gl.name', 'DESC')
            ->orderByRaw("TIME_TO_SEC(gsd.time_taken) DESC")
            ->get();

        $user_level = GameScore::where("user_id", $user_id)->max('level');
        // $user_level = GameScore::where("user_id", $user_id)->max('level');
        $game_list =  GameList::all();

        return view('dashboard', compact('game_hitory_data', 'game_list', 'user_level'));
    }
    public function showGameRoom($id)
    {

        $url = "https://ipinfo.io/json";
        $logged_ip = null;

        try {
            $response = Http::get($url);
            if ($response->successful()) {

                $data = $response->json();
                $logged_ip = $data['ip'];
            }

            $user_game_data =  GameScore::create([
                'game_id' => $id,
                'user_id' => auth()->user()->id,
                'logged_ip' =>  $logged_ip,
                'logged_time' => Carbon::now(),
            ]);

            // return view('room.room_2');
            return view('room.room_' . $id)->with("gsmeLogId", $user_game_data->id);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong', 'message' => $e->getMessage()], 500);
        }
    }

    public function gameComeplete($id, $time)
    {

        try {
            $user_id = auth()->user()->id;

            $game_lof_data = GameScore::findOrFail($id);

            if ($game_lof_data) {
                $game_lof_data->time_taken = $time;
                $game_lof_data->status = 'complete';
                $game_lof_data->level  = $game_lof_data->game_id + 1;
                $game_lof_data->update();
            }
            $this->deletePendingRecords($user_id);
        } catch (\Throwable $e) {
            Log::info($e->getMessage());
        }
    }

    public function deletePendingRecords($user_id)
    {
        GameScore::where('user_id', $user_id)->where('status', 'pending')->delete();
    }
}
