<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nieuws extends Model
{
    protected $fillable = ['title', 'body'];

    public function path(){
        return route('nieuws.one', $this);
    }
}
