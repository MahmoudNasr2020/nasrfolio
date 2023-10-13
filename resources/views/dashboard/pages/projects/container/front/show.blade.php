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
    <a href="{{ route('dashboard.post.index') }}">المشاريع</a> / عرض المشروع
@stop

@section('title')
    | عرض المشروع
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
                        <h4 class="card-title mg-b-0">عرض المشروع</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="border-left border-right border-top p-4">
                            <div>
                                <div class="row">
                                    <div class="col-6">
                                        <h3 class="tx-15 text-uppercase mb-3">اسم المشروع : <span style="font-weight: bold">{{ $project->name }}</span></h3>
                                    </div> <div class="col-6">
                                        <h3 class="tx-15 text-uppercase mb-3">التاريخ : <span style="font-weight: bold">{{ $project->date }}</span></h3>
                                    </div> <div class="col-6">
                                        <h3 class="tx-15 text-uppercase mb-3">القسم : <span style="font-weight: bold">{{ $project->category }}</span></h3>
                                    </div> <div class="col-6">
                                        <h3 class="tx-15 text-uppercase mb-3">العميل : <span style="font-weight: bold">{{ $project->client }}</span></h3>
                                    </div> <div class="col-6">
                                        <h3 class="tx-15 text-uppercase mb-3">موقع العميل : <span style="font-weight: bold">{{ $project->location }}</span></h3>
                                    </div> <div class="col-6">
                                        <h3 class="tx-15 text-uppercase mb-3">المنفذ : <span style="font-weight: bold">{{ $project->executor }}</span></h3>
                                    </div>
                                </div>

                                <br>
                                <div>
                                    <h5> الصورة الرئيسة : </h5>
                                    <img src="{{ asset('dashboard/images/'.$project->main_image) }}" alt="" width="200px" height="200px" style="border-radius: 10px">
                                </div>
                                    <br>

                                <br>
                                @if($project->images != null)
                                    <hr>
                                    <div class="row my-4">
                                        @php
                                            $images=json_decode($project->images);

                                        @endphp
                                        @foreach($images as $image)
                                            <div class="col-lg-3 mt-4">
                                                <img src="{{ asset('dashboard/images/'.$image) }}" data-image="{{ asset('dashboard/images/'.$image) }}"
                                                     alt="/" width="250px" height="150px" class="multi_image image_modal" style="cursor: pointer">
                                            </div>
                                        @endforeach

                                    </div>
                                @endif

                                @if($project->video != null)
                                    <hr>
                                    <div class="row my-4">
                                        <div class="col-12">
                                            <video controls width="100%" height="450" id="video-source" >
                                                <source src="{{ asset('dashboard/images/'.$project->video) }}" type="video/mp4">
                                                Your browser does not support the video tag.
                                            </video>
                                        </div>
                                    </div>
                                @endif
                                <hr>
                                <div class="m-t-4">
                                    <h4 class="tx-15 text-uppercase mt-3">وصف المشروع</h4>
                                    <div class=" p-t-10 border-left border-bottom border-right border-top p-4" style="font-size: 16px;font-weight: bold;white-space: pre-line;">
                                       {{ $project->overview }}
                                    </div>
                                    <hr>


                                    <!-- reaction-comment post -->
                                        @include('dashboard.pages.projects.container.front.ratings')
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

    @include('dashboard.pages.projects.container.front.modals.image')
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
    @include('dashboard.pages.projects.container.include.ajax.rating.rating_loader')
    @include('dashboard.pages.projects.container.include.ajax.rating.delete_rating')
    <script>
        $(document).on('click','.image_modal',function () {
            let image = $(this).attr('src');
            $('#image_modal').attr('src',image);
            $('#modalImage').modal('show');
        })
    </script>

@stop
