@extends('dashboard.layouts.index')
@section('css')
    @include('dashboard.pages.resume.container.include.style')
@stop

@section('title')
    | السيرة الذاتية
@stop

@section('page-header')
السيرة الذاتية
@stop
@section('content')
  @include('dashboard.pages.resume.container.front.table')
@stop

@section('js')
    @include('dashboard.pages.resume.container.include.script')
@stop
