@extends('site.layouts.index')
@section('style')
    @include('site.pages.project.style.rating')
@stop
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
                        <h2 class="header-title">{{ $project->name }}</h2>
                        <div class="entry-meta">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="#">
                                        <i class="fa fa-calendar"></i>
                                        {{ $project->date }}
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

    <!--  Single Portfolio Start  -->
    <section class="single-portfolio pt-6 blog-single">
        <div class="container">
            <div class="row row-sticky">
                <div class="col-lg-8 post-content">
                    <div class="single-post">
                        <div class="entry-image">
                            <img src="{{ asset('dashboard/images/'.$project->main_image)  }}" alt="/" height="410px">
                        </div>
                        <div class="entry-content">
                            <h2>وصف المشروع</h2>
                            <p class="mb-0" style="white-space: pre-line;">
                                {{ $project->overview }}
                            </p>
                            @if($project->images != null)
                                <hr>
                            <div class="row my-4">
                                    @php
                                        $images=json_decode($project->images);

                                    @endphp
                                    @foreach($images as $image)
                                        <div class="col-lg-3 mt-4">
                                            <img src="{{ asset('dashboard/images/'.$image) }}" data-image="{{ asset('dashboard/images/'.$image) }}"
                                                 alt="/" width="250px" height="150px" class="multi_image" style="cursor: pointer">
                                        </div>
                                    @endforeach

                            </div>
                            @endif
                            @if($project->video != null)
                                <hr>
                                <div class="row my-4">
                                    <div class="col-12">
                                        <video controls width="100%" height="450" id="video-source" >
                                            <source src="{{ asset('dashboard/images/'.$project->video) }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <aside class="col-lg-4 sidebar">
                    <div class="sidbar-wrap">
                        <!-- Categories -->
                        <div class="aside-box">
                            <div class="aside-title">
                                <h6>تفاصيل المشروع</h6>
                            </div>
                            <div class="aside-item-portfolio">
                                <ul class="list-unstyled">
                                    <li>
                                        <a style="font-weight: bold;">القسم:  </a>
                                        <span> {{ $project->category }}</span>
                                    </li>
                                    <li>
                                        <a style="font-weight: bold;">العميل: </a>
                                        <span>{{ $project->client }}</span>
                                    </li>
                                    <li>
                                        <a style="font-weight: bold;">التاريخ: </a>
                                        <span> {{ $project->date }}</span>
                                    </li>
                                    <li>
                                        <a style="font-weight: bold;">موقع العميل:  </a>
                                        <span>{{ $project->location }}</span>
                                    </li>
                                    <li>
                                        <a style="font-weight: bold;">منفذ العمل:  </a>
                                        <span>{{ $project->executor }}</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>


        <div class="container">
          <div class="row" id="row-rating">
              @include('site.pages.project.rating-form')
              <div class="col-12" id="ratings" style="display: {{ !$ratings->count() > 0 ? 'none' : 'block'  }}">
                  @include('site.pages.project.ratings')
              </div>
          </div>

        </div>

    </section>
    <!--  Single Portfolio End  -->

    <!--   Portfolio start  -->
    @if($projects->count() > 0)
    <section id="portfolio" class="portfolio-01">
        <div class="container mt-5">
            <h3 class="mb-4">بعض المشاريع الاخري</h3>
            <div class="portfolio-items row">
                @foreach($projects as $other_project)
                    <!-- Item -->
                        <div class="col-md-6 col-lg-4 portfolio-item">
                            <div class="portfolio-box">
                                <div class="portfolio-img">
                                    <img src="{{ asset('dashboard/images/'.$other_project->main_image) }}" alt="/" height="255px">
                                </div>
                                <div class="portfolio-overlay">
                                    <div class="portfolio-overlay-content">
                                        <h5 class="portfolio-category">{{ $other_project->name }}</h5>
                                        <div class="portfolio-icon">
                                            <a href="{{ route('site.projects.single-project',['name'=>str_replace(' ' ,'_',$other_project->name),'id'=>\Illuminate\Support\Facades\Crypt::encryptString($other_project->id)]) }}">
                                                <i class="fas fa-link"></i>
                                            </a>
                                            <a href="{{ asset('dashboard/images/'.$other_project->main_image) }}" class="js-zoom-gallery">
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
    <!--    Portfolio  End  -->
    @include('site.pages.project.imageModal')
@stop

@section('script')
    @include('site.pages.project.ajax.store_rating')
    @include('site.pages.project.ajax.rating_loader')
    @include('site.pages.project.ajax.delete_rating')

    <script>
        $(document).on('click','.multi_image',function () {
            let image = $(this).data('image');
            $('#image_modal').attr('src',image);
            $('#modalImage').modal('show');
        });
    </script>
@stop
