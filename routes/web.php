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
Route::view('/about', 'about');

Route::view('/mutual-funds/equity', 'mutual-funds.equity');
Route::view('/mutual-funds/debt', 'mutual-funds.debt');

// Quick links routes 
Route::view('/investment-plans', 'quick-links.investement_plans');
Route::view('/mutual-funds', 'quick-links.mutual_funds');
Route::get('/retirement-planning', function () {
    return view('quick-links.retirement_planning');
});
Route::get('/tax-saving', function () {
    return view('quick-links.tax_saving');
});
Route::get('/wealth-management', function () {
    return view('quick-links.wealth_management');
});

// Important links routes 
Route::view('/disclaimer', 'disclaimer');
Route::view('/disclosure', 'disclosure');
Route::view('/forms', 'forms.index');
Route::view('/resources', 'resources.index');

// other routes 
Route::view('/terms', 'terms');
Route::view('/privacy', 'privacy_policy');