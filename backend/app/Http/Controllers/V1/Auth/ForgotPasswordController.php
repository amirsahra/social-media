<?php

namespace App\Http\Controllers\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\V1\Auth\ActionClasses\CreateResetCodeAction;
use App\Http\Requests\V1\Auth\ForgotPasswordRequest;
use App\Mail\V1\SendCodeResetPassword;
use App\Models\ResetCodePassword;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;

class ForgotPasswordController extends Controller
{
    public function __invoke(ForgotPasswordRequest $request)
    {
        // Delete all old code that user send before.
        ResetCodePassword::where('email', $request->email)->delete();

        // Create new reset code for this email
        $createResetCodeAction = new CreateResetCodeAction();
        $codeData = $createResetCodeAction($request->email);

        // Send email to user
        Mail::to($request->email)->send(new SendCodeResetPassword($codeData->code));

        return Response::apiResult('The password change code has been sent to your email.',
            ['resetUrl' => route('password.reset')]
        );
    }
}
