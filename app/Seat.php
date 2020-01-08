<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    protected $fillable = ['team_id'];

    public function team(){
        return $this->belongsTo(Team::class);
    }
}
