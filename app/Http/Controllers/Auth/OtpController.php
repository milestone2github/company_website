<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Models\Otp;

class OtpController extends Controller
{
  public function sendOtp(Request $request)
  {
    $request->validate([
      'phone' => 'required|digits_between:10,12',
    ]);

    $phoneNumber = $request->input('phone');

    // Add '91' prefix if phone length is 10
    if (strlen($phoneNumber) === 10) {
      $phoneNumber = '91' . $phoneNumber;
    }

    // Generate OTP
    $otp = random_int(1000, 9999);

    try {
      // Save OTP in MongoDB
      // Otp::updateOrCreate(
      //   ['phone' => $phoneNumber],
      //   [
      //     'otp' => $otp,
      //     'expires_at' => now()->addMinutes(5),
      //   ]
      // );

      // Send OTP via 2Factor API
      $response = Http::get('https://2factor.in/API/R1/?module=TRANS_SMS&apikey=' . env('TWO_FACTOR_API_KEY') . '&to=' . $phoneNumber . '&from=mNIVSH&templatename=otp_template&var1=' . $otp);

      if ($response->successful()) {
        return response()->json(['message' => 'OTP sent successfully.', 'phone' => $phoneNumber], 200);
      } else {
        return response()->json(['error' => 'Failed to send OTP.'], 500);
      }
    } catch (\Exception $e) {
      return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
    }
  }


  public function validateOtp(Request $request)
  {
    // Validate incoming request
    $request->validate([
      'phone' => 'required|digits_between:10,12',
      'otp' => 'required|digits:4',
    ]);

    $phoneNumber = $request->input('phone');
    $otp = $request->input('otp');

    // Add '91' prefix if phone length is 10
    if (strlen($phoneNumber) === 10) {
      $phoneNumber = '91' . $phoneNumber;
    }

    // Find the OTP record for the given phone number
    $otpRecord = Otp::where('phone', $phoneNumber)->first();

    if (!$otpRecord) {
      return response()->json(['error' => 'No OTP found for this phone number.'], 404);
    }

    // Check if the OTP is valid and not expired
    if ($otpRecord->otp === $otp) {
      if ($otpRecord->expires_at->isFuture()) {
        // OTP is valid
        return response()->json(['message' => 'OTP verified successfully.'], 200);
      } else {
        // OTP has expired
        return response()->json(['error' => 'OTP has expired.'], 400);
      }
    }

    // OTP does not match
    return response()->json(['error' => 'Invalid OTP.'], 400);
  }
}
