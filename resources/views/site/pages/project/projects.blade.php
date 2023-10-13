@extends('site.layouts.index')

@section('header')
    <ul class="navbar-nav nav-pills ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="{{ \Illuminate\Support\Facades\URL::to('/') }}">الرئيسية</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('site.projects') }}">المشاريع</a>
        </li>

        @guest
            <li class="nav-item">
                <div class="dropdown">
                    <a class="dropdown-toggle nav-link" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        الحساب
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ route('site.login.index') }}">تسجيل الدخول</a>
                        <a class="dropdown-item" href="{{ route('site.register.index') }}">مستخدم جديد</a>
                    </div>
                </div>
            </li>
        @endguest

        @auth
            <li class="nav-item">
                <div class="dropdown">
                    <a class="dropdown-toggle nav-link" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ \Illuminate\Support\Facades\Auth::user()->name }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="{{ route('site.profile.index') }}">تعديل حسابي</a>
                        <a class="dropdown-item" href="{{ route('site.logout') }}">تسجيل الخروج</a>
                    </div>
                </div>
            </li>
        @endauth

    </ul>
@stop

@section('content')

    <!--    Hero Start    -->
    <section id="hero" class="blog-page-header py-6">
        <div class="home-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="title-box text-left">
                            <h6>اخر الاعمال</h6>
                            <h3 class="title-header">اعمالي</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--    Hero End    -->

    <!--   Portfolio start  -->
    <section id="portfolio" class="portfolio-01 py-6">
        <div class="container">
            <div class="row" id="portfolio-items">
                <!-- Item -->
                @foreach($projects as $project)
                    @php
                        $id=$project->id;
                    @endphp
                    <div class="col-md-6 col-lg-4 mt-5">
                        <div class="portfolio-box">
                            <div class="portfolio-img">
                                <img src="{{asset('dashboard/images/'.$project->main_image)}}" alt="/" height="350px">
                            </div>
                            <div class="portfolio-overlay">
                                <div class="portfolio-overlay-content">
                                    <h5 class="portfolio-category">{{ $project->name }}</h5>
                                    <div class="portfolio-icon">
                                        <a href="{{ route('site.projects.single-project',['name'=>str_replace(' ' ,'_',$project->name),'id'=>\Illuminate\Support\Facades\Crypt::encryptString($project->id)]) }}">
                                            <i class="fas fa-link"></i>
                                        </a>
                                        <a href="{{ asset('dashboard/images/'.$project->main_image) }}" class="js-zoom-gallery">
                                            <i class="fas fa-search-plus"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                          </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-5" style="text-align: center;">
                <a href="" class="pill-button-01" id="load_more" data-id="{{ \Illuminate\Support\Facades\Crypt::encryptString($id) }}">المزيد</a>
            </div>
            <!-- Data Loader -->
            <div class="auto-load text-center" style="display:none;">
                    <svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                         x="0px" y="0px" height="60" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
                    <path fill="#000"
                          d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
                        <animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s"
                                          from="0 50 50" to="360 50 50" repeatCount="indefinite" />
                    </path>
                </svg>
            </div>

        </div>
    </section>
    <!--    Portfolio  End  -->
@stop

@section('script')
    @include('site.pages.project.ajax.loader')
@stop
