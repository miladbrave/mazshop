@extends('front.layout.master')


@section('content')
    <div class="pro">
        <div class="">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-12" style="width: 22%">
                    <div class="n-top"><img src="{{asset('/front/img/avatar.jpg')}}"></div>
                    <div class="n-right">
                        <ul class="nav nav-pills nav-stacked ">
                            <li></li>
                            <li><a data-toggle="pill" href="#about"><img src="{{asset('/front/img/User.png')}}">اطلاعات
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
                                <p><span><i class="fa fa-user-circle"></i><strong>نام و نام خانوادگی :</strong></span></p>
                                <p><span><i class="fa fa-envelope"></i><strong>ایمیل :</strong></span></p>
                                <p><span><i class="fa fa-map-marker"></i><strong>شهر :</strong></span>ایران | شبراز</p>
                                <p><span><i class="fa fa-address-book"></i><strong> آدرس :</strong></span></p>
                                <p><span><i class="fa fa-codepen"></i><strong>کد پستی :</strong></span></p>
                                <p><span><i class="fa fa-phone"></i><strong>تلفن تماس :</strong></span></p>
                            </div>
                            <div id="adventures" class="tab-pane fade">
                                <h2>پیام ها</h2>

                            </div>
                            <div id="subset" class="tab-pane fade">
                                <h2>سوابق خرید</h2>

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

@endsection



