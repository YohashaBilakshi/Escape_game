<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameScore extends Model
{
    use HasFactory;

    protected $table = 'game_score_details';
    protected $fillable = ['user_id', 'game_id', 'logged_ip' ,'time_taken' , 'status' , 'level' , 'logged_time'];
}
