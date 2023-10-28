<?php

namespace App\Services;

use App\Models\Addon;
use App\Models\AddonSize;
use App\Models\Cafe;
use App\Models\CafeMenu;
use App\Models\CafeRequest;
use App\Models\CafeTiming;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class SignupService
{
    private $model;

    public function __construct($model)
    {
        $this->model = new $model();
    }

    public function showSignupForm()
    {
        $data = [];
        $type = 'user';
        $data['url'] = route($type.'.signup.submit');
        $data['urlLogin'] = route($type.'.login');
        return view('custom_auth.signup', $data);
    }

    public function signup($request)
    {
        DB::beginTransaction();
        try {
            $create = [];
            $userExist = $this->model->where('email', $request->email)->first();
            if ($userExist) {
                DB::rollback();
                session()->flash('error_message', __('validation.validation.email.unique'));
                return redirect()->back();
            }
            $create['email'] = $request->email;
            $create['name'] = $request->name;
            $create['password'] = bcrypt($request->password);
            $create['created_at'] = Carbon::now()->timestamp;
            $create['updated_at'] = Carbon::now()->timestamp;
            $userId = $this->model->insertGetId($create);
            $user = $this->model->find($userId);
            $user->assignRole('user');
            session()->flash('success_message', __('auth.signupSuccessfully'));
            DB::commit();
            return redirect()->route('user.login');
        } catch (\Throwable $th) {
            DB::rollback();
            session()->flash('error_message', __('common.somethingWentWrong'));
            return redirect()->back();
        }
    }
}
