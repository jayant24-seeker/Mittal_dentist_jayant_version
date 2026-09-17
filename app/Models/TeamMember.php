<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    protected $fillable = [
        'slug', 'name', 'title', 'credentials', 'bio', 'photo', 'sort_order',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
