@extends('dashboard.layouts.index')
@section('css')
    @include('dashboard.pages.category.container.include.style')
@stop

@section('title')
     | الاقسام
@stop

@section('page-header')
السيرة الذاتية / الاقسام
@stop
@section('content')
  @include('dashboard.pages.category.container.front.table')
@stop

@section('js')
    @include('dashboard.pages.category.container.include.script')
@stop
