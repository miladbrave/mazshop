<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Message;
use App\User;
use App\Userlist;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class dashboardController extends Controller
{
    public function index()
    {
//        $data = Userlist::all();
//        $chart = Chart::create('bar', 'highcharts')
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
}
