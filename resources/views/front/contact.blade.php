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
                        <div class="col-md-12">
                            <h5 style="line-height: 25px;font-family: 'IRANSansWeb', sans-serif">مشتریان گرامی جهت
                                پرداخت بصورت کارت به کارت میتوانند مبلغ مورد نظر را به شماره کارت زیر پرداخت نموده، سپس
                                اسکرین شات مربوط به پرداخت را به شماره موبایل مذکور در بالا ارسال نمایند
                                <span class="text-danger">(دقت بفرمایید که هزینه ارسال نیز پرداخت شود)</span>
                            </h5>
                        </div>
                        <div class="col-md-3">
                            <span style="font-family: 'IRANSansWeb', sans-serif;font-size: 15px">شماره کارت بانک ملت :</span>
                        </div>
                        <div class="col-md-3">
                            <span style="font-family: 'IRANSansWeb', sans-serif;font-size: 15px;color: red" >6104337915729857</span>
                        </div>
                        <div class="col-md-4">
                            <span style="font-family: 'IRANSansWeb', sans-serif;font-size: 15px">بنام علی یزدانی</span>
                        </div>
                    </div>
                    <form class="form-horizontal" action="{{route('messages')}}" method="post">
                        <fieldset class="mt-5">
                            <h3 class="subtitle">با ما ارتباط برقرار کنید</h3>
                            <div class="form-group required">
                                <label class="col-md-2 col-sm-3 control-label" for="input-name">نام شما</label>
                                <div class="col-md-10 col-sm-9">
                                    <input type="text" name="name" value="" id="input-name" class="form-control"/>
                                </div>
                            </div>
                            <div class="form-group required">
                                <label class="col-md-2 col-sm-3 control-label" for="input-email">آدرس ایمیل</label>
                                <div class="col-md-10 col-sm-9">
                                    <input type="text" name="email" value="" id="input-email" class="form-control" required/>
                                </div>
                            </div>
                            <div class="form-group required">
                                <label class="col-md-2 col-sm-3 control-label" for="input-enquiry">پرسش</label>
                                <div class="col-md-10 col-sm-9">
                                    <textarea name="description" rows="10" id="input-enquiry"
                                              class="form-control" ></textarea>
                                </div>
                            </div>

                            {{--                        {!! NoCaptcha::renderJs() !!}--}}

                        </fieldset>
                        <div class="buttons">
                            <div class="pull-right">
                                <input class="btn btn-primary" type="submit" value="ارسال"/>
                            </div>
                        </div>
                    </form>
                </div>
                <aside id="column-right" class="col-sm-3 hidden-xs">
                    <div class="list-group">
                        <h2 class="subtitle">محتوای سفارشی</h2>
                        <p>این یک بلاک محتواست. هر نوع محتوایی شامل html، نوشته یا تصویر را میتوانید در آن قرار
                            دهید. </p>
                        <p> در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به
                            پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای
                            موجود طراحی اساسا مورد استفاده قرار گیرد. </p>
                        <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک
                            است.</p>
                    </div>
                    <div class="banner owl-carousel">
                        <div class="item"><a href="#"><img
                                    src="{{asset('/front/img/b1.jpg')}}" alt="small banner"
                                    class="img-responsive"/></a></div>
                        <div class="item"><a href="#"><img
                                    src="{{asset('/front/img/b2.jpg')}}" alt="small banner1"
                                    class="img-responsive"/></a></div>
                    </div>
                </aside>
                <!--Middle Part End -->
            </div>
        </div>
    </div>
@endsection
