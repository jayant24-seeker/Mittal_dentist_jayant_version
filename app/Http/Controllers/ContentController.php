<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Service;
use Illuminate\Http\Request;

/**
 * Resolves legacy WordPress flat slugs (e.g. /dental-implant/, /some-blog-post/)
 * that lived at the site root, so old URLs keep working without redirects.
 */
class ContentController extends Controller
{
    public function show(Request $request, string $slug)
    {
        if ($service = Service::where('slug', $slug)->first()) {
            return view('pages.services.show', ['service' => $service]);
        }

        if ($post = Post::where('slug', $slug)->whereNotNull('published_at')->first()) {
            return view('pages.blog.show', ['post' => $post]);
        }

        abort(404);
    }
}
