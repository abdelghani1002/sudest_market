<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmailVerificationRequest;
use App\Notifications\EmailVerificationNotification;
use App\RepositoriesInterfaces\UserRepositoryInterface;
use Carbon\Carbon;
use Ichtrojan\Otp\Otp;
use Illuminate\Auth\Events\Verified;
use Illuminate\Http\Request;

class EmailVerificationController extends Controller
{
    protected $user_repository;
    private $otp;

    public function __construct(UserRepositoryInterface $user)
    {
        $this->otp = new Otp;
        $this->user_repository = $user;
    }

    /**
     * Resend Email Verification Notification
     *
     * @OA\Get(
     *     path="/api/email-verification",
     *     summary="Resend the email verification notification",
     *     security={{"bearerAuth":{}}},
     *     @OA\Response(response="200", description="Email verification resent successfully"),
     *     @OA\Response(response="401", description="Unauthorized"),
     * )
     */
    public function resend_email_verification(Request $request){
        $request->user()->notify(new EmailVerificationNotification());
        return response()->json([
            'status' => 'success',
            'message' => 'Email verification resent successfully',
        ]);
    }

    /**
     * Verify Email with OTP
     *
     * @OA\Post(
     *     path="/api/email-verification",
     *     summary="Verify email with OTP",
     *     security={{"bearerAuth":{}}},
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(
     *             required={"otp"},
     *             @OA\Property(property="otp", type="string"),
     *         )
     *     ),
     *     @OA\Response(response="200", description="Email verified successfully"),
     *     @OA\Response(response="401", description="Unauthorized"),
     *     @OA\Response(response="422", description="Validation errors"),
     * )
     */
    public function email_verification(EmailVerificationRequest $request)
    {
        $otp_res = $this->otp->validate($request->user()->email, $request->otp);
        if (! $otp_res->status) {
            return response()->json([
                'status' => 'error',
                'message' => $otp_res->message,
            ], 422);
        }
        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }
        return response()->json([
            'status' => 'success',
            'message' => 'Email verified successfully.'
        ]);
    }
}
