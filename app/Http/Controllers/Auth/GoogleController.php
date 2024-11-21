<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();

        // Log the user's information
        Log::info('Google user information retrieved', ['user' => $user]);

        // Find or create the user in your database
        $existingUser = User::where('email', $user->email)->first();

        if ($existingUser) {
            Auth::login($existingUser);
        } else {
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'google_id' => $user->id, // Save the Google ID for reference
                'password' => bcrypt('123456dummy'), // Dummy password
            ]);

            Auth::login($newUser);
        }

        return redirect()->intended('/Equity-Mutual-Funds'); // Redirect to your desired route
    }
}
