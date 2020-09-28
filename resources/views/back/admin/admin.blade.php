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
                                <span class="icon-users"></span>
                                لیست مدیران
                                <a href="{{route('admin.create')}}" class="btn btn-default btn-rounded pull-right" type="button">+ مدیر جدید </a>
                                <hr>
                            </h1>
                            <div class="panel-body wt-panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-border table-hover">
                                        <thead>
                                        <tr>
                                            <th>نام</th>
                                            <th>نام خانوادگی</th>
                                            <th>ایمیل</th>
                                            <th>ابزار</th>
                                        </tr>
                                        </thead>
                                        <tbody>
{{--                                        @foreach ($admin as $admins)--}}
{{--                                            <tr>--}}
{{--                                                <td>{{$admins->fname}}</td>--}}
{{--                                                <td>{{$admins->lname}}</td>--}}
{{--                                                <td>{{$admins->email}}</td>--}}
{{--                                                <td>--}}
{{--                                                    <form method="post" action="{{route('dashboard.admins.destroy',$admins->id)}}"--}}
{{--                                                          style="display: inline">--}}
{{--                                                        @csrf--}}
{{--                                                        @method('delete')--}}
{{--                                                        <button class="btn btn-default btn-rounded btn-sm" type="submit"><i class="icon-eye"></i> حذف</button>--}}
{{--                                                    </form>--}}
{{--                                                    <a href="{{route('dashboard.admins.edit',$admins->id)}}">--}}
{{--                                                        <button class="btn btn-default btn-rounded btn-sm" type="button"><i class="icon-trash"></i> ویرایش</button></a>--}}
{{--                                                </td>--}}
{{--                                            </tr>--}}
{{--                                        @endforeach--}}
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
