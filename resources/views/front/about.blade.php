@extends('front.layout.master')

@section('content')
    <div class="wrapper-wide">
        <div id="container">
            <div class="container">
                <!-- Breadcrumb Start-->
                <ul class="breadcrumb">
                    <li><a href="{{route('home')}}"><i class="fa fa-home"></i></a></li>
                    <li><a href="{{route('about')}}">درباره ما</a></li>
                </ul>
                <div class="row">
                    <!--Middle Part Start-->
                    <div id="content" class="col-sm-12">
                        <h1 class="title">درباره ما</h1>
                        <div class="row">
                            <div class="col-sm-12">
                                <p style="font-family: 'IRANSansWeb', sans-serif;font-size: 18px;line-height: 25px">این فروشگاه اینترنتی به مدیریت مهندس علی یزدانی کارشناسی ارشد رشته مکاترونیک و سرپرست
                                    تیم پر افتخار رباتیک ایلدیریم تبریز مفتخر است قطعات کامل رباتیک در تبریز را بصورت
                                    آنلاین و همچنین حضوری ارائه نماید .
                                    انواع قطعات رباتیک ، بدنه های رباتیک ،سازه های دانش آموزی ، پک های آموزشی رباتیک در
                                    تبریز قابل ارائه‌‌ می‌باشند.</p>

                                <div class="row">
                                    <div class="col-md-4 m-2">
                                        <img src="{{asset('/front/img/m1.jpeg')}}" width="100%" alt="مبتکران">
                                    </div>

                                    <div class="col-md-4 m-2">
                                        <img src="{{asset('/front/img/banner.jpg')}}" width="100%" alt="مبتکران">
                                    </div>

                                    <div class="col-md-4 m-2">
                                        <img src="{{asset('/front/img/m2.jpeg')}}" width="100%" alt="مبتکران">
                                    </div>
                                </div>

                                <hr style="border-top: 2px black dashed">

                                <p>قطعات رباتیک- ربات تبریز- رباتیک تبریز- تبریز رباتیک- رباتیک دانش آموزی- گروه رباتیک
                                    ایلدیریم- مسابقات رباتیک تبریز- آموزش ربات تبریز- آموزش رباتیک تبریز- آموزش رباتیک
                                    دانش آموزی- ساخت کاردستی دانش آموزی- بسته دانش آموزی ربات- بسته آموزشی رباتیک- شرکت
                                    مبتکران- رباتیک مبتکران- جوایز مسابقات- نتایج تبریزکاپ - تبریز ربات- رباتیک تبریز-
                                    رباتیک مبتکران</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
