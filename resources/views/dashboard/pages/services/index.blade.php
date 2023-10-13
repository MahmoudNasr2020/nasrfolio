@extends('dashboard.layouts.index')

@section('css')
    @include('dashboard.pages.services.container.include.style')
@stop

@section('title')
    | الخدمات
@stop

@section('page-header')
الخدمات
@stop
@section('content')
  @include('dashboard.pages.services.container.front.table')
@stop

@section('js')
    @include('dashboard.pages.services.container.include.script')
@stop
