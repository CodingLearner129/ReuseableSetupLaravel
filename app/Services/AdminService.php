<?php

namespace App\Services;

use App\Helpers\Aws;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminService
{
    private $model;

    public function __construct($model)
    {
        $this->model = new $model();
    }

    public function updateProfile($request)
    {
        DB::beginTransaction();
        try {
            $update = [];
            $update['full_name'] = $request->full_name;
            $update['email'] = $request->email;
            $update['address'] = $request->address;
            $update['updated_at'] = Carbon::now()->timestamp;
            $admin = $this->model->where('id', Auth::user()->id)->first();
            if (isset($request->picture__input) && is_file($request->picture__input)) {
                $update['profile_picture'] = Aws::uploadFileS3Bucket('images/admin', $request->picture__input, Auth::user()->profile_picture);
            } else {
                DB::rollback();
                if($admin->profile_picture == ''){
                    session()->flash('error_message', __('validation.validation.image.required'));
                    return redirect()->back();
                }
            }
            $admin->update($update);
            DB::commit();
            session()->flash('success_message', __('common.profileUpdatedSuccessfully'));
            return redirect()->route(Auth::getDefaultDriver().'.myProfile');
        } catch (\Throwable $th) {
            DB::rollback();
            session()->flash('error_message', __('common.somethingWentWrong'));
            return redirect()->back();
        }
    }
}
