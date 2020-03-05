<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleLines extends Model
{
    protected $fillable = ['product_id', 'amount', 'price'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
