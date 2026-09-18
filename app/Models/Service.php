<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'slug', 'title', 'summary', 'body', 'icon', 'image',
        'price_from', 'pricing_anchor',
        'is_featured', 'sort_order', 'meta_title', 'meta_description',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
