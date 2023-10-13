@extends('dashboard.layouts.index')
@section('css')
    @include('dashboard.pages.roles.container.include.style')
@stop

@section('title')
    | الصلاحيات
@stop

@section('page-header')
    الصلاحيات
@stop
@section('content')
    @include('dashboard.pages.roles.container.front.table')
@stop

@section('js')
    @include('dashboard.pages.roles.container.include.script')
@stop
