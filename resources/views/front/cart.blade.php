@extends('front.layout.master')

@section('content')
    <div id="container">
        <div class="container">
            <div class="row">
                <div id="content" class="col-sm-12">
                    <h1 class="title">سبد خرید</h1>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <td class="text-center">تصویر</td>
                                <td class="text-left">نام محصول</td>
                                <td class="text-left">کد محصول</td>
                                <td class="text-left">تعداد</td>
                                <td class="text-center">قیمت واحد</td>
                                <td class="text-center">کل</td>
                            </tr>
                            </thead>
                            <tbody>
                            @if($cart)
                                @foreach($cart->items as $product)
                                    <tr>
                                        <td class="text-center" style="width: 20%;">
                                            <a href="{{route('product.self',['slug' => $product['item']->slug])}}">
                                                <img
                                                    src="{{asset($product['item']->photos()->first()->path)}}"
                                                    alt="{{$product['item']->name}}" title="{{$product['item']->name}}"
                                                    class="img-thumbnail"/>
                                            </a>
                                        </td>
                                        <td class="text-left">
                                            <a href="{{route('product.self',['slug' => $product['item']->slug])}}">{{$product['item']->name}}</a><br/>
                                        </td>
                                        <td class="text-left">
                                            {{$product['item']->sku}}
                                        </td>
                                        <td class="text-left">
                                            <div class="input-group btn-block quantity">
                                                <form action="{{route('add.qty',['id'=>$product['item']])}}"
                                                      method="get">
                                                    <input type="text" name="quantity" value="{{$product['qty']}}"
                                                           size="1"
                                                           class="form-control"/>
                                                    <span class="input-group-btn">
                                                    <input type="submit" data-toggle="tooltip" value="بروزرسانی"
                                                           class="btn btn-primary" title="بروزرسانی محصول"><i
                                                            class="fa fa-refresh"></i>
                                                 <a type="button" data-toggle="tooltip" title="حذف محصول"
                                                    class="btn btn-danger"
                                                    href="{{route('remove.product',['id'=>$product['item']])}}"><i
                                                         class="fa fa-times-circle"></i>
                                                 </a>
                                                 </span>
                                                </form>
                                            </div>
                                        </td>
                                        <td class="text-center">{{\App\Helpers\Helpers::discount($product['item']->price,$product['item']->discount)}}
                                            تومان
                                        </td>
                                        <td class="text-center">{{$product['price']}} تومان</td>
                                    </tr>

                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <h2 class="subtitle">در صورتی که کد تخفیف در اختیار دارید میتوانید از آن در اینجا استفاده کنید.</h2>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">استفاده از کوپن تخفیف</h4>
                                </div>
                                <div id="collapse-coupon" class="panel-collapse collapse in">
                                    <div class="panel-body">
                                        <label class="col-sm-4 control-label" for="input-coupon">کد تخفیف خود را در
                                            اینجا وارد کنید</label>
                                        <div class="input-group">
                                            <input type="text" name="coupon" value=""
                                                   placeholder="کد تخفیف خود را در اینجا وارد کنید" id="input-coupon"
                                                   class="form-control"/>
                                            <span class="input-group-btn">
                                                    <input type="button" value="اعمال کوپن" id="button-coupon"
                                                           data-loading-text="بارگذاری ..."
                                                           class="btn btn-primary"/>
                                                    </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-4">
                            <table class="table table-bordered">
                                <tr>
                                    <td class="text-right"><strong>جمع کل</strong></td>
                                    <td class="text-right">{{Session::get('cart')->totalPurePrice}}تومان
                                </tr>
                                <tr>
                                    <td class="text-right"><strong>تخفیف</strong></td>
                                    <td class="text-right">{{Session::get('cart')->totalDiscountPrice}}
                                        تومان
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-right"><strong>کوپن :</strong></td>
                                    <td class="text-right"> {{Session::get('cart')->coupon}} تومان</td>
                                </tr>
                                <tr>
                                    <td class="text-right"><strong>قابل پرداخت</strong></td>
                                    <td class="text-right">{{Session::get('cart')->totalPrice}} تومان</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="buttons">
                        <div class="pull-left"><a href="{{route('home')}}" class="btn btn-default">ادامه خرید</a></div>
                        <div class="pull-right"><a href="{{route('checkout')}}" class="btn btn-primary">تسویه حساب</a></div>
                    </div>
                </div>
            </div>
        </div>
@endsection
