<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GameController extends Controller
{
    public function getPuzzel(){
        $url = "http://marcconrad.com/uob/banana/api.php?out=json&base64=yes";

        try {
            $response = Http::get($url);
            // dd( $response->json());
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

    public function showGameRoom()  {

        return view('room.room_1');
    }
}
