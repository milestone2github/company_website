<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackendStatusController;
use App\Http\Controllers\ContentController;

// API Routes for fetching data
Route::get('/api/section-one-new', [ContentController::class, 'getSectionOneData']);
Route::get('/api/offerings', [ContentController::class, 'getOfferings']);
Route::get('/api/blogs', [ContentController::class, 'getBlogs']);
Route::get('/api/magazines', [ContentController::class, 'getMagazines']);


Route::post('/upload-image', [ImageController::class, 'upload']);



// View Routes for rendering content
Route::get('/', [ContentController::class, 'index']);

Route::get('/offerings', [ContentController::class, 'getOfferings']);
Route::get('/stats', [ContentController::class, 'getStats']);
Route::get('/activities', [ContentController::class, 'getActivities']);
Route::get('/blogs', [ContentController::class, 'getBlogs']);


Route::get('/backend-status', [BackendStatusController::class, 'getBackendStatus']);


Route::get('/home', [ContentController::class, 'index']);

Route::get('/status', function () {
    return view('layouts.status');
});

Route::get('/mf-performance', function () {
    return view('mf_performance');
});



Route::get('/contact', function () {
    return view('contact');
});

Route::view('/mutual-funds/equity', 'mutual-funds.equity');
Route::view('/mutual-funds/debt', 'mutual-funds.debt');

