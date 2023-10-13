@extends('dashboard.layouts.index')
@section('css')
    @include('dashboard.pages.posts.container.include.style')
@stop

@section('title')
    | البوستات
@stop

@section('page-header')
    البوستات
@stop

@section('content')
  @include('dashboard.pages.posts.container.front.table')
@stop

@section('js')
    @include('dashboard.pages.posts.container.include.script')
@stop
