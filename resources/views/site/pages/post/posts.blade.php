@extends('site.layouts.index')

@section('class_body','blog-pages')

@section('header')
    <ul class="navbar-nav nav-pills ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="{{ \Illuminate\Support\Facades\URL::to('/') }}">الرئيسية</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" href="{{ route('site.posts') }}">البوستات</a>
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
                            <h6>اخر البوستات</h6>
                            <h3 class="title-header">بوستاتي</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--    Hero End    -->

    <!--   POST Start   -->
    <section id="blog" class="blog-02 py-6 bg-grey">
        <div class="container">
            <div class="row mt-3" id="blog-item">
                <!-- Item -->
                @php
                    $id='';
                @endphp
                @foreach($posts as $post)
                    @php
                        $id=$post->id;
                    @endphp
                    <div class="col-md-6 col-lg-4">
                        <div class="blog-item">
                            <div class="image-blog">
                                <img src="{{asset('dashboard/images/'.$post->main_image)}}" alt="/" height="215px">
                            </div>
                            <div class="blog-box">
                                <div class="blog-time">{{ $post->created_at->format('Y M d') }}</div>
                                <h5 class="Blog-title mb-0">
                                    <a href="javascript:void(0)">{{ $post->title }}</a>
                                </h5>
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <a href="{{ route('site.posts.single-post',['title'=>str_replace(' ' ,'_',$post->title),'id'=>\Illuminate\Support\Facades\Crypt::encryptString($post->id)]) }}">
                                            <i class="fas fa-user-alt base-color"></i>
                                            <span >{{ $details->name }}</span>
                                        </a>
                                    </li>
                                   
                                </ul>
                                <div class="blog-link">
                                    <a href="{{ route('site.posts.single-post',['title'=>str_replace(' ' ,'_',$post->title),'id'=>\Illuminate\Support\Facades\Crypt::encryptString($post->id)]) }}">قراءة</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            <div class="mt-5" style="text-align: center;">
                <a href="" class="pill-button-01" id="load_more" data-id="{{ \Illuminate\Support\Facades\Crypt::encryptString($id) }}" data-name="{{ $details->name }}">المزيد</a>
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
    <!--   POST End   -->
@stop

@section('script')
    @include('site.pages.post.ajax.loader')
@stop
