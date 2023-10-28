<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Actions\ChangePasswordAction;
use App\Helpers\Aws;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\User\EditUserProfileRequest;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    private $userService;

    public function __construct()
    {
        $this->userService = new UserService(User::class);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $data['userDetail'] = Auth::user();
        return view('user.dashboard', $data);
    }

    public function myProfile()
    {
        $data = [];
        $data['name'] = Auth::user()->name;
        $data['email'] = Auth::user()->email;
        // $data['profile_picture'] = Auth::user()->profile_picture ? Aws::presignedUri(Auth::user()->profile_picture) : '';
        $data['profile_picture'] = Auth::user()->profile_picture ? Auth::user()->profile_picture : '';
        $data['address'] = Auth::user()->address;
        // $data['url'] = route('user.editProfile');
        $data['url'] = route('user.updateProfile');
        $data['cancelUrl'] = route('user.dashboard');
        return view('user.profile', $data);
    }

    public function editProfile()
    {
        $data = [];
        $data['name'] = Auth::user()->name;
        $data['email'] = Auth::user()->email;
        $data['profile_picture'] = Auth::user()->profile_picture ? Aws::presignedUri(Auth::user()->profile_picture) : '';
        $data['address'] = Auth::user()->address;
        $data['url'] = route('user.updateProfile');
        $data['cancelUrl'] = route('user.myProfile');
        return view('user.edit-profile', $data);
    }

    public function updateProfile(EditUserProfileRequest $request)
    {
        return $this->userService->updateProfile($request);
    }

    public function changePasswordForm()
    {
        $data = [];
        $data['url'] = route('user.changePassword');
        $data['cancelUrl'] = route('user.dashboard');
        return view('change-password', $data);
    }

    public function changePassword(ChangePasswordRequest $request, ChangePasswordAction $changePasswordAction)
    {
        return $changePasswordAction->handle(User::class, $request);
    }

}
