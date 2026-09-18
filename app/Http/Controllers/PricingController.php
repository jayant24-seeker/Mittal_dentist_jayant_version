<?php

namespace App\Http\Controllers;

use App\Models\PricingItem;

class PricingController extends Controller
{
    public function index()
    {
        $categories = PricingItem::orderBy('sort_order')->get()->groupBy('category');

        return view('pages.pricing', compact('categories'));
    }
}
