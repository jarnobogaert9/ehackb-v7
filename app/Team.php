<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
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
}
