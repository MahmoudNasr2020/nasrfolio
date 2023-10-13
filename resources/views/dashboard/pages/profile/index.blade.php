@extends('dashboard.layouts.index')
@section('css')
    @include('dashboard.pages.profile.container.include.style')
@stop

@section('title')
    | اعدادات الحساب
@stop

@section('page-header')
    اعدادات الحساب
@stop
@section('content')
  @include('dashboard.pages.profile.container.front.form')
@stop

@section('js')
    @include('dashboard.pages.profile.container.include.script')
@stop
