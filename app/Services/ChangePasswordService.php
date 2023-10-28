<?php

namespace App\Services;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ChangePasswordService
{
    private $model;

    public function __construct($model)
    {
        $this->model = new $model();
    }

    public function changePassword($request)
    {
        DB::beginTransaction();
        try {
            if(Hash::check($request->current_password, Auth::user()->password)){
                $this->model->where('id', Auth::user()->id)->update(['password' => bcrypt($request->new_password), 'updated_at' => Carbon::now()->timestamp,]);
                DB::commit();
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
