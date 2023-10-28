<?php

namespace App\Http\Controllers\Admin;

use App\Actions\AdminUpdateProfileAction;
use App\Actions\ChangePasswordAction;
use App\Helpers\Aws;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EditAdminProfileRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{

    public function index()
    {
        $data = [];
        $data['userDetail'] = Auth::user();
        return view('admin.dashboard', $data);
    }

    public function myProfile()
    {
        $data = [];
        $data['name'] = Auth::user()->name;
        $data['email'] = Auth::user()->email;
        // $data['profile_picture'] = Auth::user()->profile_picture ? Aws::presignedUri(Auth::user()->profile_picture) : '';
        $data['profile_picture'] = Auth::user()->profile_picture ? Auth::user()->profile_picture : '';
        $data['address'] = Auth::user()->address;
        // $data['url'] = route('admin.editProfile');
        $data['url'] = route('admin.updateProfile');
        $data['cancelUrl'] = route('admin.dashboard');
        return view('admin.profile', $data);
    }

    public function editProfile()
    {
        $data = [];
        $data['name'] = Auth::user()->name;
        $data['email'] = Auth::user()->email;
        $data['profile_picture'] = Auth::user()->profile_picture ? Aws::presignedUri(Auth::user()->profile_picture) : '';
        $data['address'] = Auth::user()->address;
        $data['url'] = route('admin.updateProfile');
        $data['cancelUrl'] = route('admin.myProfile');
        return view('admin.edit-profile', $data);
    }

    public function updateProfile(EditAdminProfileRequest $request, AdminUpdateProfileAction $adminUpdateProfileAction)
    {
        return $adminUpdateProfileAction->handle(Admin::class, $request);
    }

    public function changePasswordForm()
    {
        $data = [];
        $data['url'] = route('admin.changePassword');
        $data['cancelUrl'] = route('admin.dashboard');
        return view('change-password', $data);
    }

    public function changePassword(ChangePasswordRequest $request, ChangePasswordAction $changePasswordAction)
    {
        return $changePasswordAction->handle(Admin::class, $request);
    }
}
