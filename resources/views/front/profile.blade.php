@extends('front.layout.master')


@section('content')
    <div class="pro">
        <div class="">
            <div class="row">
                <div class="col-md-3 col-sm-9 col-xs-12" style="width: 22%">
                    <div class="n-top"><img src="{{asset('/front/img/avatar.jpg')}}">
                        <h4>{{auth()->user()->fname}} {{auth()->user()->lname}}</h4>
                    </div>
                    <div class="n-right">
                        <ul class="nav nav-pills nav-stacked ">
                            <li></li>
                            <li class="active"><a data-toggle="pill" href="#about"><img
                                        src="{{asset('/front/img/User.png')}}">اطلاعات
                                    کاربر</a></li>
                            <li><a data-toggle="pill" href="#subset"><img src="{{asset('/front/img/Bought.png')}}">سوابق
                                    خرید</a></li>
                            <li><a data-toggle="pill" href="#contact"><img src="{{asset('/front/img/Account.png')}}">
                                    ارسال پیام</a></li>
                            <li><a data-toggle="pill" href="#adventures"><img src="{{asset('/front/img/Plan.png')}}">پیام
                                    ها</a></li>
                            <li><a href="{{route('logout')}}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><img
                                        src="{{asset('/front/img/Exit.png')}}">
                                    خروج</a></li>
                        </ul>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                              style="display: none;">
                            @csrf
                        </form>
                    </div>
                </div>
                <div class="col-md-8 col-sm-9 col-xs-12">
                    <div class="tab-content n-left">
                        @if(Session::has('message'))
                            <div class="alert alert-success container" style="width: 100%">
                                <div>{{ Session('message') }}</div>
                            </div>
                        @endif

                        <div id="about" class="tab-pane fade in active">
                            <h2>اطلاعات کاربر</h2>
                            <p><span><i class="fa fa-user-circle"></i><strong>نام و نام خانوادگی :</strong>
                                    <span class="text-danger h3"
                                          style="margin-right: 1%">{{auth()->user()->fname}} {{auth()->user()->lname}}</span>
                                </span></p>
                            <p><span><i class="fa fa-envelope"></i><strong>ایمیل :</strong>
                                <span class="text-danger h4" style="margin-right: 1%">{{auth()->user()->email}}</span>
                                </span></p>
                            <p><span><i class="fa fa-map-marker"></i><strong>شهر :</strong>
                                         <span class="text-danger h4"
                                               style="margin-right: 1%">{{auth()->user()->city}}</span>
                                </span></p>
                            <p><span><i class="fa fa-address-book"></i><strong> آدرس :</strong>
                                         <span class="text-danger h4"
                                               style="margin-right: 1%">{{auth()->user()->address}}</span>
                                </span></p>
                            <p><span><i class="fa fa-codepen"></i><strong>کد پستی :</strong>
                                         <span class="text-danger h4"
                                               style="margin-right: 1%">{{auth()->user()->postcode}}</span>
                                </span></p>
                            <p><span><i class="fa fa-phone"></i><strong>تلفن تماس :</strong>
                                         <span class="text-danger h4"
                                               style="margin-right: 1%">{{auth()->user()->phone}}</span>
                                </span></p>
                        </div>
                        <div id="adventures" class="tab-pane fade">
                            <h2>پیام ها</h2>
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="text-center col-md-2" scope="col">نام</th>
                                    <th class="text-center col-md-8" scope="col">توضیح</th>
                                    <th class="text-center col-md-2" scope="col">تاریخ</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($messages->where('user_id',auth()->user()->id) as $message)
                                    <tr>
                                        <td class="text-center col-md-2">{{$message->name}}</td>
                                        <td class="text-center col-md-8">{{$message->description}}</td>
                                        <td class="text-center col-md-2">{{Verta::instance($message->created_at)}}</td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div id="subset" class="tab-pane fade">
                            <h2>سوابق خرید</h2>

                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="text-center" scope="col">شماره فاکتور</th>
                                    <th class="text-center" scope="col">مبلغ فاکتور</th>
                                    <th class="text-center" scope="col">هزینه کرایه</th>
                                    <th class="text-center" scope="col">وضعیت</th>
                                    <th class="text-center" scope="col">تاریخ</th>
                                    <th class="text-center" scope="col">نمایش جزیات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($userlists as $userlist)
                                    <tr>
                                        <td class="text-center">{{$userlist->factor}}</td>
                                        <td class="text-center">{{$userlist->totalprice}}</td>
                                        <td class="text-center">{{$userlist->receiveprice}}</td>
                                        <td class="text-center">{{$userlist->status}}</td>
                                        <td class="text-center">{{Verta::instance($userlist->created_at)->format('%B %d، %Y')}}</td>
                                        <td class="text-center">
                                            <button class="btn btn-default btn-rounded btn-sm"
                                                    data-toggle="modal" data-target="#{{$userlist['id']}}"
                                                    type="button"><i class="fa fa-envelope"></i> نمایش
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div id="contact" class="tab-pane fade">
                            <h2>ارتباط با مدیریت سایت</h2>
                            <div class="card card-signup">
                                <form action="{{route('contact.messages',['id' => auth()->user()->id])}}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-8">
                                            <div class="input-group">
    											 <span class="input-group-addon">
    												<i class="fa fa-user-circle"></i>موضوع
    											 </span>
                                                <input type="text" class="form-control" name="name"
                                                       placeholder="موضوع">
                                            </div>
                                        </div>
                                        <div class="form-group col-md-8">
                                            <div class="input-group">
    											<span class="input-group-addon">
    											  <i class="fa fa-envelope"></i>پست الکترونیک
    											</span>
                                                <input type="text" class="form-control" name="email"
                                                       value="{{auth()->user()->email}}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group col-md-8">
                                            <div class="input-group">
    											<span class="input-group-addon">
    											  <i class="fa fa-pencil"></i>متن پیام
    											</span>
                                                <textarea placeholder="متن پیام ..." name="description"
                                                          class="form-control" required
                                                          rows="3"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="buttons">
                                        <div class="pull-right">
                                            <input class="btn btn-primary" type="submit" value="ارسال"/>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @foreach($userlists as $userlist)
        <div class="modal fade" id="{{$userlist['id']}}" tabindex="-1" role="dialog"
             aria-labelledby="{{$userlist['id']}}"
             aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="{{$userlist['id']}}">{{$userlist->fname}}</h5>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            @foreach($purchlist as $purch)
                                @foreach($purch->where('factor_number',$userlist->id) as $pur)
                                    @foreach($purchl->where('id',$pur->product_id) as $p)
                                        <div class="col-md-3">
                                            <img src="{{asset($p->photos->first()->path)}}" alt="" width="100%"
                                                 height="100px">
                                            {{$p->name}}<br>
                                            <span class="text-danger">{{$p->price}} تومان</span><br>
                                            تعداد : {{$pur->count}}
                                        </div>
                                    @endforeach
                                    @foreach($downloads as $download)
                                        @if("download".$download->id == $pur->product_id)
                                            <div class="col-md-3">
                                                <img src="{{asset('/front/img/download.png')}}" alt="" width="100%"
                                                     height="100px">
                                                <strong>{{$download->title}}</strong><br><br>
                                                <a
                                                    href="{{route('download.show',['download' => $download->id])}}"
                                                    class="badge badge-pill"
                                                    style="background-color: green;font-size:15px;">
                                                    دانلود
                                                </a>
                                            </div>
                                        @endif
                                    @endforeach
                                @endforeach
                            @endforeach

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">بستن</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection



