@yield('meta')
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>@yield('title')</title>
<meta name="description" content="@yield('description')">
<meta name="keywords" content="@yield('keywords')">
<!--=====FAB ICON=======-->
<link rel="shortcut icon" href="{{asset('fronted/assets/mrs-mom-img/fav-icon.png')}}" />
<!--===== CSS LINK =======-->
<link rel="stylesheet" href="{{asset('fronted/assets/css/vendor/bootstrap.min.css')}}?v={{ time() }}" />
<link rel="stylesheet" href="{{asset('fronted/assets/css/vendor/aos.css')}}?v={{ time() }}" />
<link rel="stylesheet" href="{{asset('fronted/assets/css/vendor/fontawesome.css')}}?v={{ time() }}" />
<link rel="stylesheet" href="{{asset('fronted/assets/css/vendor/magnific-popup.css')}}?v={{ time() }}" />
<link rel="stylesheet" href="{{asset('fronted/assets/css/vendor/mobile.css')}}?v={{ time() }}" />
<link rel="stylesheet" href="{{asset('fronted/assets/css/vendor/owlcarousel.min.css')}}?v={{ time() }}" />
<link rel="stylesheet" href="{{asset('fronted/assets/css/vendor/sidebar.css')}}?v={{ time() }}" />
<link rel="stylesheet" href="{{asset('fronted/assets/css/vendor/slick-slider.css')}}?v={{ time() }}" />
<link rel="stylesheet" href="{{asset('fronted/assets/css/vendor/nice-select.css')}}?v={{ time() }}" />
<link rel="stylesheet" href="{{asset('fronted/assets/css/vendor/odometer.css')}}?v={{ time() }}" />
<link rel="stylesheet" href="{{asset('fronted/assets/css/main.css')}}?v={{ time() }}" />
<link rel="stylesheet" href="{{asset('fronted/assets/css/mrs-mom.css')}}?v={{ time() }}" />
<link rel="stylesheet" href="{{asset('fronted/assets/css/jquery.fancybox.min.css')}}?v={{ time() }}" />

<!--=====  JS SCRIPT LINK =======-->
<script src="{{asset('fronted/assets/js/vendor/jquery-3.7.1.min.js')}}"></script>