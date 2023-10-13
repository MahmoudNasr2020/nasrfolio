@extends('site.layouts.index')

@section('style')
    <!---Internal Fileupload css-->
    <link href="{{URL::asset('dashboard/assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>


@stop
@section('header')
    <ul class="navbar-nav nav-pills ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="{{ \Illuminate\Support\Facades\URL::to('/') }}">الرئيسية</a>
        </li>

        <li class="nav-item">
            <div class="dropdown">
                <a class="dropdown-toggle nav-link active" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{ \Illuminate\Support\Facades\Auth::user()->name }}
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{ route('site.profile.index') }}">تعديل حسابي</a>
                    <a class="dropdown-item" href="{{ route('site.logout') }}">تسجيل الخروج</a>
                </div>
            </div>
        </li>
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
                            <h6>حسابي</h6>
                            <h3 class="title-header">تعديل حسابي</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--    Hero End    -->

    <!--   Register Start   -->
    <section id="register" class="blog-02 py-6 bg-grey">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="contact-01">
                                <div class="contact my-5">
                                    <div class="contact-form">
                                        <h3 class="text-left mb-4">تعديل حسابي</h3>
                                        <div class="contact-box">
                                            <div class="contact-form">
                                                <form id="contactForm">
                                                    <div class="row">
                                                        <div class="col-lg-6 form-item">
                                                            <div class="form-group">
                                                                <input name="name" id="name" type="text" class="form-control p-4" placeholder="الاسم بالكامل*"
                                                                       value="{{ \Illuminate\Support\Facades\Auth::user()->name }}">
                                                            </div>

                                                        </div>

                                                        <div class="col-lg-6 form-item">
                                                            <div class="form-group">
                                                                <input name="email" id="email" type="email" class="form-control p-4" placeholder="البريد الالكتروني*"
                                                                value="{{ \Illuminate\Support\Facades\Auth::user()->email }}">

                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6 form-item">
                                                            <div class="form-group">
                                                                <input name="password" id="password" type="password" class="form-control p-4" placeholder="كلمة السر*"  >
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6 form-item">
                                                            <div class="form-group">
                                                                <input name="password_confirmation" id="password_confirmation" type="password" class="form-control p-4" placeholder="تاكيد كلمة السر*"  >
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6 form-item">
                                                            <div class="form-group mt-2">
                                                                <input type="file" class="dropify" name="image"  id="image" data-height="150" data-default-file="{{ asset('dashboard/images/'.\Illuminate\Support\Facades\Auth::user()->image) }}" />
                                                            </div>
                                                        </div>
                                                        <input type="hidden" id="id" name="id" value="{{ \Illuminate\Support\Facades\Auth::user()->id }}">
                                                        <div class="col-sm-12 text-left">
                                                            <button class="pill-button-01 border-0" id="submit-btn">تسجيل</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--   Register End   -->
@stop

@section('script')
    <!--Internal Fileuploads js-->
    <script src="{{URL::asset('dashboard/assets/plugins/fileuploads/js/fileupload.js')}}"></script>
    <script src="{{URL::asset('dashboard/assets/plugins/fileuploads/js/file-upload.js')}}"></script>
    @include('site.pages.profile.ajax.edit')
@stop
