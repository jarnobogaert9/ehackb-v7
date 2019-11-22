<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $fillable = ['name', 'thumbnail', 'date', 'location'];

    public function path(){
        return route('games.one', $this);
    }

    public function teams(){
        return $this->hasMany(Team::class);
    }
}
