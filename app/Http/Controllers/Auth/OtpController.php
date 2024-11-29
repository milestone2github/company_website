<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Services\EmailService;
use App\Models\Otp;
use App\Services\WhatsappService;

class OtpController extends Controller
{
    protected $emailService;
    protected $whatsappService;

    // Inject services via constructor
    public function __construct(EmailService $emailService, WhatsappService $whatsappService)
    {
        $this->emailService = $emailService;
        $this->whatsappService = $whatsappService;
    }

    public function sendOtp(Request $request)
    {
        $data = $request->validate([
            'phone' => 'nullable|regex:/^\+\d{10,15}$/', // Matches phone numbers with country code
            'email' => 'nullable|email',
        ]);

        if (!isset($data['phone']) && !isset($data['email'])) {
            return response()->json(['error' => 'Invalid input. Provide phone or email.'], 400);
        }

        // Generate OTP
        $otp = random_int(1000, 9999);

        try {
            if (isset($data['phone'])) {
                // Save OTP in MongoDB
                Otp::updateOrCreate(
                    ['phone' => $data['phone']],
                    [
                        'otp' => $otp,
                        'expires_at' => now()->addMinutes(5),
                    ]
                );

                // get delevery channel from body [sms | whatsapp]
                $otpDeliveryChannel = $request->input('otpDeliveryChannel');

                if ($otpDeliveryChannel == 'whatsapp') {
                    // send otp via whatsapp 
                    $parameters = [
                        [
                            'name' => '1',
                            'value' => $otp
                        ]
                    ];

                    $templateName = 'otp_send';
                    $broadcastName = 'otp_send_291120241132';
                    $messageSent = $this->whatsappService->sendWATemplateMessage($data['phone'], $parameters, $templateName, $broadcastName);
                    if ($messageSent) {
                        return response()->json(['message' => 'OTP sent successfully via Whatsapp.', 'phoneOrEmail' => $data['phone']], 200);
                    } else {
                        return response()->json(['error' => 'Failed to send OTP via Whatsapp.'], 500);
                    }
                } else {
                    // Logic to send OTP to phone
                    $baseUrl = "https://2factor.in/API/V1/";

                    $template = "mverify";
                    $apiKey = env('TWO_FACTOR_API_KEY');

                    $finalUrl = $baseUrl . urlencode($apiKey) . "/SMS/" . urlencode($data['phone']) . "/" . urlencode($otp) . "/" . urlencode($template);

                    // Send the request
                    $response = Http::post($finalUrl);
                    Log::info('2factor response: ' . $response);
                    if ($response->successful()) {
                        return response()->json(['message' => 'OTP sent successfully in SMS.', 'phoneOrEmail' => $data['phone']], 200);
                    } else {
                        return response()->json(['error' => 'Failed to send OTP in SMS.'], 500);
                    }
                }

            }

            if (isset($data['email'])) {
                // Save OTP in MongoDB
                Otp::updateOrCreate(
                    ['phone' => $data['email']],
                    [
                        'otp' => $otp,
                        'expires_at' => now()->addMinutes(5),
                    ]
                );

                // Send the OTP via email using MailService
                $result = $this->emailService->sendEmail([
                    'toAddress' => $data['email'],
                    'subject' => 'Your OTP Code',
                    'body' => "Your OTP is {$otp}. Please use this to complete your verification.",
                ]);

                if ($result === true) {
                    return response()->json(['message' => 'OTP sent successfully on email.', 'phoneOrEmail' => $data['email']], 200);
                } else {
                    return response()->json(['error' => 'Failed to send OTP on email.'], 500);
                }
            }
            // return response()->json(['message' => 'OTP sent successfully.', 'phone' => $phoneNumber], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
        }
    }


    public function validateOtp(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'phone' => 'required',
            'otp' => 'required|digits:4',
        ]);

        $phoneNumber = $request->input('phone');
        $otp = $request->input('otp');

        // Find the OTP record for the given phone number
        $otpRecord = Otp::where('phone', $phoneNumber)->first();

        if (!$otpRecord) {
            return response()->json(['error' => 'No OTP found for this phone number.'], 404);
        }

        // Check if the OTP is valid and not expired
        if ((string) $otpRecord->otp === (string) $otp) {
            if ($otpRecord->expires_at->isFuture()) {
                // OTP is valid
                return response()->json([
                    'mobile' => $phoneNumber,
                    'message' => 'OTP verified successfully.'
                ], 200);
            } else {
                // OTP has expired
                return response()->json(['error' => 'OTP has expired.'], 400);
            }
        }

        // OTP does not match
        return response()->json(['error' => 'Invalid OTP.'], 400);
    }
}
