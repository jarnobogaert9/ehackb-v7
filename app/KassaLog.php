<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KassaLog extends Model
{
    protected $fillable = ['user_id', 'product_id', 'amount', 'balance'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}