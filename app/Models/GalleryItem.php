<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GalleryItem extends Model
{
    protected $fillable = [
        'title', 'description', 'image', 'category',
        'person_name', 'event_date', 'sort_order',
    ];

    protected $casts = [
        'event_date' => 'date',
    ];
}
