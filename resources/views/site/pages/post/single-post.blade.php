@extends('site.layouts.index')

@section('style')
   @include('site.pages.post.style.style')
@stop

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
                        <h2 class="header-title">{{ $post->title }}</h2>
                        <div class="entry-meta">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="#">
                                        <i class="fa fa-calendar"></i>
                                        {{ $post->created_at->format('Y M d') }}
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#">
                                        <i class="fa fa-user"></i>
                                        {{ $details->name }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--    Hero End    -->

    <!--  blog Single Start  -->
    <section class="blog-single py-6">
        <div class="container">
            <div class="row row-sticky">
                <div class="col-lg-12 post-content">
                    <div class="single-post">
                        <div class="entry-image">
                            <img src="{{ asset('dashboard/images/'.$post->main_image) }}" alt="/"  style="width:50%;height: 312px;padding-top: 30px;display: block;margin-left: auto;margin-right: auto">
                        </div>
                        <div class="entry-content" style="overflow: hidden;">
                            {!! $post->description !!}
                            <br>
                            <hr>
                            <!-- Reaction system start -->
                            @include('site.pages.post.reaction')
                            <!-- Reaction system end -->
                            <hr>
                        </div>
                    </div>
                    <!--   Comments Start  -->
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row" id="row-comment">
                @include('site.pages.post.comment-form')
                <div class="col-12" id="comments"  style="display: {{ !$comments->count() > 0 ? 'none' : 'block'  }}">
                    @include('site.pages.post.comments')
                </div>
            </div>
        </div>

    </section>
    <!--  blog Single End  -->

    <!--   Other Post start  -->
    @if($posts->count() > 0)
        <section id="posts" class="portfolio-01 py-6">
            <div class="container">
                <h3 class="mb-4">بعض البوستات الاخري</h3>
                <div class="portfolio-items row">
                @foreach($posts as $other_post)
                    <!-- Item -->
                        <div class="col-md-6 col-lg-4 portfolio-item">
                            <div class="portfolio-box">
                                <div class="portfolio-img">
                                    <img src="{{ asset('dashboard/images/'.$other_post->main_image) }}" alt="/" height="255px">
                                </div>
                                <div class="portfolio-overlay">
                                    <div class="portfolio-overlay-content">
                                        <h5 class="portfolio-category">{{ $other_post->title }}</h5>
                                        <div class="portfolio-icon">
                                            <a href="{{ route('site.posts.single-post',['title'=>str_replace(' ' ,'_',$other_post->title),'id'=>\Illuminate\Support\Facades\Crypt::encryptString($other_post->id)]) }}">
                                                <i class="fas fa-link"></i>
                                            </a>
                                            <a href="{{ asset('dashboard/images/'.$other_post->main_image) }}" class="js-zoom-gallery">
                                                <i class="fas fa-search-plus"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!--    Other Post  End  -->
@stop

@section('script')
    @include('site.pages.post.ajax.reactions')
    @include('site.pages.post.ajax.comment.store_comment')
    @include('site.pages.post.ajax.comment.comment_loader')
    @include('site.pages.post.ajax.comment.edit_comment')
    @include('site.pages.post.ajax.comment.delete_comment')
@stop
