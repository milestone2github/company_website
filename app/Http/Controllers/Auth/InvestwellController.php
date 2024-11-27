<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class InvestwellController extends Controller
{
    public function loginInvestwell()
    {
        try {
            // Step 1: Get the mobile number from the request
            $mobile = request('mobile');

            if (!$mobile) {
                throw new \Exception('Mobile number is required.');
            }

            // Step 2: Get the username from the `getUsername` function
            $username = $this->getUsername($mobile);

            if (!$username) {
                throw new \Exception('User not found for the provided mobile number.');
            }

            // Step 3: Get the token from `getInvestwellToken` function
            $token = $this->getInvestwellToken();

            if (!$token) {
                throw new \Exception('Failed to retrieve Investwell authorization token.');
            }

            // Step 4: Use the above token to get SSOToken from `getSSOToken` function
            $ssoToken = $this->getSSOToken($token, $username);

            if (!$ssoToken) {
                throw new \Exception('Failed to retrieve SSOToken.');
            }

            // Step 5: Append the SSOToken to the URL and redirect
            $redirectUrl = "https://mnivesh.investwell.app/#/login?SSOToken={$ssoToken}";
            return response()->json(['url' => $redirectUrl], 200);
        } catch (\Exception $e) {
            Log::error('Error in loginInvestwell:', ['message' => $e->getMessage()]);
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }


    function getInvestwellToken()
    {
        try {
            $url = config('investwell.api_url') . '/auth/getAuthorizationToken';

            $payload = [
                'authName' => config('investwell.auth_name'),
                'password' => config('investwell.auth_password'),
            ];

            // Make the POST request
            $response = Http::post($url, $payload);

            // Parse the JSON response
            $data = $response->json();

            // Retrieve the token
            $token = $data['result']['token'] ?? null;

            return $token;
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    function getSSOToken($token, $username)
    {
        try {
            $url = config('investwell.api_url') . '/auth/getAuthenticationKey';

            $payload = [
                'token' => $token,
                'username' => $username,
            ];

            // Make the POST request
            $response = Http::post($url, $payload);

            // Parse the JSON response
            $data = $response->json();

            // Retrieve the token
            $ssoToken = $data['result']['SSOToken'] ?? null;

            if ($ssoToken) {
                return $ssoToken;
            }
        } catch (\Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    function getUsername($mobile)
    {
        try {
            // Query the MongoDB collection
            $user = DB::connection('mongodb')->collection('MintDb')->where('MOBILE', $mobile)->first();

            // Check if the user exists
            if (!$user) {
                throw new \Exception('User not found');
            }

            // Return the username
            return $user['USERNAME'] ?? null;
        } catch (\Exception $e) {
            // Re-throw or handle the exception
            throw new \Exception($e->getMessage());
        }
    }
}
