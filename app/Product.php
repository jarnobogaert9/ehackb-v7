<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'photo', 'price', 'quantity', 'sold'];

    public function kassa_logs()
    {
        return $this->hasMany(KassaLog::class);
    }
}
