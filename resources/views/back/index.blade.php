@extends('back.layout.master')

@section('content')
    @include('back.layout.sidebar')

    <div class="main-container gray-bg">
        @include('back.layout.mainheader')
        <div class="main-content">
            <h1 class="page-title"> داشبورد</h1>
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-3 animatedParent animateOnce z-index-50">
                            <div class="panel minimal panel-default animated fadeInUp">
                                <div class="panel-heading clearfix">
                                    <div class="panel-title"> اعضا</div>
                                </div>
                                <div class="panel-body">
                                    <div class="row col-with-divider">
                                        <div class="text-center stack-order">
                                            <h1 class="no-margins">{{$users->count()}} نفر</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 animatedParent animateOnce z-index-49">
                            <div class="panel minimal panel-default animated fadeInUp">
                                <div class="panel-heading clearfix">
                                    <div class="panel-title">مجموع فروش</div>
                                    <ul class="panel-tool-options">
                                        <li class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle" href="#"
                                               aria-expanded="false"><i class="icon-cog"></i></a>
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li><a href="#"><i class="icon-arrows-ccw"></i> بروزرسانی</a></li>
                                                <li><a href="#"><i class="icon-list"></i>جزییات</a></li>
                                                <li><a href="#"><i class="icon-chart-pie"></i> آمار</a></li>
                                                <li class="divider"></li>
                                                <li><a href="#"><i class="icon-cancel"></i> پاک کردن لیست</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <!-- panel body -->
                                <div class="panel-body">
                                    <div class="stack-order">
                                        <h2 class="no-margins">{{$totalrecive->sum('totalprice')}} تومان</h2>
                                        <small>{{$totalrecive->count()}} عدد فاکتور </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 animatedParent animateOnce z-index-48">
                            <div class="panel minimal panel-default animated fadeInUp">
                                <div class="panel-heading clearfix">
                                    <div class="panel-title"> بازدید کنندگان</div>
                                    <ul class="panel-tool-options">
                                        <li class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle" href="#"
                                               aria-expanded="false"><i class="icon-cog"></i></a>
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li><a href="#"><i class="icon-arrows-ccw"></i> بروزرسانی</a></li>
                                                <li><a href="#"><i class="icon-list"></i>جزییات</a></li>
                                                <li><a href="#"><i class="icon-chart-pie"></i> آمار</a></li>
                                                <li class="divider"></li>
                                                <li><a href="#"><i class="icon-cancel"></i> پاک کردن لیست</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <!-- panel body -->
                                <div class="panel-body">
                                    <div class="stack-order">
                                        <h1 class="no-margins">823</h1>
                                        <small> بازدید های جدیدی این ماه</small>
                                    </div>
                                    <div class="bar-chart-icon"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 animatedParent animateOnce z-index-47">
                            <div class="panel minimal panel-default animated fadeInUp">
                                <div class="panel-heading no-border clearfix">
                                    <ul class="panel-tool-options">
                                        <li class="dropdown">
                                            <a data-toggle="dropdown" class="dropdown-toggle" href="#"
                                               aria-expanded="false"><i class="icon-cog"></i></a>
                                            <ul class="dropdown-menu dropdown-menu-right">
                                                <li><a href="#"><i class="icon-arrows-ccw"></i> بروزرسانی</a></li>
                                                <li><a href="#"><i class="icon-list"></i>جزییات</a></li>
                                                <li><a href="#"><i class="icon-chart-pie"></i> آمار</a></li>
                                                <li class="divider"></li>
                                                <li><a href="#"><i class="icon-cancel"></i> پاک کردن لیست</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <!-- panel body -->
                                <div class="panel-body panel-content">
                                    <div class="stack-order text-center">
                                        <h1>7856</h1>
                                        <h4>محصولات فروخته شده تا کنون</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 animatedParent animateOnce z-index-49">
                    <div class="panel panel-default animated fadeInUp">
                        <div class="panel-heading clearfix">
                            <div class="panel-title">Bar Chart Example</div>
                            <ul class="panel-tool-options">
                                <li class="dropdown">
                                    <a data-toggle="dropdown" class="dropdown-toggle" href="#" aria-expanded="false"><i
                                            class="icon-cog"></i></a>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li><a href="#"><i class="icon-arrows-ccw"></i> بروزرسانی</a></li>
                                        <li><a href="#"><i class="icon-list"></i>جزییات</a></li>
                                        <li><a href="#"><i class="icon-chart-pie"></i> آمار</a></li>
                                        <li class="divider"></li>
                                        <li><a href="#"><i class="icon-cancel"></i> پاک کردن لیست</a></li>
                                    </ul>
                                </li>
                                <li><a data-rel="collapse" href="#"><i class="icon-down-open"></i></a></li>
                                <li><a data-rel="reload" href="#"><i class="icon-arrows-ccw"></i></a></li>
                                <li><a data-rel="close" href="#"><i class="icon-cancel"></i></a></li>
                            </ul>
                        </div>
                        <!-- panel body -->
                        <div class="panel-body">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>
                </div>

{{--                <div class="app">--}}
{{--                    <center>--}}
{{--                        {!! $chart->html() !!}--}}
{{--                    </center>--}}
{{--                </div>--}}


            </div>
            <footer class="animatedParent animateOnce z-index-10 fixed-bottom">
                <div class="footer-main animated fadeInUp slow">&copy; 2020 <strong><a target="_blank" href="i7v.ir">Logic</a></strong>
                    Admin Theme by <a target="_blank" href="i7v.ir">Logic</a></div>
            </footer>
        </div>
    </div>

@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
   <script>
       var ctx = document.getElementById('myChart').getContext('2d');
       var chart = new Chart(ctx, {
           type: 'line',
           data: {
               labels: ['فروردین', 'اردیبهشت', 'خرداد', 'تیر', 'مرداد', 'شهریور', 'مهر', 'آبان', 'آذر', 'دی', 'بهمن', 'اسفند'],
               datasets: [{
                   label: 'فروش کل',
                   backgroundColor: 'rgba(240,240,240,0.01)',
                   borderColor: 'rgb(255, 99, 132)',
                   data: [0, 100, 5, 2, 20, 30, 405,5, 2, 20, 30, 405]
               }]
           },
           options: {
               hover: {
                   mode: 'index'
               }
           }
       });
    </script>
@endsection
