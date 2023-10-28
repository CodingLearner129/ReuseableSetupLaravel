<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\UserModuleService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userModuleService;
    private $modelName;

    public function __construct()
    {
        $this->userModuleService = new UserModuleService(User::class);
        $this->modelName = 'User';
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [];
        $data['dataUrl'] = route('admin.users.data');
        return view('admin.users.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->userModuleService->destroy($id, $this->modelName);
    }

    public function data()
    {
        return $this->userModuleService->data();
    }
}
