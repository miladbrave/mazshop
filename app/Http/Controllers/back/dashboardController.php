<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Message;
use App\User;
use App\Userlist;
use Illuminate\Http\Request;


class dashboardController extends Controller
{
    public function index()
    {
//        $data = Userlist::all();
//        $chart = Charts::create('bar', 'highcharts')
//            ->title('My nice chart')
//            ->elementLabel('My nice label')
//            ->labels($data->pluck('created_at'))
//            ->values($data->pluck('totalprice'))
//            ->responsive(true);

        $users = User::all();
        $totalrecive = Userlist::where('status','success')->get();
        return view('back.index',compact('users','totalrecive','chart'));
    }

    public function messages()
    {
        $messages = Message::with('user')->get();
        return view('back/message/messagepublic',compact('messages'));
    }

    public function delete($id)
    {
        $message = Message::find($id);
        $message->delete();
        return back();
    }

    public function sendmessages()
    {
        $users = User::all();
        return view('back.message.adminmessage',compact('users'));
    }

    public function send(Request $request)
    {
        $message = new Message();
        $message->description = $request->description;
        $message->user_id = $request->user;
        $message->email = "admin";
        $message->name = "admin";
        $message->type = "send";
        $message->save();
        return back();
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

}
