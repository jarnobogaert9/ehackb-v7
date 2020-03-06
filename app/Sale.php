<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $fillable = ['cashier_id', 'user_id', 'price', 'old_balance', 'new_balance'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function cashier()
    {
        return $this->belongsTo(User::class, 'cashier_id');
    }

    public function lines()
    {
        return $this->hasMany(SaleLines::class);
    }
}
