<?php

namespace App\Http\Controllers;

use App\Http\Requests\SignupRequest;
use App\Models\User;
use App\Services\SignupService;
use Illuminate\Support\Facades\Auth;

class SignupController extends Controller
{
    private $signupService;

    public function __construct()
    {
        // use guard as per role
        $this->middleware('guest:user')->except('logout');
        $this->signupService = new SignupService(User::class);
    }

    protected function guard()
    {
        // use guard as per role
        return Auth::guard('user');
    }

    public function showSignupForm()
    {
        return $this->signupService->showSignupForm();
    }

    public function signup(SignupRequest $request)
    {
        return $this->signupService->signup($request);
    }
}
