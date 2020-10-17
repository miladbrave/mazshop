@extends('front.layout.master')

@section('content')
    <div class="body">
        <div class="row">
            <div id="content" class="col-xs-12">
                <div class="slideshow single-slider owl-carousel">
                    @foreach($sliders->where('number','ویژه') as $slider)
                        <div class="item slider_img"><a href="{{$slider->link}}">
                                <img class="img-responsive"
                                     src="{{asset($slider->photo()->first()->path)}}"
                                     alt="banner 2"/></a></div>
                    @endforeach
                    @foreach($sliders->where('number',1) as $slider)
                        <div class="item slider_img"><a href="{{$slider->link}}">
                                <img class="img-responsive"
                                     src="{{asset($slider->photo()->first()->path)}}"
                                     alt="banner 2"/></a></div>
                    @endforeach
                    @foreach($sliders->where('number',2) as $slider)
                        <div class="item slider_img"><a href="{{$slider->link}}">
                                <img class="img-responsive"
                                     src="{{asset($slider->photo()->first()->path)}}"
                                     alt="banner 2"/></a></div>
                    @endforeach
                    @foreach($sliders->where('number',3) as $slider)
                        <div class="item slider_img"><a href="{{$slider->link}}">
                                <img class="img-responsive"
                                     src="{{asset($slider->photo()->first()->path)}}"
                                     alt="banner 2"/></a></div>
                    @endforeach
                </div>

                <div class="marketshop-banner">
                    <div class="row">
                        @foreach($banners->where('number',1) as $banner)
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" id="banner1"><a
                                    href="{{$banner->link}}"><img
                                        src="{{asset($banner->photo()->first()->path)}}"
                                        alt="بنر نمونه 2" title="بنر نمونه 2"/>
                                    <div class="overlay">{{$banner->title}}</div>
                                </a></div>
                        @endforeach
                        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                            @foreach($banners->where('number',2) as $banner)
                                <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12" id="banner"><a
                                        href="{{$banner->link}}"><img
                                            src="{{asset($banner->photo()->first()->path)}}"
                                            alt="بنر نمونه 2" title="بنر نمونه 2"/>
                                        <div class="overlay" style="bottom: -12%">{{$banner->title}}</div>
                                    </a></div>
                            @endforeach
                            @foreach($banners->where('number',3) as $banner)
                                <div class="col-lg-12 col-md-12 col-sm-6 col-xs-12" id="banner"><a
                                        href="{{$banner->link}}"><img
                                            src="{{asset($banner->photo()->first()->path)}}"
                                            alt="بنر نمونه 2" title="بنر نمونه 2"/>
                                        <div class="overlay">{{$banner->title}}</div>
                                    </a></div>
                            @endforeach
                        </div>
                        @foreach($banners->where('number',4) as $banner)
                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12" id="banner4"><a
                                    href="{{$banner->link}}"><img
                                        src="{{asset($banner->photo()->first()->path)}}"
                                        alt="بنر نمونه 2" title="بنر نمونه 2"/>
                                    <div class="overlay">{{$banner->title}}</div>
                                </a></div>
                        @endforeach
                    </div>

                </div>

                <div id="product-tab" class="product-tab" style="padding-top: 3%;padding-bottom: 2%">
                    <ul id="tabs" class="tabs">
                        <li><a href="#tab-pack">پک های روباتیک</a></li>
                        <li><a href="#tab-mechanical">سازه های مکانیکی</a></li>
                        <li><a href="#tab-motor">موتورها</a></li>
                        <li><a href="#tab-fly">پروازی</a></li>
                        <li><a href="#tab-others">سایر موارد</a></li>
                    </ul>
                    <div id="tab-pack" class="tab_content">
                        <div class="owl-carousel product_carousel_tab">
                            @foreach($products->where('type',1) as $product)
                                <div class="product-thumb clearfix">
                                    <div class="image"><a href="{{route('product.self',$product->slug)}}"><img
                                                src="{{asset(asset($product->photos()->first()->path))}}"
                                                alt="{{$product->name}}" title="{{$product->name}}"
                                                class="img-responsive"/></a></div>
                                    <div class="caption">
                                        <h3>
                                            <a href="{{route('product.self',$product->slug)}}">{{$product->name}}</a>
                                        </h3>
                                        @if($product->exist == 1)
                                            @if($product->discount)
                                                <p class="price">
                                                    <span class="price-new">{{\App\Helpers\Helpers::discount($product->price,$product->discount)}} تومان</span><br>
                                                    <span
                                                        class="price-old">{{$product->price}} تومان</span>
                                                    <span
                                                        class="saving">-{{$product->discount}}%</span>
                                                </p>
                                            @else
                                                <p class="price">
                                                    <span class="price-new">{{\App\Helpers\Helpers::discount($product->price,$product->discount)}} تومان</span>
                                                </p>
                                            @endif
                                        @elseif($product->exist == 2)
                                            <h4 style="padding-bottom: 15%;font-weight: bold;color: red">موجود نمی
                                                باشد.</h4>
                                        @endif
                                    </div>
                                    @if($product->exist == 1)
                                        <div class="button-group pull-right">
                                            <h5 class="text-info"> در انبار {{$product->count}} عدد</h5>
                                        </div>
                                        <div class="button-group pull-left">
                                            <a class="btn-primary"
                                               href="{{route('add.cart',['id'=>$product->id])}}"><span>افزودن به سبد</span>
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div id="tab-mechanical" class="tab_content">
                        <div class="owl-carousel product_carousel_tab">
                            @foreach($products->where('type',2) as $product)
                                <div class="product-thumb clearfix">
                                    <div class="image"><a href="{{route('product.self',$product->slug)}}"><img
                                                src="{{asset(asset($product->photos()->first()->path))}}"
                                                alt="{{$product->name}}" title="{{$product->name}}"
                                                class="img-responsive"/></a></div>
                                    <div class="caption">
                                        <h3>
                                            <a href="{{route('product.self',$product->slug)}}">{{$product->name}}</a>
                                        </h3>
                                        @if($product->exist == 1)
                                            @if($product->discount)
                                                <p class="price">
                                                    <span class="price-new">{{\App\Helpers\Helpers::discount($product->price,$product->discount)}} تومان</span><br>
                                                    <span
                                                        class="price-old">{{$product->price}} تومان</span>
                                                    <span
                                                        class="saving">-{{$product->discount}}%</span>
                                                </p>
                                            @else
                                                <p class="price">
                                                    <span class="price-new">{{\App\Helpers\Helpers::discount($product->price,$product->discount)}} تومان</span>
                                                </p>
                                            @endif
                                        @elseif($product->exist == 2)
                                            <h4 style="padding-bottom: 15%;font-weight: bold;color: red">موجود نمی
                                                باشد.</h4>
                                        @endif
                                    </div>
                                    @if($product->exist == 1)
                                        <div class="button-group pull-right">
                                            <h5 class="text-info"> در انبار {{$product->count}} عدد</h5>
                                        </div>
                                        <div class="button-group pull-left">
                                            <a class="btn-primary"
                                               href="{{route('add.cart',['id'=>$product->id])}}"><span>افزودن به سبد</span>
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div id="tab-motor" class="tab_content">
                        <div class="owl-carousel product_carousel_tab">
                            @foreach($products->where('type',3) as $product)
                                <div class="product-thumb clearfix">
                                    <div class="image"><a href="{{route('product.self',$product->slug)}}"><img
                                                src="{{asset(asset($product->photos()->first()->path))}}"
                                                alt="{{$product->name}}" title="{{$product->name}}"
                                                class="img-responsive"/></a></div>
                                    <div class="caption">
                                        <h3>
                                            <a href="{{route('product.self',$product->slug)}}">{{$product->name}}</a>
                                        </h3>
                                        @if($product->exist == 1)
                                            @if($product->discount)
                                                <p class="price">
                                                    <span class="price-new">{{\App\Helpers\Helpers::discount($product->price,$product->discount)}} تومان</span><br>
                                                    <span
                                                        class="price-old">{{$product->price}} تومان</span>
                                                    <span
                                                        class="saving">-{{$product->discount}}%</span>
                                                </p>
                                            @else
                                                <p class="price">
                                                    <span class="price-new">{{\App\Helpers\Helpers::discount($product->price,$product->discount)}} تومان</span>
                                                </p>
                                            @endif
                                        @elseif($product->exist == 2)
                                            <h4 style="padding-bottom: 15%;font-weight: bold;color: red">موجود نمی
                                                باشد.</h4>
                                        @endif
                                    </div>
                                    @if($product->exist == 1)
                                        <div class="button-group pull-right">
                                            <h5 class="text-info"> در انبار {{$product->count}} عدد</h5>
                                        </div>
                                        <div class="button-group pull-left">
                                            <a class="btn-primary"
                                               href="{{route('add.cart',['id'=>$product->id])}}"><span>افزودن به سبد</span>
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div id="tab-fly" class="tab_content">
                        <div class="owl-carousel product_carousel_tab">
                            @foreach($products->where('type',4) as $product)
                                <div class="product-thumb clearfix">
                                    <div class="image"><a href="{{route('product.self',$product->slug)}}"><img
                                                src="{{asset(asset($product->photos()->first()->path))}}"
                                                alt="{{$product->name}}" title="{{$product->name}}"
                                                class="img-responsive"/></a></div>
                                    <div class="caption">
                                        <h3>
                                            <a href="{{route('product.self',$product->slug)}}">{{$product->name}}</a>
                                        </h3>
                                        @if($product->exist == 1)
                                            @if($product->discount)
                                                <p class="price">
                                                    <span class="price-new">{{\App\Helpers\Helpers::discount($product->price,$product->discount)}} تومان</span><br>
                                                    <span
                                                        class="price-old">{{$product->price}} تومان</span>
                                                    <span
                                                        class="saving">-{{$product->discount}}%</span>
                                                </p>
                                            @else
                                                <p class="price">
                                                    <span class="price-new">{{\App\Helpers\Helpers::discount($product->price,$product->discount)}} تومان</span>
                                                </p>
                                            @endif
                                        @elseif($product->exist == 2)
                                            <h4 style="padding-bottom: 15%;font-weight: bold;color: red">موجود نمی
                                                باشد.</h4>
                                        @endif
                                    </div>
                                    @if($product->exist == 1)
                                        <div class="button-group pull-right">
                                            <h5 class="text-info"> در انبار {{$product->count}} عدد</h5>
                                        </div>
                                        <div class="button-group pull-left">
                                            <a class="btn-primary"
                                               href="{{route('add.cart',['id'=>$product->id])}}"><span>افزودن به سبد</span>
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div id="tab-others" class="tab_content">
                        <div class="owl-carousel product_carousel_tab">
                            @foreach($products->where('type',5) as $product)
                                <div class="product-thumb clearfix">
                                    <div class="image"><a href="{{route('product.self',$product->slug)}}"><img
                                                src="{{asset(asset($product->photos()->first()->path))}}"
                                                alt="{{$product->name}}" title="{{$product->name}}"
                                                class="img-responsive"/></a></div>
                                    <div class="caption">
                                        <h3>
                                            <a href="{{route('product.self',$product->slug)}}">{{$product->name}}</a>
                                        </h3>
                                        @if($product->exist == 1)
                                            @if($product->discount)
                                                <p class="price">
                                                    <span class="price-new">{{\App\Helpers\Helpers::discount($product->price,$product->discount)}} تومان</span><br>
                                                    <span
                                                        class="price-old">{{$product->price}} تومان</span>
                                                    <span
                                                        class="saving">-{{$product->discount}}%</span>
                                                </p>
                                            @else
                                                <p class="price">
                                                    <span class="price-new">{{\App\Helpers\Helpers::discount($product->price,$product->discount)}} تومان</span>
                                                </p>
                                            @endif
                                        @elseif($product->exist == 2)
                                            <h4 style="padding-bottom: 15%;font-weight: bold;color: red">موجود نمی
                                                باشد.</h4>
                                        @endif
                                    </div>
                                    @if($product->exist == 1)
                                        <div class="button-group pull-right">
                                            <h5 class="text-info"> در انبار {{$product->count}} عدد</h5>
                                        </div>
                                        <div class="button-group pull-left">
                                            <a class="btn-primary"
                                               href="{{route('add.cart',['id'=>$product->id])}}"><span>افزودن به سبد</span>
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>


                </div>

                <section id="subscribe">
                    <div class="container mt-5">
                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="subscribe-title">سوالات خود را از ما بپرسید.</h3>
                                <a class="subscribe-btn" href="#">اطلاعات بیشتر</a>
                            </div>
                        </div>
                    </div>
                </section>

                <div class="marketshop-banner2">
                    <div class="row">
                        @foreach($ads as $ad)
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="ad"><a
                                    href="{{route('video',["id" => $ad->title])}}"><img
                                        src="{{asset($ad->photo()->first()->path)}}"
                                        alt="{{$ad->title}}"/></a>
                                <div class="overlay2">{{$ad->title}}</div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{--                <div id="carousel" class="owl-carousel nxt">--}}
                {{--                    <div class="item text-center"><a href="#"><img--}}
                {{--                                src="{{asset('/front/image/product/apple_logo-100x100.jpg')}}" alt="پالم"--}}
                {{--                                class="img-responsive"/></a></div>--}}
                {{--                    <div class="item text-center"><a href="#"><img--}}
                {{--                                src="{{asset('/front/image/product/canon_logo-100x100.jpg')}}" alt="سونی"--}}
                {{--                                class="img-responsive"/></a></div>--}}
                {{--                    <div class="item text-center"><a href="#"><img--}}
                {{--                                src="{{asset('/front/image/product/apple_logo-100x100.jpg')}}" alt="کنون"--}}
                {{--                                class="img-responsive"/></a></div>--}}
                {{--                    <div class="item text-center"><a href="#"><img--}}
                {{--                                src="{{asset('/front/image/product/canon_logo-100x100.jpg')}}" alt="اپل"--}}
                {{--                                class="img-responsive"/></a></div>--}}
                {{--                    <div class="item text-center"><a href="#"><img--}}
                {{--                                src="{{asset('/front/image/product/apple_logo-100x100.jpg')}}" alt="اچ تی سی"--}}
                {{--                                class="img-responsive"/></a></div>--}}
                {{--                    <div class="item text-center"><a href="#"><img--}}
                {{--                                src="{{asset('/front/image/product/canon_logo-100x100.jpg')}}" alt="اچ پی"--}}
                {{--                                class="img-responsive"/></a></div>--}}
                {{--                    <div class="item text-center"><a href="#"><img--}}
                {{--                                src="{{asset('/front/image/product/apple_logo-100x100.jpg')}}" alt="brand"--}}
                {{--                                class="img-responsive"/></a></div>--}}
                {{--                    <div class="item text-center"><a href="#"><img--}}
                {{--                                src="{{asset('/front/image/product/canon_logo-100x100.jpg')}}" alt="brand1"--}}
                {{--                                class="img-responsive"/></a></div>--}}
                {{--                </div>--}}

                <div class="custom-feature-box">
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="feature-box fbox_1">
                            <img type="button" data-toggle="modal" data-target="#buy"
                                 src="{{asset('/front/img/buy.png')}}">
                            <div class="modal fade" id="buy" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="exampleModalLongTitle">نحوه خرید</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>نحوه خرید از فروشگاه بسیار ساده و راحت می باشد. شما می بایست در ابتدا یک
                                                حساب کاربری ایجاد کنید، سپس محصولات مورد نیاز خود را به سبد خرید خود
                                                اضافه کرده و در نهایت با انتخاب نوع پرداخت و نحوه ارسال، سفارش خود را
                                                نهایی کنید.</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary pull-right"
                                                    data-dismiss="modal">Close
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="feature-box fbox_1">
                            <img type="button" data-toggle="modal" data-target="#setting"
                                 src="{{asset('/front/img/setting.png')}}" style="max-width: 45%">
                            <div class="modal fade" id="setting" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="exampleModalLongTitle">پشتیبانی و مشاوره
                                                فنی</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>شما می توانید جهت مشاوره رایگان و همچنین پشتیبانی فنی محصولات فروشگاه با
                                                شماره های تماس فروشگاه تماس حاصل فرمایید. لازم به ذکر است که پشتیبانی
                                                فنی در جهت
                                                راهنمایی برای خرید و جهت رفع مشکلات فنی بعد از خرید می باشد</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary pull-right"
                                                    data-dismiss="modal">Close
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="feature-box fbox_1">
                            <img type="button" data-toggle="modal" data-target="#consule"
                                 src="{{asset('/front/img/consule.png')}}">
                            <div class="modal fade" id="consule" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="exampleModalLongTitle">شماره تماس</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>
                                                تماس با دفتر مرکزی فروشگاه:
                                                <br>
                                                شماره تماس: 041-35576982
                                                <br>
                                                شماره تماس: 09364113060
                                                <br>
                                                ایمیل: eshop.eca@gmail.com
                                                <br>
                                                تبریز-چهار راه محققی-پاساژ چهل ستون نو-زیرزمین پلاک 4
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary pull-right"
                                                    data-dismiss="modal">Close
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="feature-box fbox_1">
                            <img type="button" data-toggle="modal" data-target="#send"
                                 src="{{asset('/front/img/send.png')}}">
                            <div class="modal fade" id="send" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="exampleModalLongTitle">ارسال رایگان</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>
                                                شما می توانید از خدمات رایگان ارسال برای سفارشات بالای 500 هزارتومان خود
                                                بهره مند شوید.
                                                <br>
                                                در هنگام ثبت سفارش، نحوه ارسال را پست سفارشی انتخاب کنید تا هزینه ارسال
                                                برای شما رایگان محاسبه شود.
                                                <br>
                                                لازم به ذکر است که در صورت انتخاب این گزینه، بسته شما طی 5 الی 10 روز
                                                آینده به دست شما خواهد رسید.
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary pull-right"
                                                    data-dismiss="modal">Close
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="feature-box fbox_1">
                            <img type="button" data-toggle="modal" data-target="#pay"
                                 src="{{asset('/front/img/pay.png')}}">
                            <div class="modal fade" id="pay" tabindex="-1" role="dialog"
                                 aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="exampleModalLongTitle">شماره حساب</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p>
                                                بانک ملت
                                                <br>
                                                6104337915729857
                                                <br>
                                                علی یزدانی
                                            </p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary pull-right"
                                                    data-dismiss="modal">Close
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade" id="message" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body" id="txtHint">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary pull-right" data-dismiss="modal">بستن</button>
                </div>
            </div>
        </div>
    </div>
@endsection
