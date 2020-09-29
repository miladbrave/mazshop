<div class="page-sidebar">
    <header class="site-header">
        <div class="site-logo"><a href="index.html"><img src="{{('/back/images/logo.png')}}" alt="Mouldifi" title="Mouldifi"></a></div>
        <div class="sidebar-collapse hidden-xs"><a class="sidebar-collapse-icon" href="#"><i class="icon-menu"></i></a></div>
        <div class="sidebar-mobile-menu visible-xs"><a data-target="#side-nav" data-toggle="collapse" class="mobile-menu-icon" href="#"><i class="icon-menu"></i></a></div>
    </header>
    <ul id="side-nav" class="main-menu navbar-collapse collapse">
        <li class="has-sub">
            <a href="index.html"><i class="icon-user"></i><span class="title"> مدیریت</span></a>
            <ul class="nav">
                <li><a href="{{route('admin.index')}}"><span class="title">ادمین</span></a></li>
                <li><a href="{{route('user')}}"><span class="title"> ویرایش اعضا</span></a></li>
                <li><a href="{{route('mainmessage')}}"><span class="title">درج پیام</span></a></li>
            </ul>
        </li>
        <li class="has-sub">
            <a href="collapsed-sidebar.html"><i class="fa fa-shopping-cart"></i><span class="title"> محصولات</span></a>
            <ul class="nav collapse">
                <li><a href="{{route('product.create')}}"><span class="title"> محصول جدید</span></a></li>
                <li><a href="{{route('product.index')}}"><span class="title">لیست محصول</span></a></li>
            </ul>
        </li>
        <li class="has-sub">
            <a href="collapsed-sidebar.html"><i class="fa fa-list"></i><span class="title">دسته بندی ها</span></a>
            <ul class="nav collapse">
                <li><a href="{{route('brand.index')}}"><span class="title">برند ها</span></a></li>
                <li><a href="{{route('navcategory')}}"><span class="title"></span>دسته بندی نوار ابزار</a></li>
                <li><a href="{{route('maincategory')}}"><span class="title"></span>دسته بندی اصلی</a></li>
                <li><a href="{{route('subcategory')}}"><span class="title"></span>دسته بندی فرعی</a></li>
            </ul>
        </li>
        <li class="has-sub">
            <a href="collapsed-sidebar.html"><i class="fa fa-product-hunt"></i><span class="title">ویژگی های محصول</span></a>
            <ul class="nav collapse">
                <li><a href="{{route('attributeindex')}}"><span class="title">ایجاد ویژگی</span></a></li>
                <li><a href="{{route('attributevalueindex')}}"><span class="title">ایجاد مقدار ویژگی</span></a></li>
            </ul>
        </li>
        <li class="has-sub">
            <a href="collapsed-sidebar.html"><i class="fa fa-sliders"></i><span class="title">اسلایدر</span></a>
            <ul class="nav collapse">
                <li><a href="{{route('slider.create')}}"><span class="title">ایجاد اسلایدر</span></a></li>
                <li><a href="{{route('slider.index')}}"><span class="title">لیست اسلایدر ها</span></a></li>
            </ul>
        </li>
        <li class="has-sub">
            <a href="collapsed-sidebar.html"><i class="fa fa-file"></i><span class="title">بنر</span></a>
            <ul class="nav collapse">
                <li><a href="{{route('banner.create')}}"><span class="title">ایجاد بنر</span></a></li>
                <li><a href="{{route('banner.index')}}"><span class="title">لیست بنر ها</span></a></li>
            </ul>
        </li>
        <li class="has-sub">
            <a href="collapsed-sidebar.html"><i class="fa fa-book"></i><span class="title">تبلیغات( بنر دوم )</span></a>
            <ul class="nav collapse">
                <li><a href="{{route('ads.create')}}"><span class="title">ایجاد تبلیغات</span></a></li>
                <li><a href="{{route('ads.index')}}"><span class="title">لیست تبلیغات </span></a></li>
            </ul>
        </li>
        <li class="has-sub">
            <a href="collapsed-sidebar.html"><i class="fa fa-envelope"></i><span class="title">پیام ها</span></a>
            <ul class="nav collapse">
                <li><a href="{{route('messages')}}"><span class="title">پیام های دریافتی</span></a></li>
                <li><a href="{{route('send.messages')}}"><span class="title">ارسال پیام</span></a></li>
            </ul>
        </li>
    </ul>
</div>
