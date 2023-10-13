<link href="https://fonts.googleapis.com/css2?family=Noto+Kufi+Arabic:wght@300&family=Roboto:wght@100&display=swap" rel="stylesheet">
<!-- Title -->
<title>   {{ settings()->site_name }} @yield('title') | لوحة التحكم</title>

<!-- Favicon -->
<link rel="shortcut icon" href="{{ asset('dashboard/images/'.settings()->site_image) }}">
<!-- Icons css -->
<link href="{{URL::asset('dashboard/assets/css/icons.css')}}" rel="stylesheet">
<!--  Custom Scroll bar-->
<link href="{{URL::asset('dashboard/assets/plugins/mscrollbar/jquery.mCustomScrollbar.css')}}" rel="stylesheet"/>
<!--  Sidebar css -->
<link href="{{URL::asset('dashboard/assets/plugins/sidebar/sidebar.css')}}" rel="stylesheet">
<!-- Sidemenu css -->
<link rel="stylesheet" href="{{URL::asset('dashboard/assets/css-rtl/sidemenu.css')}}">

<!-- Toastify css -->
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

<link rel="stylesheet" type="text/css" href="{{URL::asset('dashboard/assets/plugins/noty/noty.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL::asset('dashboard/assets/plugins/noty/relax.css')}}">

@yield('css')
<!--- Style css -->
<link href="{{URL::asset('dashboard/assets/css-rtl/style.css')}}" rel="stylesheet">
<!--- Dark-mode css -->
<link href="{{URL::asset('dashboard/assets/css-rtl/style-dark.css')}}" rel="stylesheet">
<!---Skinmodes css-->
<link href="{{URL::asset('dashboard/assets/css-rtl/skin-modes.css')}}" rel="stylesheet">


