@extends('front.layout.master')

@section('content')
    <div id="container">
        <div class="container">
            <div class="row">
                <aside id="column-left" class="col-sm-3 hidden-xs">
                    <h3 class="subtitle">دسته ها</h3>
                    <div class="box-category">
                        <ul id="cat_accordion">
                            @foreach($navcategories as $nav)
                                <li><a href="javascript:;">{{$nav->title}}</a> <span
                                        class="down"></span>
                                    <ul style="display:block;">
                                        @foreach($maincategories as $main)
                                            @if($nav->title == $main->type)
                                                <li>
                                                    <a href="{{route('category',['id'=>$main->title])}}">{{$main->title}}</a>
                                                    <span class="down"></span>
                                                    <ul>
                                                        @foreach($subcategories as $sub)
                                                            @if($main->id == $sub->type)
                                                                <li><a href="{{route('category',['id'=>$sub->title])}}"
                                                                       style="color: red">{{$sub->title}}</a>
                                                                </li>
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @endif
                                        @endforeach
                                    </ul>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <hr>
                    <div class="banner owl-carousel">
                        <div class="item"><a href="#"><img
                                    src="{{asset('/front/img/b1.jpg')}}" alt="small banner"
                                    class="img-responsive"/></a></div>
                        <div class="item"><a href="#"><img
                                    src="{{asset('/front/img/b2.jpg')}}" alt="small banner1"
                                    class="img-responsive"/></a></div>
                    </div>
                </aside>

                <div id="content" class="col-sm-9">
                    <h1 class="title">دانلود ها</h1>
                    <hr>
                    <div class="row products-category">
                        @if($downloads)
                            @foreach($downloads as $download)
                                <div class="product-layout product-list col-xs-12">
                                    <div class="product-thumb">
                                        <div class="image"><img
                                                    src="{{asset('/front/img/download.png')}}" width="80%"
                                                    alt="{{$download->title}}" title="{{$download->title}}"
                                                    class="img-responsive"/></div>
                                        <div>
                                            <div class="caption">
                                                <h3>{{$download->title}}</h3>
                                                <p>{!! Str::limit($download->description,150) !!}</p>

                                                <p class="price">
                                                    <span class="price-new">{{$download->price}} تومان</span><br>
                                                </p>

                                                <div class="button-group pull-left">
                                                    <a class="btn-primary"
                                                       href="{{route('add.cart.download',['id'=>$download->id])}}"><span>افزودن به سبد</span>
                                                    </a>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        @if(!isset($download))
                            <h2 class="text-danger">متاسفانه محصولی یافت نشد!</h2>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
