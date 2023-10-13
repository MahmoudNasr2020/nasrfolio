<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="Bootstrap Responsive Admin Web Dashboard HTML5 Template">
    <meta name="Author" content="Spruko Technologies Private Limited">
    <meta name="Keywords" content="admin,admin dashboard,admin dashboard template,admin panel template,admin template,admin theme,bootstrap 4 admin template,bootstrap 4 dashboard,bootstrap admin,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap admin theme,bootstrap dashboard,bootstrap form template,bootstrap panel,bootstrap ui kit,dashboard bootstrap 4,dashboard design,dashboard html,dashboard template,dashboard ui kit,envato templates,flat ui,html,html and css templates,html dashboard template,html5,jquery html,premium,premium quality,sidebar bootstrap 4,template admin bootstrap 4"/>
    <!-- Title -->
    <title>   {{ settings()->site_name }} | لوحة التحكم | تسجيل الدخول</title>
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('dashboard/images/'.settings()->site_image) }}" type="image/x-icon"/>
    <!-- Icons css -->
    <link href="{{URL::asset('dashboard/assets/css/icons.css')}}" rel="stylesheet">
    <!--  Custom Scroll bar-->
    <link href="{{URL::asset('dashboard/assets/plugins/mscrollbar/jquery.mCustomScrollbar.css')}}" rel="stylesheet"/>
    <!--  Sidebar css -->
    <link href="{{URL::asset('dashboard/assets/plugins/sidebar/sidebar.css')}}" rel="stylesheet">
    <!-- Sidemenu css -->
    <link rel="stylesheet" href="{{URL::asset('dashboard/assets/css-rtl/sidemenu.css')}}">
    @yield('css')
    <!--- Style css -->
    <link href="{{URL::asset('dashboard/assets/css-rtl/style.css')}}" rel="stylesheet">
    <!--- Dark-mode css -->
    <link href="{{URL::asset('dashboard/assets/css-rtl/style-dark.css')}}" rel="stylesheet">
    <!---Skinmodes css-->
    <link href="{{URL::asset('dashboard/assets/css-rtl/skin-modes.css')}}" rel="stylesheet">
    <link href="{{URL::asset('dashboard/assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}" rel="stylesheet">


</head>

<body class="main-body bg-primary-transparent" style="overflow-x: hidden">
<!-- Loader -->
<div id="global-loader">
    <img src="{{URL::asset('dashboard/assets/img/loader.svg')}}" class="loader-img" alt="Loader">
</div>
<!-- /Loader -->
<div class="container-fluid">
    <div class="row no-gutter">
        <!-- The image half -->
        <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
            <div class="row wd-100p mx-auto text-center">
                <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
                    <img src="{{ asset('dashboard/images/'.settings()->site_image) }}" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
                </div>
            </div>
        </div>
        <!-- The content half -->
        <div class="col-md-6 col-lg-6 col-xl-5 bg-white">
            <div class="login d-flex align-items-center py-2">
                <!-- Demo content-->
                <div class="container p-0">
                    <div class="row">
                        <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                            <div class="card-sigin">
                                <div class="mb-5 d-flex"> <a href="{{ url('/' . $page='index') }}"><img src="{{ asset('dashboard/images/'.settings()->site_image) }}" class="sign-favicon ht-40" alt="logo"></a>
                                    <h1 class="main-logo1 ml-1 mr-0 my-auto tx-28">
                                        {{ settings()->site_name }}
                                    </h1></div>
                                <div class="card-sigin">
                                    <div class="main-signup-header">
                                        <h2>أهلا بعودتك!</h2>
                                        <h5 class="font-weight-semibold mb-4">من فضلك سجل الدخول للمتابعة</h5>

                                        <form id="contactForm" method="post" action="{{ route('dashboard.login.login') }}">
                                            @csrf
                                            @if(\Illuminate\Support\Facades\Session::has('errorLogin'))
                                                <div class="alert alert-danger">
                                                    {{ \Illuminate\Support\Facades\Session::get('errorLogin') }}
                                                </div>
                                            @endif
                                            <div class="row">
                                                <div class="col-lg-12 form-item">
                                                    <div class="form-group">
                                                        <input name="email" id="email" type="email" class="form-control p-4" placeholder="البريد الالكتروني*">
                                                        @error('email')
                                                        <span style="color: red">{{ $message }}*</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-lg-12 form-item">
                                                    <div class="form-group">
                                                        <input name="password" id="password" type="password" class="form-control p-4" placeholder="كلمة السر*"  >
                                                        @error('password')
                                                        <span style="color: red">{{ $message }}*</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 text-left">
                                                    <button class="btn btn-primary  pill-button-01 border-0" id="submit-btn">دخول</button>
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End -->
            </div>
        </div><!-- End -->
    </div>
</div>

<!-- Back-to-top -->
<a href="#top" id="back-to-top"><i class="las la-angle-double-up"></i></a>
<!-- JQuery min js -->
<script src="{{URL::asset('dashboard/assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap Bundle js -->
<script src="{{URL::asset('dashboard/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- Ionicons js -->
<script src="{{URL::asset('dashboard/assets/plugins/ionicons/ionicons.js')}}"></script>
<!-- Moment js -->
<script src="{{URL::asset('dashboard/assets/plugins/moment/moment.js')}}"></script>

<!-- Rating js-->
<script src="{{URL::asset('dashboard/assets/plugins/rating/jquery.rating-stars.js')}}"></script>
<script src="{{URL::asset('dashboard/assets/plugins/rating/jquery.barrating.js')}}"></script>

<!--Internal  Perfect-scrollbar js -->
<script src="{{URL::asset('dashboard/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{URL::asset('dashboard/assets/plugins/perfect-scrollbar/p-scroll.js')}}"></script>
<!--Internal Sparkline js -->
<script src="{{URL::asset('dashboard/assets/plugins/jquery-sparkline/jquery.sparkline.min.js')}}"></script>
<!-- Custom Scroll bar Js-->
<script src="{{URL::asset('dashboard/assets/plugins/mscrollbar/jquery.mCustomScrollbar.concat.min.js')}}"></script>
<!-- right-sidebar js -->
<script src="{{URL::asset('dashboard/assets/plugins/sidebar/sidebar-rtl.js')}}"></script>
<script src="{{URL::asset('dashboard/assets/plugins/sidebar/sidebar-custom.js')}}"></script>
<!-- Eva-icons js -->
<script src="{{URL::asset('dashboard/assets/js/eva-icons.min.js')}}"></script>

<!-- toastify js -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<!-- Noty -->
<script src="{{URL::asset('dashboard/assets/plugins/noty/noty.min.js')}}"></script>

@yield('js')
<!-- Sticky js -->
<script src="{{URL::asset('dashboard/assets/js/sticky.js')}}"></script>
<!-- custom js -->
<script src="{{URL::asset('dashboard/assets/js/custom.js')}}"></script><!-- Left-menu js-->
<script src="{{URL::asset('dashboard/assets/plugins/side-menu/sidemenu.js')}}"></script>

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

</body>
</html>
