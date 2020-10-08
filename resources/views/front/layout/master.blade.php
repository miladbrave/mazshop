<!DOCTYPE html>
<html dir="rtl">
<head>
    <meta charset="UTF-8"/>
    <meta name="format-detection" content="telephone=no"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href="{{asset('/front/image/favicon.png')}}" rel="icon"/>
    <title>شاپ 1 - قالب HTML فروشگاهی</title>
    <meta name="description" content="Responsive and clean html template design for any kind of ecommerce webshop">

    <link type="text/css" rel="stylesheet" href="{{asset('/front/js/bootstrap/css/bootstrap.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('/front/js/bootstrap/css/bootstrap-rtl.min.css')}}">
    <link type="text/css" rel="stylesheet" href="{{asset('/front/css/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/front/css/stylesheet.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/front/css/owl.carousel.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/front/css/owl.transitions.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/front/css/responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/front/css/stylesheet-rtl.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/front/css/responsive-rtl.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/front/css/stylesheet-skin2.css')}}">


</head>
<body>
<div class="wrapper-wide">
    @include('front.layout.header')
    @yield('content')
    @include('front.layout.footer')
</div>

@yield('js')
@yield('js2')

<script type="text/javascript" src="{{asset('/front/js/jquery-2.1.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/front/js/bootstrap/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/front/js/jquery.easing-1.3.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/front/js/jquery.dcjqaccordion.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/front/js/owl.carousel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/front/js/custom.js')}}"></script>
<script type="text/javascript" src="{{asset('/front/js/jquery.elevateZoom-3.0.8.min.js')}}"></script>
<script type="text/javascript" src="{{asset('/front/js/swipebox/lib/ios-orientationchange-fix.js')}}"></script>
<script type="text/javascript" src="{{asset('/front/js/swipebox/src/js/jquery.swipebox.min.js')}}"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>


<script type="text/javascript">
    $("#zoom_01").elevateZoom({
        gallery:'gallery_01',
        cursor: 'pointer',
        galleryActiveClass: 'active',
        imageCrossfade: true,
        zoomWindowFadeIn: 500,
        zoomWindowFadeOut: 500,
        zoomWindowPosition : 11,
        lensFadeIn: 500,
        lensFadeOut: 500,
        loadingIcon: 'image/progress.gif'
    });
    $("#zoom_01").bind("click", function(e) {
        var ez =   $('#zoom_01').data('elevateZoom');
        $.swipebox(ez.getGalleryList());
        return false;
    });
</script>

</body>
</html>
