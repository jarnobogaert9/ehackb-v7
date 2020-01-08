<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['name', 'game_id'];

    public function path(){
        return route('teams.one', $this);
    }

    public function creator(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function requests(){
        return $this->hasMany(Teamrequest::class);
    }

    public function members(){
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function game(){
        return $this->belongsTo(Game::class);
    }

    public function seats(){
        return $this->hasMany(Seat::class);
    }
}
