<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PricingItem extends Model
{
    protected $fillable = [
        'category', 'name', 'price_inr', 'price_usd', 'sort_order',
    ];
}
