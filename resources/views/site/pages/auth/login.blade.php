@extends('site.layouts.index')


@section('header')
    <ul class="navbar-nav nav-pills ml-auto">
        <li class="nav-item">
            <a class="nav-link" href="{{ \Illuminate\Support\Facades\URL::to('/') }}">الرئيسية</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('site.register.index') }}">مستخدم جديد</a>
        </li>

        <li class="nav-item">
            <a class="nav-link active" href="{{ route('site.login.index') }}">تسجيل الدخول</a>
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
                            <h6>سجل الدخول</h6>
                            <h3 class="title-header">تسجيل الدخول</h3>
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
                                        <h3 class="text-left mb-4">تسجيل الدخول</h3>
                                        <div class="contact-box">
                                            <div class="contact-form">
                                                <form id="contactForm" method="post" action="{{ route('site.login.login') }}">
                                                    @csrf
                                                    @if(\Illuminate\Support\Facades\Session::has('errorLogin'))
                                                        <div class="alert alert-danger">
                                                            {{ \Illuminate\Support\Facades\Session::get('errorLogin') }}
                                                        </div>
                                                    @endif
                                                    <div class="row">
                                                        <div class="col-lg-6 form-item">
                                                            <div class="form-group">
                                                                <input name="email" id="email" type="email" class="form-control p-4" placeholder="البريد الالكتروني*">
                                                                @error('email')
                                                                <span style="color: red">{{ $message }}*</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-lg-6 form-item">
                                                            <div class="form-group">
                                                                <input name="password" id="password" type="password" class="form-control p-4" placeholder="كلمة السر*"  >
                                                                @error('password')
                                                                <span style="color: red">{{ $message }}*</span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="col-sm-12 text-left">
                                                            <button class="pill-button-01 border-0" id="submit-btn">دخول</button>
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

@stop
