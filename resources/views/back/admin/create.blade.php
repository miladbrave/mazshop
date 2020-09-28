@extends('back.layout.master')

@section('content')
    @include('back.layout.sidebar')
    <div class="main-container gray-bg">
        <div class="main-content">
            <div class="main-content">
                <div class="row">
                    <div class="col-lg-12 animatedParent animateOnce z-index-46">
                        <div class="panel panel-default animated fadeInUp">
                            <div class="panel-body min-height-100">
                                <h1 class="page-title">
                                    <span class="icon-user-add"></span>
                                    افزودن ادمین جدید
                                    <a href="{{url()->previous()}}" class="btn btn-default btn-rounded pull-right" type="button"> بازگشت <span class="icon-left-open"></span></a>
                                    <hr>
                                </h1>
                                <form action="{{route('admin.store')}}" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group @if($errors->has('fname')) has-error @endif">
                                                <label><span class="text-danger">*</span> نام</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="icon-user"></i></span>
                                                    <input type="text" class="form-control" name="fname" required value="{{old('fname')}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group @if($errors->has('lname')) has-error @endif">
                                                <label><span class="text-danger">*</span> نام خانوادگی</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="icon-user"></i></span>
                                                    <input type="text" class="form-control" name="lname" required value="{{old('lname')}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group @if($errors->has('email')) has-error @endif">
                                                <label><span class="text-danger">*</span> ایمیل</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="icon-folder"></i></span>
                                                    <input type="email" class="form-control" name="email" required value="{{old('email')}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group @if($errors->has('mobile')) has-error @endif">
                                                <label> شماره موبایل</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="icon-mobile"></i></span>
                                                    <input type="text" class="form-control" data-mask="99999999999" name="mobile" value="{{old('mobile')}}">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group @if($errors->has('password')) has-error @endif">
                                                <label><span class="text-danger">*</span> کلمه عبور</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="icon-key"></i></span>
                                                    <input type="password" class="form-control" name="password" required value="{{old('password')}}" autocomplete="new-password">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group @if($errors->has('password_confirmation')) has-error @endif">
                                                <label><span class="text-danger">*</span> تکرار کلمه عبور</label>
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="icon-key"></i></span>
                                                    <input type="password" class="form-control" name="password_confirmation" required value="{{old('password_confirmation')}}">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <hr>
                                    <button class="btn btn-success" type="submit">+ ثبت ادمین</button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <footer class="animatedParent animateOnce z-index-10">
                <div class="footer-main animated fadeInUp slow">&copy; 2020 <strong><a target="_blank" href="i7v.ir">Logic</a></strong>
                    Admin Theme by <a target="_blank" href="i7v.ir">Logic</a></div>
            </footer>
        </div>
    </div>
@endsection
