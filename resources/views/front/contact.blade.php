@extends('front.layout.master')

@section('content')
    <div id="container">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{route('home')}}"><i class="fa fa-home"></i></a></li>
                <li><a href="{{route('contact')}}">تماس با ما</a></li>
            </ul>
            <div class="row">
                <div id="content" class="col-sm-9">
                    <h1 class="title">تماس با ما</h1>
                    <h3 class="subtitle">مبتکران آذر ذهن (Maz.co)</h3>
                    <div class="row">
                        <div class="col-sm-3"><img src="{{asset('/front/img/m1.jpeg')}}"
                                                   alt="قالب مارکت شاپ" title="قالب مارکت شاپ" class="img-thumbnail"/>
                        </div>
                        <div class="col-sm-3"><strong>آدرس</strong><br/>
                            <address>
                                آذربایجان شرقی، تبریز<br/>
                                چهار راه محققی ،<br/>
                                پاساژ چهل ستون نو <br/>
                                زیرزمین - پلاک 4
                            </address>
                        </div>
                        <div class="col-sm-3" style="direction: ltr"><strong>شماره تلفن</strong><br>
                            041 3557 6982 <br/>
                            <br/>
                            <strong style="direction: ltr">:موبایل (تلگرام، واتساپ)</strong><br>
                            09364113060
                        </div>
                        <div class="col-sm-3"><strong>ساعات کار</strong><br/>
                            شنبه تا پنجشنبه 11 الی 20<br/>
                            <br/>
                            <strong>ایمیل:</strong><br/>
                            MazTabriz@gmail.com
                        </div>
                        <div class="col-md-12" style="margin-bottom: 2%">
                            <h5 style="line-height: 25px;font-family: 'IRANSansWeb', sans-serif">مشتریان گرامی جهت
                                پرداخت بصورت کارت به کارت میتوانند مبلغ مورد نظر را به شماره کارت زیر پرداخت نموده، سپس
                                اسکرین شات مربوط به پرداخت را به شماره موبایل مذکور در بالا ارسال نمایند
                                <span class="text-danger">(دقت بفرمایید که هزینه ارسال نیز پرداخت شود)</span>
                            </h5>
                        </div>

                        <div class="col-md-3">
                            <span
                                style="font-family: 'IRANSansWeb', sans-serif;font-size: 15px">شماره کارت بانک ملت :</span>
                        </div>
                        <div class="col-md-3">
                            <span style="font-family: 'IRANSansWeb', sans-serif;font-size: 15px;color: red">6104337915729857</span>
                        </div>
                        <div class="col-md-4">
                            <span style="font-family: 'IRANSansWeb', sans-serif;font-size: 15px">بنام علی یزدانی</span>
                        </div>
                    </div>
                    <hr>
                    <br>

                    <div class="alert alert-success row" role="alert">
                        <div class="col-md-10">
                            <p> شما می توانید از این لینک به صورت مستقیم مبلغ را به حساب <strong> علی یزدانی </strong>
                                واریز
                                کنید.
                            </p>
                        </div>
                        <div class="col-md-2">
                            <div class="feature-box fbox_1">
                                <button type="button" data-toggle="modal" data-target="#pay"
                                        class="btn btn-success">پرداخت
                                </button>
                                <div class="modal fade" id="pay" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="exampleModalLongTitle">لطفا فرم زیر را پر
                                                    کنید</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{route('directpay')}}" method="post"
                                                      enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div
                                                                class="form-group @if($errors->has('name')) has-error @endif">
                                                                <label>نام(پرداخت کننده)</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i
                                                                            class="fa fa-user"
                                                                            style="top: 8px;right: 3px;left: 253px"></i></span>
                                                                    <input type="text" class="form-control"
                                                                           name="name" required
                                                                           value="{{old('name')}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div
                                                                class="form-group @if($errors->has('price')) has-error @endif">
                                                                <label>مبلغ (تومان)</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i
                                                                            class="fa fa-dollar"
                                                                            style="top: 8px;right: 3px;left: 253px">
                                                                        </i></span>
                                                                    <input type="text" class="form-control"
                                                                           name="price" required
                                                                           value="{{old('price')}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div
                                                                class="form-group @if($errors->has('description')) has-error @endif">
                                                                <label>توضیح</label>
                                                                <div class="input-group">
                                                                    <span class="input-group-addon"><i
                                                                            class="fa fa-tag"
                                                                            style="top: 8px;right: 3px;left: 100%">
                                                                        </i></span>
                                                                    <input type="text" class="form-control"
                                                                           name="description"
                                                                           value="{{old('description')}}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5">
                                                            {!! NoCaptcha::display() !!}
                                                        </div>
                                                        <div class="col-md-5">
                                                            @if ($errors->has('g-recaptcha-response'))
                                                                <span class="help-block">
                                                                         <h4 class="text-danger">
                                                                             {{ $errors->first('g-recaptcha-response') }}
                                                                         </h4>
                                                                    </span>
                                                            @endif
                                                        </div>
                                                        <div class="col-md-12" style="margin-top: 3%">
                                                            <input type="submit" name="submit" value="پرداخت"
                                                                   class="btn btn-success pull-right">
                                                            <button type="button" class="btn btn-secondary pull-right"
                                                                    data-dismiss="modal">بستن
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <form class="form-horizontal" action="{{route('contact.messages')}}" method="post">
                        @csrf
                        <fieldset class="mt-5">
                            <h3 class="subtitle">با ما ارتباط برقرار کنید</h3>
                            @if(Session::has('message'))
                                <div class="alert alert-success container" style="width: 100%">
                                    <div>{{ Session('message') }}</div>
                                </div>
                            @endif
                            <div class="form-group required">
                                <label class="col-md-2 col-sm-3 control-label" for="input-name">نام شما</label>
                                <div class="col-md-10 col-sm-9">
                                    <input type="text" name="name" value="" id="input-name" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group required">
                                <label class="col-md-2 col-sm-3 control-label" for="input-email">آدرس ایمیل</label>
                                <div class="col-md-10 col-sm-9">
                                    <input type="text" name="email" value="" id="input-email" class="form-control"
                                           required/>
                                </div>
                            </div>
                            <div class="form-group required">
                                <label class="col-md-2 col-sm-3 control-label" for="input-enquiry">پرسش</label>
                                <div class="col-md-10 col-sm-9">
                                    <textarea name="description" rows="10" id="input-enquiry"
                                              class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    {!! NoCaptcha::display() !!}
                                </div>
                                <div class="col-md-6">
                                    @if ($errors->has('g-recaptcha-response'))
                                        <span class="help-block">
                                            <h3 class="text-danger">{{ $errors->first('g-recaptcha-response') }}</h3>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </fieldset>
                        <div class="buttons">
                            <div class="pull-right">
                                <input class="btn btn-primary" type="submit" value="ارسال"/>
                            </div>
                        </div>
                    </form>
                </div>
                <aside id="column-right" class="col-sm-3 hidden-xs">
                    <div class="list-group" style="margin-top: 31%">
                        <h2 class="subtitle">مبتکران</h2>
                        <p style="text-align: justify;font-size: 16px;font-family: 'IRANSansWeb', sans-serif;line-height: normal">
                            این فروشگاه اینترنتی به مدیریت مهندس علی یزدانی کارشناسی ارشد رشته مکاترونیک و سرپرست تیم پر
                            افتخار رباتیک ایلدیریم تبریز مفتخر است قطعات کامل رباتیک در تبریز را بصورت آنلاین و همچنین
                            حضوری ارائه نماید . انواع قطعات رباتیک ، بدنه های رباتیک ،سازه های دانش آموزی ، پک های
                            آموزشی رباتیک در تبریز قابل ارائه‌‌ می‌باشند.</p>
                    </div>
                    <hr class="subtitle">
                    <div class="banner owl-carousel">

                        <div class="item"><a href="#"><img
                                    src="{{asset('/front/img/b1.jpg')}}" alt="small banner"
                                    class="img-responsive"/></a></div>
                        <div class="item"><a href="#"><img
                                    src="{{asset('/front/img/b2.jpg')}}" alt="small banner1"
                                    class="img-responsive"/></a></div>
                    </div>
                </aside>
            </div>
        </div>
    </div>



@endsection
