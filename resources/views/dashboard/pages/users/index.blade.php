@extends('dashboard.layouts.index')
@section('css')
    @include('dashboard.pages.users.container.include.style')
@stop
@section('title')
    | المستخدمين
@stop

@section('page-header')
    المستخدمين
@stop
@section('content')
  @include('dashboard.pages.users.container.front.table')
@stop

@section('js')
    @include('dashboard.pages.users.container.include.script')
@stop
