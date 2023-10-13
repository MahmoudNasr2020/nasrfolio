
<!--  FavIcon  -->
<link rel="shortcut icon" href="{{ asset('dashboard/images/'.settings()->site_image) }}">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@300;700&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,500;0,600;1,300&amp;display=swap" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@300&family=Roboto:wght@100&display=swap" rel="stylesheet">
<!-- Bootstrap Css -->
<link rel="stylesheet" href="{{ asset('site/assets/css/bootstrap.css') }}">
<!-- Fontawesome Css -->
<link rel="stylesheet" href="{{ asset('site/assets/css/fontawesome.css') }}">
<!-- LineIcon Css -->
<link rel="stylesheet" href="{{ asset('site/assets/css/LineIcons.css') }}">
<!-- Owl carousel Css -->
<link rel="stylesheet" href="{{ asset('site/assets/css/owl.carousel.min.css') }}">
<!-- Magnific Popup Css -->
<link rel="stylesheet" href="{{ asset('site/assets/css/magnific-popup.css') }}">
<!--  Custom Style CSS  -->
<link rel="stylesheet" href="{{ asset('site/assets/css/main.css') }}">
<!--  RTL Style CSS  -->
<link rel="stylesheet" href="{{ asset('site/assets/css/rtl-main.css') }}">
<!--  Color CSS  -->
    @php
        $url='';
        if(settings()->site_color == 'ازرق')
        {
            $url = asset('site/assets/css/color/sky-blue.css');
        }
        elseif (settings()->site_color == 'احمر')
        {
            $url = asset('site/assets/css/color/pink.css');
        }
        else
        {
            $url = asset('site/assets/css/color/golden.css');
        }
    @endphp
<link rel="stylesheet" href="{{ $url }}" id="option-color-two">
<!--  Color CSS  -->
<link rel="stylesheet" href="{{ asset('site/assets/css/colorfull.css') }}">

<!-- Toastify css -->
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

<link rel="stylesheet" type="text/css" href="{{URL::asset('dashboard/assets/plugins/noty/noty.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL::asset('dashboard/assets/plugins/noty/relax.css')}}">

<style>
    body,*{
        font-family: 'Noto Kufi Arabic', sans-serif !important;
    }
</style>
@yield('style')
