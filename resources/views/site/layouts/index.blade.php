<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Basic Page Needs -->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Titles -->
        <title>{{ settings()->site_name }}</title>

        <!-- Specific Meta -->
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta name="author" content="Retrina Group" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        @include('site.layouts.frontend.style')
    </head>
    <body data-spy="scroll" data-target="#scrollspy" data-offset="61" class="@yield('class_body') {{ settings()->site_lightness == 'ليلي' ? 'westin-dark' :'' }}">

        <!--- Preloader Start -->
        <div id="angela-preloader">
            <div  class="preloader">
                <div class="spinner"></div>
                <div class="loader">
                    @php
                       $names = str_split(settings()->site_name,1);
                    @endphp
                    @foreach($names as $name)
                        <span data-text="{{ $name }}" class="letter-animation">{{ $name }}</span>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- Preloader End -->

        <!-- header -->
        @include('site.layouts.parts.header')
        <!-- end header -->

        @yield('content')


        <!-- footer -->
        @include('site.layouts.parts.footer')
        <!-- End footer -->

        <!--   Return To Top  -->
        <a class="return-to-top d-inline-block" href="javascript:void(0)"><i class="fa fa-arrow-alt-circle-up"></i></a>

        <!-- Start Options -->
        <div id="color-switcher" class="color-switcher" >
            <div class="text-center color-pallet hide">
                <div class="pallet-button hide">
                    <a href="#" class="cp-toggle"><i class="fa fa-cog fa-spin"></i></a>
                </div>
                <h6 class="theme-direction-style-title">التصميم</h6>
                <h6 class="text-center">الالوان</h6>
                <ul class="pattern pattern-2">
                    <li>
                        <a class="change-color color13" data-color="احمر" href="#"></a>
                    </li>
                    <li>
                        <a class="change-color color14" data-color="ازرق" href="#"></a>
                    </li>
                    <li>
                        <a class="change-color color15" data-color="اصفر" href="#"></a>
                    </li>
                </ul>
                <h6 class="my-2 color-scheme-title">الوضع النهاري والليلي</h6>
                <ul class="color-scheme list-inline">
                    <li class="list-inline-item">
                        <a href="javascript:void(0)" class="lightness light-scheme {{ settings()->site_lightness == 'نهاري' ? 'active' :'' }}"
                         data-mode="نهاري">
                            <i class="fa fa-lightbulb"></i> نهاري</a>
                    </li>
                    <li class="list-inline-item">
                        <a href="javascript:void(0)" class="lightness dark-scheme {{ settings()->site_lightness == 'ليلي' ? 'active' :'' }}"
                            data-mode="ليلي">
                            <i class="fa fa-moon"></i> ليلي</a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- End Options -->

        <div class="mouse-cursor cursor-effect"></div>
        <div class="mouse-cursor cursor"></div>

        @include('site.layouts.frontend.script')
        <script>
            $(document).on('click','.lightness',function()
            {
                let mode = $(this).data('mode');
                let route = "{{ route('site.lightness') }}";
                $.ajax({
                    url:route,
                    method:'POST',
                    data: {mode:mode},
                    success:function(data){

                    },
                    error:function(reject)
                    {
                    }
                });
            });

        </script>
    </body>

</html>
