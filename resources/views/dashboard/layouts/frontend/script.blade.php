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
