<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Transformation extends Model
{
    protected $fillable = [
        'title', 'description', 'before_image', 'after_image',
        'shows_face', 'consent_confirmed', 'sort_order',
    ];

    protected $casts = [
        'shows_face' => 'boolean',
        'consent_confirmed' => 'boolean',
    ];

    /**
     * Only show cases that either don't reveal the patient's face, or
     * where the clinic has confirmed written consent to publish it.
     */
    public function scopePublishable(Builder $query): Builder
    {
        return $query->where('shows_face', false)->orWhere('consent_confirmed', true);
    }
}
