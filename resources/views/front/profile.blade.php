@extends('front.layout.master')


@section('content')
    <div class="pro">
        <div class="">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-12" style="width: 22%">
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
                            <li><a data-toggle="pill" href=""><img src="{{asset('/front/img/Exit.png')}}">
                                    خروج</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-8 col-sm-9 col-xs-12">
                    <div class="tab-content n-left">
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
                                        <td class="text-center">{{$userlist->created_at}}</td>
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
                            <h2>ارتباط با پشتیبان سایت</h2>
                            <div class="card card-signup">
                                <form class="form" method="" action="">
                                    <div class="content">
                                        <div class="input-group">
    											 <span class="input-group-addon">
    												<i class="fa fa-user-circle"></i>نام
    											 </span>
                                            <input type="text" class="form-control"
                                                   placeholder="نام و نام خانوادگی">
                                        </div>
                                        <div class="input-group">
    											<span class="input-group-addon">
    											  <i class="fa fa-envelope"></i>پست الکترونیک
    											</span>
                                            <input type="text" class="form-control" placeholder="پست الکترونیک">
                                        </div>
                                        <div class="input-group">
    											<span class="input-group-addon">
    											  <i class="fa fa-pencil"></i>متن پیام
    											</span>
                                            <textarea placeholder="متن پیام ..." class="form-control"
                                                      rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="footer text-center">
                                        <a href="#" class="btn btn-simple btn-success btn-lg text-blue">ارسال
                                            پیام</a>
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
                        @foreach($purchl as $purch)
                            {{$purch->first()->name}}
                        @endforeach
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary pull-left" data-dismiss="modal">بستن</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

@endsection



