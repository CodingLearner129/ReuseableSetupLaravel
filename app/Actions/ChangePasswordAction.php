<?php

namespace App\Actions;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ChangePasswordAction
{
    public function handle($model, $request)
    {
        DB::beginTransaction();
        try {
            $model = new $model();
            if(Hash::check($request->current_password, Auth::user()->password)){
                $model->where('id', Auth::user()->id)->update(['password' => bcrypt($request->new_password), 'updated_at' => Carbon::now()->timestamp]);
                DB::commit();
                session()->flash('success_message', __('common.passwordChangeSuccess'));
                return redirect()->route(Auth::getDefaultDriver().'.dashboard');
            } else {
                DB::rollback();
                session()->flash('error_message', __('common.validCurrentPassword'));
                return redirect()->back();
            }
        } catch (\Throwable $th) {
            DB::rollback();
            session()->flash('error_message', __('common.somethingWentWrong'));
            return redirect()->back();
        }
    }
}
