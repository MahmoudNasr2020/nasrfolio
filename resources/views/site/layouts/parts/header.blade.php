<!--    Header Start    -->
<header id="header" class="header fixed-top">
    <nav id="scrollspy" class="navbar navbar-expand-lg header-nav">
        <div class="container">
            <a class="navbar-brand  mr-lg-3 mr-xl-5 base-color" href="{{ \Illuminate\Support\Facades\URL::to('/') }}">{{ settings()->site_name }}</a>
            <!--  Navbar Toggler Button Start -->
            <button class="navbar-toggler collapsed " type="button" data-toggle="collapse" data-target="#toggle-menu" aria-controls="toggle-menu" aria-expanded="false" aria-label="Toggle navigation">
                <span ><i class="fa fa-list"></i></span>
            </button>
            <!--  Navbar Toggler Button End -->
            <div class="collapse navbar-collapse" id="toggle-menu">
                @yield('header')
            </div>
        </div>
    </nav>
</header>
<!--    Header End    -->
