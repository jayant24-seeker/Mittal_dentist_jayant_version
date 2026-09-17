<?php

namespace App\Http\Controllers;

use App\Models\Post;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::whereNotNull('published_at')
            ->orderByDesc('published_at')
            ->paginate(9);

        return view('pages.blog.index', compact('posts'));
    }
}
