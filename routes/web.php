<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RecognitionController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');

Route::get('/about', [AboutController::class, 'index'])->name('about');

Route::get('/services', [ServiceController::class, 'index'])->name('services.index');

Route::get('/recognition', [RecognitionController::class, 'index'])->name('recognition');

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');

Route::get('/contact-us', [ContactController::class, 'index'])->name('contact');
Route::post('/contact-us', [ContactController::class, 'store'])->name('contact.store');

// Legacy WordPress permalinks lived at the root (e.g. /dental-implant/,
// /some-blog-post-slug/) with no /services/ or /blog/ prefix. This
// catch-all preserves those exact URLs — checking services, then posts —
// so nothing needs a 301 redirect for SEO continuity.
Route::get('/{slug}', [ContentController::class, 'show'])
    ->where('slug', '[A-Za-z0-9\-]+')
    ->name('content.show');
