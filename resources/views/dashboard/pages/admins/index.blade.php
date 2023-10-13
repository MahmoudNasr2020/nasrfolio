@extends('dashboard.layouts.index')
@section('css')
    @include('dashboard.pages.admins.container.include.style')
@endsection

@section('title')
   | المسؤولين
@stop

@section('page-header')
    المسؤولين
@stop

@section('content')
    @include('dashboard.pages.admins.container.front.table')
@endsection

@section('js')
    @include('dashboard.pages.admins.container.include.script')
@endsection
