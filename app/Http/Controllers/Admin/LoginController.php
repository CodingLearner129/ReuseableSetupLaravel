<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct()
    {
        // use guard as per role
        $this->middleware('guest:admin')->except('logout');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm(): View
    {
        $data = [];
        $user_type = "admin";
        $data['type'] = $user_type;
        $data['url'] = route($user_type.'.login.submit');
        $data['forgot_password_url'] = route('forgot.showLinkRequestForm', $user_type);
        return view('custom_auth.login', $data);
    }

    protected function guard()
    {
        // use guard as per role
        return Auth::guard('admin');
    }

    public function login(LoginRequest $request)
    {
        try {
            $fieldType = filter_var($request->email, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';
            if (Auth::guard('admin')->attempt(array($fieldType => $request->email, 'password' => $request->password))) {
                return redirect()->route('admin.dashboard');
            } else {
                session()->flash('error_message', __('auth.credentialsNotMatch'));
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            //throw $th;
            Auth::guard('admin')->logout();
            session()->flash('error_message', __('common.somethingWentWrong'));
            return redirect()->back();
        }
    }
}
