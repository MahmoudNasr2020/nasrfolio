@extends('dashboard.layouts.index')
@section('css')
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!---Internal Fileupload css-->
    <link href="{{URL::asset('dashboard/assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>
    <!---Internal Fancy uploader css-->
    <link href="{{URL::asset('dashboard/assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />
@stop

@section('title')
    | تعديل مشروع
@stop

@section('page-header')
    <a href="{{ route('dashboard.project.index') }}">المشاريع</a> / تعديل المشروع
@stop
@section('content')

    <!-- row opened -->
    <div class="row row-sm">
        <!--div-->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">تعديل المشروع</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>

                </div>
                <div class="card-body">
                    <form class="form-horizontal" id="form_edit">

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name_edit">اسم المشروع </label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="اسم المشروع" value="{{ $project->name }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name_edit">القسم </label>
                                    <input type="text" class="form-control" id="category" name="category" placeholder="القسم" value="{{ $project->category }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name_edit">التاريخ </label>
                                    <input type="text" class="form-control" id="category" name="date" placeholder="التاريخ" value="{{ $project->date }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name_edit">العميل </label>
                                    <input type="text" class="form-control" id="client" name="client" placeholder="العميل" value="{{ $project->client }}">
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name_edit">مكان العميل</label>
                                    <input type="text" class="form-control" id="location" name="location" placeholder="مكان العميل" value="{{ $project->location }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name_edit">منفذ العمل</label>
                                    <input type="text" class="form-control" id="executor" name="executor" placeholder="منفذ العمل" value="{{ $project->executor }}">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="percent_edit">وصف المشروع </label>
                                    <textarea name="overview"  id="overview" class="form-control" rows="5" >{{ $project->overview }}</textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="percent_edit">الصورة الرئيسية </label>
                                    <input type="file" class="dropify" name="image" data-default-file="{{asset('dashboard/images/'.$project->main_image)}}"  id="image" data-height="150"/>
                                </div>
                            </div>
                        </div>


                        <input type="hidden" id="id" name="id" value="{{ $project->id  }}">
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

    @include('dashboard.pages.projects.container.include.ajax.edit')


@stop
