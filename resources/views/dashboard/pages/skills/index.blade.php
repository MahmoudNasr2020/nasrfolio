@extends('dashboard.layouts.index')
@section('css')
    @include('dashboard.pages.skills.container.include.style')
@stop

@section('title')
    | المهارات
@stop

@section('page-header')
المهارات
@stop
@section('content')
  @include('dashboard.pages.skills.container.front.table')
@stop

@section('js')
    @include('dashboard.pages.skills.container.include.script')
@stop
