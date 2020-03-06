<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SaleLines extends Model
{
    protected $fillable = ['sale_id', 'product_id', 'amount', 'price'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
