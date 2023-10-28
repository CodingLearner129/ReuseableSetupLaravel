<?php

namespace App\Http\Controllers\Auth;

use App\Actions\ForgotPasswordAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\ForgotPasswordRequest;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    private $minute;
    private $maxRequest;

    public function __construct()
    {
        $this->minute = 5;
        $this->maxRequest = 5;
    }

    public function showLinkRequestForm($user_type)
    {
        $url = route('forgot.sendResetLinkEmail', $user_type);
        return view('custom_auth.forgot-password', compact('user_type', 'url'));
    }

    public function sendResetLinkEmail(ForgotPasswordRequest $request, $user_type, ForgotPasswordAction $forgotPasswordAction)
    {
        return $forgotPasswordAction->handle($request, $user_type, $this->minute, $this->maxRequest);
    }
}
