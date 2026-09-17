<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Service;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $staticUrls = [
            route('home'),
            route('about'),
            route('services.index'),
            route('recognition'),
            route('blog.index'),
            route('contact'),
        ];

        $serviceUrls = Service::pluck('slug')->map(fn ($slug) => route('content.show', $slug));
        $postUrls = Post::whereNotNull('published_at')->pluck('slug')->map(fn ($slug) => route('content.show', $slug));

        $urls = collect($staticUrls)->merge($serviceUrls)->merge($postUrls);

        $xml = view('sitemap', compact('urls'))->render();

        return response($xml, 200)->header('Content-Type', 'text/xml');
    }
}
