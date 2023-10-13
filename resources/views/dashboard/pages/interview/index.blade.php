@extends('dashboard.layouts.index')
@section('css')
    @include('dashboard.pages.interview.container.include.style')
@stop

@section('title')
    | اسئلة المقابلة
@stop

@section('page-header')
اسئلة المقابلة
@stop
@section('content')
  @include('dashboard.pages.interview.container.front.table')
@stop

@section('js')
    @include('dashboard.pages.interview.container.include.script')
@stop
