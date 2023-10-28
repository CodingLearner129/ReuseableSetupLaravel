<?php

namespace App\Actions;

use App\Mail\SendPasswordResetEmail;
use App\Models\Admin;
use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgotPasswordAction
{
    public function handle($request, $user_type, $minute, $maxRequest)
    {
        DB::beginTransaction();
        try {
            switch ($user_type) {
                case config('constants.admin'):
                    $result = Admin::where('email', $request->email)->select('name as username', 'email')->first();
                    break;

                case config('constants.user'):
                    $result = User::where('email', $request->email)->select('name as username', 'email')->where('deleted_at', 0)->first();
                    break;

                default:
                    $result = null;
                    break;
            }
            if (!empty($result)) {

                $token = Str::random(60);
                $reset = [
                    'email' => $request->email,
                    'token' => $token,
                    'user_type' => $user_type,
                    'expired_at' => Carbon::now()->addMinutes($minute)->timestamp,
                    'created_at' => Carbon::now()->timestamp,
                ];
                $passwordResetExist = PasswordReset::where([['email', '=', $request->email], ['user_type', '=', $user_type]])->first();
                if ($passwordResetExist) {
                    $passwordReset = $passwordResetExist->update($reset);
                } else {
                    $passwordReset = PasswordReset::insert($reset);
                }
                if (!empty($passwordReset)) {
                    $subject = __('auth.subjectResetPassword');
                    $username = $result->username;
                    $view = 'emails.reset-password';
                    $reply_to = $request->email;
                    $url = route('reset.showResetForm') . '?token=' . $token . '&user-type=' . $user_type;
                    $data = [
                        'username' => $username,
                        'subject' => $subject,
                        'view' => $view,
                        'url' => $url,
                        'count' => $minute,
                    ];
                    Mail::to($reply_to)->send(new SendPasswordResetEmail($data));
                    DB::commit();
                    session()->flash('success_message', __('auth.sendResetLinkEmail'));
                    return redirect()->back();
                }
            } else {
                DB::rollback();
                session()->flash('error_message', __('common.emailNotFound'));
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            DB::rollback();
            session()->flash('error_message', __('common.somethingWentWrong'));
            return redirect()->back();
        }
    }
}
