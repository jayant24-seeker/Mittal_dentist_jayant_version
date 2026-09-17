<?php

namespace App\Http\Controllers;

use App\Models\GalleryItem;
use App\Models\Post;
use App\Models\Service;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('sort_order')->limit(6)->get();
        $recognitions = GalleryItem::orderBy('sort_order')->limit(4)->get();
        $posts = Post::whereNotNull('published_at')->orderByDesc('published_at')->limit(3)->get();

        return view('pages.home', compact('services', 'recognitions', 'posts'));
    }
}
