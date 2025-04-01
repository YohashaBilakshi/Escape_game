<?php

namespace App\Http\Controllers;

use App\Models\GameList;
use App\Models\GameScore;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GameController extends Controller
{
    public function getPuzzel(){

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

    public function showHome()  {

        $user_id = auth()->user()->id;

        $game_hitory_data = GameScore::from('game_score_details as gsd')
        ->leftJoin('game_list as gl' , 'gl.id' , '=' ,'gsd.game_id' )
        ->leftJoin('users as u' , 'u.id' ,'=' ,'gsd.user_id')
        ->where('gsd.status' , 'complete')
        ->select('u.name as user_name', 'gl.name as game_name' , 'gsd.time_taken','gsd.level' ,'gsd.logged_ip')->get();

        $user_level = GameScore::where("user_id", $user_id)->max('level');
        // dd( $user_level );
        $game_list =  GameList::all();

        return view('dashboard', compact('game_hitory_data', 'game_list', 'user_level'));
    }
    public function showGameRoom($id)  {

       $url = "https://ipinfo.io/json";
       $logged_ip = null;

        try {
            $response = Http::get($url);
            if ($response->successful()) {
               
                $data = $response->json();
                $logged_ip = $data['ip']; 
            } 

            $user_game_data =  GameScore::create([
                'game_id' => 1,
                'user_id' => auth()->user()->id,
                'logged_ip' =>  $logged_ip,
                'logged_time' => Carbon::now(),
            ]);

            // return view('room.room_2');
            return view('room.room_'.$id)->with("gsmeLogId" , $user_game_data->id);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong', 'message' => $e->getMessage()], 500);
        }


    }

    public function gameComeplete($id, $time){

    }
}
