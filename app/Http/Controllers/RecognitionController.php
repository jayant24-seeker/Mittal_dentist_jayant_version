<?php

namespace App\Http\Controllers;

use App\Models\GalleryItem;

class RecognitionController extends Controller
{
    public function index()
    {
        $achievements = GalleryItem::where('category', 'achievement')->orderBy('sort_order')->get();
        $press = GalleryItem::where('category', 'press')->orderBy('sort_order')->get();

        return view('pages.recognition', compact('achievements', 'press'));
    }
}
