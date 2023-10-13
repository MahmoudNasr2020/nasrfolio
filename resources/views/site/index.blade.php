@extends('site.layouts.index')
@section('header')
    <ul class="navbar-nav nav-pills ml-auto">
        <li class="nav-item">
            <a class="nav-link active" href="#hero">الرئيسية</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#about">عني</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#services">خدماتي</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#portfolio">اعمالي</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#testimonial">العملاء</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#blog">البوستات</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/interview">اسئلة المقابلة</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#contact">اتصل بنا</a>
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
    @include('site.pages.component.about')

    <!--   skills resume Start   -->
    <section id="about" class="about-03 py-6">
        <div class="container">
            <!-- skill  -->
            @include('site.pages.component.skills')
            <!-- resume -->
            @include('site.pages.component.resume')
        </div>
    </section>
    <!--    About End    -->
    @include('site.pages.component.services')
    @include('site.pages.component.projects')
    @include('site.pages.component.clients')
    @include('site.pages.component.posts')
    @include('site.pages.component.contact')
@stop
