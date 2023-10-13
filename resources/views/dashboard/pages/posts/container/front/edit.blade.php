@extends('dashboard.layouts.index')
@section('css')
    <link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!---Internal Fileupload css-->
    <link href="{{URL::asset('dashboard/assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>
    <!---Internal Fancy uploader css-->
    <link href="{{URL::asset('dashboard/assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('vendor/file-manager/css/file-manager.css') }}">


@stop

@section('title')
    | تعديل بوست
@stop

@section('page-header')
    <a href="{{ route('dashboard.post.index') }}">المنشورات</a> / تعديل المنشور
@stop
@section('content')

    <img src="../../photos/77398665_508958123035477_7882705193773563904_n.jpg" alt="">
    <!-- row opened -->
    <div class="row row-sm">
        <!--div-->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">تعديل المنشور</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>

                </div>
                <div class="card-body">
                    <form class="form-horizontal" id="form_edit">

                        <div class="row">

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="name_edit">عنوان المنشور </label>
                                    <input type="text" class="form-control" id="title" name="title" placeholder="عنوان المنشور" value="{{ $post->title }}">
                                </div>
                            </div>

                        </div>


                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="percent_edit">الصورة الرئيسية </label>
                                    <input type="file" class="dropify" name="image"  id="image" data-height="150"
                                           data-default-file="{{ asset('dashboard/images/'.$post->main_image) }}"/>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="percent_edit">وصف المنشور </label>
                                    <textarea name="description"  id="editor" >{!! $post->description !!}</textarea>
                                </div>
                            </div>

                            <input type="hidden" name="id" id="id" value="{{ $post->id }}">
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
    @include('dashboard.pages.posts.container.include.textEditor')
    @include('dashboard.pages.posts.container.include.ajax.edit')

@stop
