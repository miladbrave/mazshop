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

    public function show(Admin $admin)
    {
        //
    }

    public function edit(Admin $admin)
    {
        //
    }

    public function update(Request $request, Admin $admin)
    {
        //
    }

    public function destroy(Admin $admin)
    {
        //
    }

    public function usersIndex()
    {
        $users = User::paginate(10);
        return view('back.admin.user',compact('users'));
    }
}
