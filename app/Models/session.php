<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class session extends Model
{
    protected $fillable = ['user_id','computer_id','game_id','start_time','end_time'];

    public function user() {
        return $this->belongsTo(User::class);
    }
    public function computer() {
        return $this->belongsTo(Computer::class);
    }
    public function game() {
        return $this->belongsTo(Game::class);
    }
}
