@extends('dashboard.layouts.index')
@section('css')
    @include('dashboard.pages.projects.container.include.style')
@stop

@section('title')
    | المشاريع
@stop

@section('page-header')
    المشاريع
@stop
@section('content')
  @include('dashboard.pages.projects.container.front.table')
@stop

@section('js')
    @include('dashboard.pages.projects.container.include.script')
@stop
