<?php

namespace App\Services;

use App\Helpers\Aws;
use Error;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class UserService
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
            // $userExist = $this->model->where('email', $request->email)->first();
            // if ($userExist) {
            //     DB::rollback();
            //     session()->flash('error_message', __('validation.validation.email.unique'));
            //     return redirect()->back();
            // }
            $update = [];
            $update['name'] = $request->name;
            $update['email'] = $request->email;
            $update['address'] = $request->address;
            $update['updated_at'] = Carbon::now()->timestamp;
            $user = $this->model->where('id', Auth::user()->id)->first();
            if (isset($request->picture__input) && is_file($request->picture__input)) {
                // $update['profile_picture'] = Aws::uploadImageS3Bucket('images/admin', $request->picture__input, Auth::user()->profile_picture);
                if ($request->hasFile('picture__input')) {
                    $files = $request->file('picture__input');
                    // $extension = $files->getClientOriginalExtension(); //move method
                    // $encrFileName = Str::random(20) . "_" . Carbon::now()->format("d_m_Y_H_i_s"); //move method
                    // $file = $encrFileName . "." . $extension; //move method
                    // $destinationPath = public_path('image');
                    // if ($files->move($destinationPath, $file)) {
                    if ($user->profile_picture != '') {
                        Storage::disk('public')->delete($user->profile_picture);
                    }
                    if (Storage::disk('public')->put('image/users', $files)) {
                        // if ($file = $files->store('public/image')) {
                        // $employee->img = $file;
                        $update['profile_picture'] = 'image/users' . $files->hashName(); //store method and storage disk method
                    } else {
                        throw new Error('Image not saved successfully');
                    }
                }
            } else {
                if ($user->profile_picture == '') {
                    DB::rollback();
                    session()->flash('error_message', __('validation.validation.image.required'));
                    return redirect()->back();
                }
            }
            $user->update($update);
            DB::commit();
            session()->flash('success_message', __('common.profileUpdatedSuccessfully'));
            return redirect()->route('user.myProfile');
        } catch (\Throwable $th) {
            DB::rollback();
            session()->flash('error_message', __('common.somethingWentWrong'));
            return redirect()->back();
        }
    }
}
