@extends('dashboard.layouts.index')
@section('css')
    @include('dashboard.pages.details.container.include.style')
@stop

@section('title')
    | التفاصيل الشخصية والاعدادات
@stop

@section('page-header')
 التفاصيل الشخصية والاعدادات
@stop
@section('content')
  @include('dashboard.pages.details.container.front.form')
@stop

@section('js')
    @include('dashboard.pages.details.container.include.script')
@stop
