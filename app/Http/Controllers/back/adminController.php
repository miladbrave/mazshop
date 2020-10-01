<?php

namespace App\Http\Controllers\back;

use App\Admin;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function index()
    {
        return view('back.admin.admin');
    }

    public function create()
    {
        return view('back.admin.create');

    }

    public function store(Request $request)
    {
//        $admin = new Admin();
//        $admin->
    }

    public function show($user)
    {
        $users = User::paginate(10);
        return view('back.admin.user', compact('users'));
    }

    public function edit(Admin $admin)
    {
        //
    }

    public function update(Request $request, Admin $admin)
    {
        //
    }

    public function destroy($email)
    {
        $admin = Admin::where('email', $email)->first();
        $user = User::where('email', $email)->first();
        if($admin)
            $admin->delete();

        if ($user)
            $user->delete();

        return back();
    }

    public function usersIndex()
    {

    }
}
