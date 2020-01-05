<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teamrequest extends Model
{
    protected $fillable = [
        'team_id', 'user_id'
    ];

    public function team(){
        return $this->belongsTo(Team::class);
    }

    public function sender(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
