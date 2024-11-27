<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContentController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\Auth\InvestwellController;
use App\Http\Controllers\Auth\OtpController;

// API Routes for login with Google 
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);

// routes for login via phone number 
Route::post('api/auth/phone', [OtpController::class, 'sendOtp']);
Route::post('api/auth/validate-otp', [OtpController::class, 'validateOtp']);
Route::post('api/auth/login-investwell', [InvestwellController::class, 'loginInvestwell']);

// API Routes for fetching data
Route::get('/api/section-one-new', [ContentController::class, 'getSectionOneData']);
Route::get('/api/offerings', [ContentController::class, 'getOfferings']);
Route::get('/api/blogs', [ContentController::class, 'getBlogs']);
Route::get('/api/magazines', [ContentController::class, 'getMagazines']);

Route::get('/test-laravel', function () {
    return view('welcome');
});

Route::get('/', [ContentController::class, 'index']);
// Route::domain('mnivesh.com')->group(function () {
//     Route::get('/', [HomeController::class, 'mnivesh.indexmnivesh']);
//     // Other routes for example1.com
// });

// Route::domain('niveshonline.com')->group(function () {
//     Route::get('/', [HomeController::class, 'niveshonline.index']);
//     // Other routes for example2.com
// });

Route::get('/home', [ContentController::class, 'index']);

Route::get('/Equity-Mutual-Funds', [ServicesController::class, 'equityMutualFund']);
Route::get('/Debt-Mutual-Funds', [ServicesController::class, 'debtMutualFund']);
Route::get('/Hybrid-Mutual-Funds', [ServicesController::class, 'hybridMutualFund']);
Route::get('/life-insurance', [ServicesController::class, 'lifeInsurance']);
Route::get('/health-insurance', [ServicesController::class, 'healthInsurance']);
Route::get('/corporate-insurance', [ServicesController::class, 'corporateInsurance']);
// Important links services routes 
Route::get('/disclaimer', [ServicesController::class, 'disclaimerAndDiscolosure']);
