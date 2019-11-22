<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Talk extends Model
{
    protected $fillable = ['title', 'photo', 'excerpt', 'body', 'speaker', 'start_time', 'end_time', 'max_places', 'available_places'];

    public function path(){
        return route('talks.one', $this);
    }

    public function audience(){
        return $this->belongsToMany(User::class);
    }
}
