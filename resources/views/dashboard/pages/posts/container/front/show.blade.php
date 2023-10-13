@extends('dashboard.layouts.index')
@section('css')
    <style>
        .comments-list{
            margin-left: inherit;margin-right: 40px;padding-left: 0;list-style: none;margin-top: 0;margin-bottom: 1rem;padding-right: 0;
        }
        .list-inline-item{
            display: block!important;margin-top: 32px;margin-right: 0 ;margin-left: 0.5rem !important;
        }

        .comment-wrap{
            padding: 24px;position: relative;border: 1px solid #ebebeb;border-radius: 8px;
        }
        .image-comment{
            right: -36px;position: absolute;border-radius: 50%;padding: 4px;border: 1px solid #ebebeb;
        }

        .comment-content{
            padding-left: inherit;padding-right: 32px;
        }

    </style>
@stop
@section('page-header')
    <a href="{{ route('dashboard.post.index') }}">المنشورات</a> / اضافة منشور جديد
@stop
@section('content')

    <img src="" alt="">
    <!-- row opened -->
    <div class="row row-sm">
        <!--div-->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">عرض المنشور</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="border-left border-right border-top p-4">
                            <div>
                                <h3 class="tx-15 text-uppercase mb-3">عنوان المنشور : <span style="font-weight: bold">{{ $post->title }}</span></h3>
                                <br>
                                <div>
                                    <h5> الصورة الرئيسة : </h5>
                                    <img src="{{ asset('dashboard/images/'.$post->main_image) }}" alt="" width="200px" height="200px" style="border-radius: 10px">
                                </div>
                                    <br>

                                <div class="m-t-4">
                                    <h4 class="tx-15 text-uppercase mt-3">محتوي المنشور</h4>
                                    <div class=" p-t-10 border-left border-bottom border-right border-top p-4">
                                       {!! $post->description !!}
                                    </div>
                                    <hr>

                                    @php
                                        $counter_reaction = [ 'Like' => 0 , 'Love' => 0 ,'HaHa' => 0 ,'Wow' => 0 , 'Silent' => 0 , 'Sad'=>0 ,'Angry' => 0];
                                        foreach ($post->reactions as $item)
                                        {
                                           $counter_reaction[$item->reaction]++;
                                        }
                                    @endphp

                                    <!-- reaction-comment post -->
                                       @include('dashboard.pages.posts.container.front.reaction-comment')
                                    <!-- end reaction-comment post -->
                                </div>
                            </div>
                        </div>
                    </div>
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
    @include('dashboard.pages.posts.container.include.textEditor')

    <!--Internal Fileuploads js-->
    <script src="{{URL::asset('dashboard/assets/plugins/fileuploads/js/fileupload.js')}}"></script>
    <script src="{{URL::asset('dashboard/assets/plugins/fileuploads/js/file-upload.js')}}"></script>
    <!--Internal Fancy uploader js-->
    <script src="{{URL::asset('dashboard/assets/plugins/fancyuploder/jquery.ui.widget.js')}}"></script>
    <script src="{{URL::asset('dashboard/assets/plugins/fancyuploder/jquery.fileupload.js')}}"></script>
    <script src="{{URL::asset('dashboard/assets/plugins/fancyuploder/jquery.iframe-transport.js')}}"></script>
    <script src="{{URL::asset('dashboard/assets/plugins/fancyuploder/jquery.fancy-fileupload.js')}}"></script>
    <script src="{{URL::asset('dashboard/assets/plugins/fancyuploder/fancy-uploader.js')}}"></script>
    @include('dashboard.pages.posts.container.include.ajax.add')
    @include('dashboard.pages.posts.container.include.ajax.comment.comment_loader')
    @include('dashboard.pages.posts.container.include.ajax.comment.delete_comment')

@stop
