<?php

namespace App\Services;

use App\Exceptions\ResetPasswordAndPldPasswordShouldNotSame;
use App\Models\Admin;
use App\Models\PasswordReset;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ResetPasswordService
{
    public function showResetForm($request)
    {
        $token = $request->token;
        $url = '';
        $where = [
            'token' => $token,
            'user_type' => $request['user-type'],
        ];
        $result = PasswordReset::where($where)->first();
        if (empty($result)) {
            session()->flash('error_message', __('auth.resetPasswordLinkExpired'));
        } else {
            $time = Carbon::now()->timestamp;
            if ($result->expired_at >= $time) {
                $url = route('reset.resetPassword', ['token' => $token, 'user_type' => $request['user-type']]);
            } else {
                session()->flash('error_message', __('auth.resetPasswordLinkExpired'));
            }
        }
        return view('custom_auth.reset-password')->with(
            ['url' => $url]
        );
    }

    private function checkPasswordShouldNotSame($resetPassword, $oldPassword)
    {
        if (Hash::check($resetPassword, $oldPassword)) {
            // throw new Error(__('common.resetPasswordOldPasswordShouldNotSame'));
            throw new ResetPasswordAndPldPasswordShouldNotSame(__('common.resetPasswordOldPasswordShouldNotSame'));
        }
    }

    public function resetPassword($request, $token, $user_type)
    {
        DB::beginTransaction();
        try {
            $where = [
                'token' => $token,
                'user_type' => $user_type,
            ];
            $result = PasswordReset::where($where)->first();
            if (empty($result)) {
                DB::rollback();
                session()->flash('error_message', __('common.resetPasswordOldPasswordShouldNotSame'));
                return redirect()->back();
            } else {
                $password = bcrypt($request->password);
                switch ($user_type) {
                    case config('constants.admin'):
                        $admin = Admin::where('email', $result->email)->first();
                        $this->checkPasswordShouldNotSame($request->password, $admin->password);
                        $resetPasswordResult = $admin->update(['password' => $password]);
                        break;

                    case config('constants.user'):
                        $user = User::where('email', $result->email)->where('deleted_at', 0)->first();
                        $this->checkPasswordShouldNotSame($request->password, $user->password);
                        $resetPasswordResult = $user->update(['password' => $password]);
                        break;

                    default:
                        $resetPasswordResult = null;
                        break;
                }
                if (empty($resetPasswordResult)) {
                    DB::rollback();
                    session()->flash('error_message', __('common.somethingWentWrong'));
                    return redirect()->back();
                } else {
                    $result->delete();
                    switch ($user_type) {
                        case config('constants.admin'):
                            DB::commit();
                            session()->flash('success_message', __('auth.passwordResetSuccess'));
                            return redirect()->route('admin.login');
                            break;

                        case config('constants.user'):
                            DB::commit();
                            session()->flash('success_message', __('auth.passwordResetSuccess'));
                            return redirect()->route('user.login');
                            break;

                        default:
                            DB::rollback();
                            session()->flash('error_message', __('common.somethingWentWrong'));
                            return redirect()->back();
                            break;
                    }
                }
            }
        } catch (ResetPasswordAndPldPasswordShouldNotSame $e) {
            DB::rollback();
            session()->flash('error_message', $e->getMessage());
            return redirect()->back();
        } catch (\Throwable $th) {
            DB::rollback();
            // if ($th->getMessage() == __('common.resetPasswordOldPasswordShouldNotSame')) {
            //     session()->flash('error_message', __('common.resetPasswordOldPasswordShouldNotSame'));
            // } else {
                session()->flash('error_message', __('common.somethingWentWrong'));
            // }
            return redirect()->back();
        }
    }
}
