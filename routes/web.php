<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackendStatusController;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ServicesController;
use App\Models\Service;

use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Auth\OtpController;
use Illuminate\Support\Facades\DB;

// routes for login with google 
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

// routes for login via phone number 
Route::post('api/auth/phone', [OtpController::class, 'sendOtp']);
Route::post('api/auth/validate-otp', [OtpController::class, 'validateOtp']);

Route::get('/test-mongodb', function () {
    try {
        // Test connection by fetching the first document from the 'MintDb' collection
        $document = DB::connection('mongodb')->collection('MintDb')->first();
    
        if ($document) {
            // Replace any NaN or Infinity values in the document
            array_walk_recursive($document, function (&$value) {
                if (is_numeric($value) && (is_nan($value) || is_infinite($value))) {
                    $value = null; // Replace with a value like null
                }
            });
        }
    
        return response()->json([
            'status' => 'success',
            'document' => $document,
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => $e->getMessage(),
        ]);
    }
    
});

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

// services routes 
Route::get('/mutual-funds/equity', [ServicesController::class, 'equityMutualFund']);
Route::get('/mutual-funds/debt', [ServicesController::class, 'debtMutualFund']);
Route::get('/mutual-funds/hybrid', [ServicesController::class, 'hybridMutualFund']);
Route::get('/insurance/life', [ServicesController::class, 'lifeInsurance']);
Route::get('/insurance/health', [ServicesController::class, 'healthInsurance']);
// Route::get('/insurance/term', [ServicesController::class, 'termInsurance']);
// Important links services routes 
Route::get('/disclaimer', [ServicesController::class, 'disclaimerAndDiscolosure']);
Route::view('/disclosure', 'disclosure');
Route::view('/forms', 'forms.index');
Route::view('/resources', 'resources.index');

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


// other routes 
Route::view('/terms', 'terms');
Route::view('/privacy', 'privacy_policy');