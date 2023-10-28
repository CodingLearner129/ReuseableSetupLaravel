<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    private $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
        Auth::shouldUse('admin');
    }

    public function handle(Request $request, Closure $next)
    {
        if (auth()->user() && auth()->user()->hasRole('super_admin')) {
            return $next($request);
        } else {
            auth()->logout();
            Session::flash('message', 'Unauthorized');
            Session::flash('alert-class', 'alert-danger');
            return redirect()->route('admin.login');
        }
    }
}
