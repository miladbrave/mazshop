@extends('back.layout.master')

@section('content')
    @include('back.layout.sidebar')
    <div class="main-container gray-bg" id="app">
        <div class="main-content">
            <div class="row">
                <div class="col-lg-12 animatedParent animateOnce z-index-46">
                    <div class="panel panel-default animated fadeInUp">
                        <div class="panel-body min-height-100">
                            <h1 class="page-title">
                                <span class="fa fa-envelope"></span>
                                لیست پیام های عمومی

                                <hr>
                            </h1>
                            <div class="panel-body wt-panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-border table-hover">
                                        <thead>
                                        <tr>
                                            <th class="text-center">کاربر</th>
                                            <th class="text-center">نام</th>
                                            <th class="text-center">ایمیل</th>
                                            <th class="text-center">متن</th>
                                            <th class="text-center">ابزار</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            @foreach($messages as $message)
                                                <td class="text-center">{{$message->user()->fname}}</td>
                                                <td class="text-center">{{$message->name}}</td>
                                                <td class="text-center">{{$message->email}}</td>
                                                <td class="text-center">{!! Str::limit($message->description,20) !!}</td>
                                            @endforeach
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
