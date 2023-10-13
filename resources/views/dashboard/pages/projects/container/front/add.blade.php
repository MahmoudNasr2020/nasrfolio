@extends('dashboard.layouts.index')
@section('css')
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!---Internal Fileupload css-->
    <link href="{{URL::asset('dashboard/assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>
    <!---Internal Fancy uploader css-->
    <link href="{{URL::asset('dashboard/assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />
@stop

@section('title')
    | اضافة مشروع
@stop

@section('page-header')
   <a href="{{ route('dashboard.project.index') }}">المشاريع</a> / اضافة مشروع جديد
@stop

@section('content')

    <!-- row opened -->
    <div class="row row-sm">
        <!--div-->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">اضافة مشروع جديد</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>

                </div>
                <div class="card-body">
                    <form class="form-horizontal" id="add_project">

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name_edit">اسم المشروع </label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="اسم المشروع">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name_edit">القسم </label>
                                    <input type="text" class="form-control" id="category" name="category" placeholder="القسم">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name_edit">التاريخ </label>
                                    <input type="text" class="form-control" id="category" name="date" placeholder="التاريخ">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name_edit">العميل </label>
                                    <input type="text" class="form-control" id="client" name="client" placeholder="العميل">
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name_edit">مكان العميل</label>
                                    <input type="text" class="form-control" id="location" name="location" placeholder="مكان العميل">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name_edit">منفذ العمل</label>
                                    <input type="text" class="form-control" id="executor" name="executor" placeholder="منفذ العمل">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="percent_edit">وصف المشروع </label>
                                    <textarea name="overview"  id="overview" class="form-control" rows="5" ></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="percent_edit">الصورة الرئيسية </label>
                                    <input type="file" class="dropify" name="image"  id="image" data-height="150"/>
                                </div>
                            </div>
                        </div>


                        <button class="btn ripple btn-primary" type="submit" id="submit_button">حفظ</button>
                    </form>
                </div><!-- bd -->
            </div><!-- bd -->
        </div>
        <!--/div-->

    </div>
    <!-- /row -->
    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->

@stop

@section('js')
    <!--Internal Fileuploads js-->
    <script src="{{URL::asset('dashboard/assets/plugins/fileuploads/js/fileupload.js')}}"></script>
    <script src="{{URL::asset('dashboard/assets/plugins/fileuploads/js/file-upload.js')}}"></script>
    <!--Internal Fancy uploader js-->
    <script src="{{URL::asset('dashboard/assets/plugins/fancyuploder/jquery.ui.widget.js')}}"></script>
    <script src="{{URL::asset('dashboard/assets/plugins/fancyuploder/jquery.fileupload.js')}}"></script>
    <script src="{{URL::asset('dashboard/assets/plugins/fancyuploder/jquery.iframe-transport.js')}}"></script>
    <script src="{{URL::asset('dashboard/assets/plugins/fancyuploder/jquery.fancy-fileupload.js')}}"></script>
    <script src="{{URL::asset('dashboard/assets/plugins/fancyuploder/fancy-uploader.js')}}"></script>


    @include('dashboard.pages.projects.container.include.ajax.add')

@stop
