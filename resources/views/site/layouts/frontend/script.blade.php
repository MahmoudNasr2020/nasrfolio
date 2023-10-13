<!--  JavaScripts  -->
<script src="{{ asset('site/assets/js/email-decode.min.js') }}"></script>
<script src="{{ asset('site/assets/js/jquery-3.5.1.min.js') }}"></script>
<!--  Bootstrap Js  -->
<script src="{{ asset('site/assets/js/bootstrap.js') }}"></script>
<!--  Fontawsome Js  -->
<script src="{{ asset('site/assets/js/fontawesome.js') }}"></script>

<!--  Typed Js  -->
<script src="{{ asset('site/assets/js/typed.js') }}"></script>
<!--  CountTo Js  -->
<script src="{{ asset('site/assets/js/jquery.countTo.js') }}"></script>
<!--  Isotope Js  -->
<script src="{{ asset('site/assets/js/isotope.pkgd.min.js') }}"></script>
<!--  PopUp Js  -->
<script src="{{ asset('site/assets/js/jquery.magnific-popup.min.js') }}"></script>
<!--  owl.carousel Js  -->
<script src="{{ asset('site/assets/js/owl.carousel.min.js') }}"></script>
<!--  easing Js  -->
<script src="{{ asset('site/assets/js/jquery.easing.min.js') }}"></script>
<!--  Custom JS  -->
<script src="{{ asset('site/assets/js/westin-rtl.js') }}"></script>

<!-- toastify js -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

<!-- Noty -->
<script src="{{URL::asset('dashboard/assets/plugins/noty/noty.min.js')}}"></script>

<!-- sweet -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script>



    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

@yield('script')
