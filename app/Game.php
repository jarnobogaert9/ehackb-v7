<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = ['name', 'thumbnail', 'start_time', 'location'];
    protected $casts = [
        'start_time' => 'timestamp:H:i:s',
    ];

    public function path(){
        return route('games.index');
    }

    public function teams(){
        return $this->hasMany(Team::class);
    }
}
