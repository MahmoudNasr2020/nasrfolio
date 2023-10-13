<!-- Loader -->
<div id="global-loader">
    <img src="{{URL::asset('dashboard/assets/img/loader.svg')}}" class="loader-img" alt="Loader">
</div>
<!-- /Loader -->
@include('dashboard.layouts.parts.main-sidebar')
<!-- main-content -->
<div class="main-content app-content">
@include('dashboard.layouts.parts.main-header')
<!-- container -->
    <div class="container-fluid">
@include('dashboard.layouts.parts.page-header')
@yield('content')
@include('dashboard.layouts.parts.sidebar')
@include('dashboard.layouts.parts.models')
@include('dashboard.layouts.parts.footer')
