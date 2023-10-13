@extends('dashboard.layouts.index')
@section('css')
    @include('dashboard.pages.clients.container.include.style')
@stop

@section('title')
    | العملاء
@stop

@section('page-header')
العملاء
@stop
@section('content')
  @include('dashboard.pages.clients.container.front.table')
@stop

@section('js')
    @include('dashboard.pages.clients.container.include.script')
@stop
