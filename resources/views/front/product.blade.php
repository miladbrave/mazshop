@extends('front.layout.master')

@section('content')
    <div id="container">
        <div class="container">
            <div class="row">
                <div id="content" class="col-sm-11">
                    <div itemscope itemtype="{{route('product.self',$product->slug)}}">
                        <h1 class="title" itemprop="name">{{$product->name}}</h1>
                        <div class="row product-info">
                            <div class="col-sm-6">
                                <div class="image">
                                    <img class="img-responsive" itemprop="image" id="zoom_01"
                                         src="{{asset($product->photos()->first()->path)}}" title="{{$product->name}}"
                                         alt="{{$product->name}}"
                                         data-zoom-image="{{asset($product->photos()->first()->path)}}"/>
                                </div>
                                <div class="center-block text-center"><span class="zoom-gallery"><i
                                            class="fa fa-search"></i> برای مشاهده گالری روی تصویر کلیک کنید</span></div>
                                <div class="image-additional" id="gallery_01">
                                    @foreach($product->photos as $photo)
                                        <a class="thumbnail" href="#"
                                           data-zoom-image="{{asset($photo->path)}}"
                                           data-image="{{asset($photo->path)}}" title="{{$product->name}}">
                                            <img src="{{($photo->path)}}" style="height: 80px"
                                                 title="{{$product->name}}" alt="{{$product->name}}"/></a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <ul class="list-unstyled description">
                                    <li><b>برند :</b> <a href="#"><span itemprop="brand">{{$product->brand}}</span></a>
                                    </li>
                                    <li><b>کد محصول :</b> <span itemprop="mpn">{{$product->sku}}</span></li>
                                    <li><b>وضعیت موجودی :</b>
                                        @if($product->exist == 1)
                                            <span class="instock">موجود</span>
                                        @elseif($product->exist == 2)
                                            <span class="nostock">نا موجود</span>
                                        @endif
                                    </li>
                                </ul>
                                <ul class="price-box">
                                    <li class="price" itemprop="offers" itemscope itemtype="http://schema.org/Offer">
                                        <span class="price-old" style="margin-right: 1%;margin-left: 7%">{{$product->price}} تومان </span>
                                        <span itemprop="price" style="font-size: 40px">{{\App\Helpers\Helpers::discount($product->price,$product->discount)}} تومان <span
                                                itemprop="availability" content="موجود"></span></span></li>
                                    <li></li>
                                </ul>
                                <div id="product">
                                    <div class="cart">
                                        <div>
                                            <a href="{{route('add.cart',['id'=>$product->id])}}" type="button"
                                               id="button-cart"
                                               class="btn btn-primary btn-lg">
                                                افزودن
                                                به سبد
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab-description" data-toggle="tab">توضیحات</a></li>
                            <li><a href="#tab-specification" data-toggle="tab">مشخصات</a></li>
                        </ul>
                        <div class="tab-content">
                            <div itemprop="description" id="tab-description" class="tab-pane active">
                                <div>
                                    {!! $product->description !!}
                                </div>
                            </div>
                            <div id="tab-specification" class="tab-pane">
                                <div id="tab-specification" class="tab-pane">
                                    <table class="table table-striped table-dark">
                                        <tbody>
                                        @foreach($product->attributevalus as $attributes)
                                            <tr>
                                                <td>{{$attributes->attribute->title}}</td>
                                                <td>{{$attributes->title}}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            {{--                            <div id="tab-review" class="tab-pane">--}}
                            {{--                                <form class="form-horizontal">--}}
                            {{--                                    <div id="review">--}}
                            {{--                                        <div>--}}
                            {{--                                            <table class="table table-striped table-bordered">--}}
                            {{--                                                <tbody>--}}
                            {{--                                                <tr>--}}
                            {{--                                                    <td style="width: 50%;"><strong><span>هاروی</span></strong></td>--}}
                            {{--                                                    <td class="text-right"><span>1395/1/20</span></td>--}}
                            {{--                                                </tr>--}}
                            {{--                                                <tr>--}}
                            {{--                                                    <td colspan="2"><p>ارائه راهکارها و شرایط سخت تایپ به پایان رسد--}}
                            {{--                                                            وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی--}}
                            {{--                                                            سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار--}}
                            {{--                                                            گیرد.</p>--}}
                            {{--                                                        <div class="rating"><span class="fa fa-stack"><i--}}
                            {{--                                                                    class="fa fa-star fa-stack-2x"></i><i--}}
                            {{--                                                                    class="fa fa-star-o fa-stack-2x"></i></span> <span--}}
                            {{--                                                                class="fa fa-stack"><i--}}
                            {{--                                                                    class="fa fa-star fa-stack-2x"></i><i--}}
                            {{--                                                                    class="fa fa-star-o fa-stack-2x"></i></span> <span--}}
                            {{--                                                                class="fa fa-stack"><i--}}
                            {{--                                                                    class="fa fa-star fa-stack-2x"></i><i--}}
                            {{--                                                                    class="fa fa-star-o fa-stack-2x"></i></span> <span--}}
                            {{--                                                                class="fa fa-stack"><i--}}
                            {{--                                                                    class="fa fa-star fa-stack-2x"></i><i--}}
                            {{--                                                                    class="fa fa-star-o fa-stack-2x"></i></span> <span--}}
                            {{--                                                                class="fa fa-stack"><i--}}
                            {{--                                                                    class="fa fa-star fa-stack-2x"></i><i--}}
                            {{--                                                                    class="fa fa-star-o fa-stack-2x"></i></span></div>--}}
                            {{--                                                    </td>--}}
                            {{--                                                </tr>--}}
                            {{--                                                </tbody>--}}
                            {{--                                            </table>--}}
                            {{--                                            <table class="table table-striped table-bordered">--}}
                            {{--                                                <tbody>--}}
                            {{--                                                <tr>--}}
                            {{--                                                    <td style="width: 50%;"><strong><span>اندرسون</span></strong></td>--}}
                            {{--                                                    <td class="text-right"><span>1395/1/20</span></td>--}}
                            {{--                                                </tr>--}}
                            {{--                                                <tr>--}}
                            {{--                                                    <td colspan="2"><p>ارائه راهکارها و شرایط سخت تایپ به پایان رسد--}}
                            {{--                                                            وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی--}}
                            {{--                                                            سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار--}}
                            {{--                                                            گیرد.</p>--}}
                            {{--                                                        <div class="rating"><span class="fa fa-stack"><i--}}
                            {{--                                                                    class="fa fa-star fa-stack-2x"></i><i--}}
                            {{--                                                                    class="fa fa-star-o fa-stack-2x"></i></span> <span--}}
                            {{--                                                                class="fa fa-stack"><i--}}
                            {{--                                                                    class="fa fa-star fa-stack-2x"></i><i--}}
                            {{--                                                                    class="fa fa-star-o fa-stack-2x"></i></span> <span--}}
                            {{--                                                                class="fa fa-stack"><i--}}
                            {{--                                                                    class="fa fa-star fa-stack-2x"></i><i--}}
                            {{--                                                                    class="fa fa-star-o fa-stack-2x"></i></span> <span--}}
                            {{--                                                                class="fa fa-stack"><i--}}
                            {{--                                                                    class="fa fa-star-o fa-stack-2x"></i></span> <span--}}
                            {{--                                                                class="fa fa-stack"><i--}}
                            {{--                                                                    class="fa fa-star-o fa-stack-2x"></i></span></div>--}}
                            {{--                                                    </td>--}}
                            {{--                                                </tr>--}}
                            {{--                                                </tbody>--}}
                            {{--                                            </table>--}}
                            {{--                                        </div>--}}
                            {{--                                        <div class="text-right"></div>--}}
                            {{--                                    </div>--}}
                            {{--                                    <h2>یک بررسی بنویسید</h2>--}}
                            {{--                                    <div class="form-group required">--}}
                            {{--                                        <div class="col-sm-12">--}}
                            {{--                                            <label for="input-name" class="control-label">نام شما</label>--}}
                            {{--                                            <input type="text" class="form-control" id="input-name" value=""--}}
                            {{--                                                   name="name">--}}
                            {{--                                        </div>--}}
                            {{--                                    </div>--}}
                            {{--                                    <div class="form-group required">--}}
                            {{--                                        <div class="col-sm-12">--}}
                            {{--                                            <label for="input-review" class="control-label">بررسی شما</label>--}}
                            {{--                                            <textarea class="form-control" id="input-review" rows="5"--}}
                            {{--                                                      name="text"></textarea>--}}
                            {{--                                            <div class="help-block"><span class="text-danger">توجه :</span> HTML--}}
                            {{--                                                بازگردانی نخواهد شد!--}}
                            {{--                                            </div>--}}
                            {{--                                        </div>--}}
                            {{--                                    </div>--}}
                            {{--                                    <div class="form-group required">--}}
                            {{--                                        <div class="col-sm-12">--}}
                            {{--                                            <label class="control-label">رتبه</label>--}}
                            {{--                                            &nbsp;&nbsp;&nbsp; بد&nbsp;--}}
                            {{--                                            <input type="radio" value="1" name="rating">--}}
                            {{--                                            &nbsp;--}}
                            {{--                                            <input type="radio" value="2" name="rating">--}}
                            {{--                                            &nbsp;--}}
                            {{--                                            <input type="radio" value="3" name="rating">--}}
                            {{--                                            &nbsp;--}}
                            {{--                                            <input type="radio" value="4" name="rating">--}}
                            {{--                                            &nbsp;--}}
                            {{--                                            <input type="radio" value="5" name="rating">--}}
                            {{--                                            &nbsp;خوب--}}
                            {{--                                        </div>--}}
                            {{--                                    </div>--}}
                            {{--                                    <div class="buttons">--}}
                            {{--                                        <div class="pull-right">--}}
                            {{--                                            <button class="btn btn-primary" id="button-review" type="button">ادامه--}}
                            {{--                                            </button>--}}
                            {{--                                        </div>--}}
                            {{--                                    </div>--}}
                            {{--                                </form>--}}
                            {{--                            </div>--}}
                        </div>
                        <h3 class="subtitle">محصولات مرتبط</h3>
                        <div class="owl-carousel related_pro">
                            @foreach($relatedProducts as $relatedProduct)
                                <div class="product-thumb">
                                    <div class="image"><a href="{{route('product.self',$relatedProduct->slug)}}"><img
                                                src="{{asset($relatedProduct->photos->first()->path)}}"
                                                alt="{{$relatedProduct->title}}" title="{{$relatedProduct->title}}"
                                                class="img-responsive"/></a></div>
                                    <div class="caption">
                                        <h4><a href="{{route('product.self',$relatedProduct->slug)}}">{{$relatedProduct->name}}</a></h4>
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
                                            <h4 style="padding-bottom: 15%;font-weight: bold;color: red">موجود نمی باشد.</h4>
                                        @endif
                                    </div>
                                    <div class="button-group">
                                        <a class="btn-primary"
                                           href="{{route('add.cart',['id'=>$product->id])}}"><span>افزودن به سبد</span>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
