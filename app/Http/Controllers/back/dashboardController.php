<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Message;
use App\User;
use App\Userlist;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class dashboardController extends Controller
{
    public function index()
    {
        $users = User::all();
        $totalrecive = Userlist::where('status','success')->get();
        return view('back.index',compact('users','totalrecive','chart'));
    }

    public function sendmain(Request $request)
    {
        $message = new Message();
        $message->description = $request->description;
        $message->user_id = $request->user;
        $message->email = "admin";
        $message->name = $request->title;
        $message->type = "public";
        $message->save();
        return back();
    }

    public function mainmessage()
    {
        return view('back.admin.adminmessage');
    }

    public function chartApi()
    {
        $userlist = Userlist::where('status','success')->get()->pluck('totalprice');
        $time = Userlist::where('status','success')->get('created_at');
        $response = [
            "price" => $userlist,
            "time" => $time ,
        ];
        return response()->json($response,200);
    }

}
