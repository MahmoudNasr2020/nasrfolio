@extends('dashboard.layouts.index')
@section('css')
    <!---Internal Fileupload css-->
    <link href="{{URL::asset('dashboard/assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>
    <!---Internal Fancy uploader css-->
    <link href="{{URL::asset('dashboard/assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />

    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />


@stop

@section('title')
    | فيديو المشروع
@stop

@section('page-header')
    <a href="{{ route('dashboard.project.index') }}">المشاريع</a> / فيديو المشروع
@stop
@section('content')

    <!-- row opened -->
    <div class="row row-sm">
        <!--div-->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">فيديو المشروع</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <form action="{{ route('dashboard.project.upload_video') }}"
                                  class="dropzone"
                                  id="my-dropzone">
                                <input type="hidden" name="project_id" value="{{ $project_id }}">
                                @csrf
                            </form>
                        </div>


                            <div class="col-12 mt-4">
                                @php
                                    $display= $video ? 'block' :'none';

                                @endphp
                                <div class="ff_fileupload_wrap " style="border-style: inset; display: {{ $display }} " id="div-video">
                                    @if($video != null)
                                        <video width="100%" height="450" controls id="video-source" >
                                            <source src="{{ asset('dashboard/images/'.$video) }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    @endif
                                </div>
                                <button class="btn btn-danger border-danger mt-2 " id="remove_file" style="display: {{$display}}"
                                        data-project_id="{{ $project_id }}">حذف الفيديو</button>
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
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>



    <script>
        let project_id = "{{ $project_id }}";
        Dropzone.options.myDropzone  = {
            maxFiles:1,
            maxFilesize:10000000,
            acceptedFiles:  ".mp4,.mkv,.avi",
            // Note: using "function()" here to bind `this` to
            // the Dropzone instance.
            init: function() {
                this.on("complete", file => {
                    this.removeFile(file);
                });
                this.on('success', function(file,response) {
                    let video = "{{ asset('dashboard/images/') }}" + '/' + response.video;
                    $('#div-video').empty();
                    $('#remove_file').css('display','block');
                    $('#div-video').css('display','block');
                    $('#div-video').append(' <video width="100%" height="450" controls id="video-source" id="div-video">\n' +
        '                                            <source src="'+video+'" type="video/mp4">\n' +
        '                                            Your browser does not support the video tag.\n' +
    '                                        </video>');
                   //$('#video-source source').attr('src',video);
                    //$("#video-source")[0].load();

                });

                this.on('error',function (file,response) {
                    $.each(response.errors,function(key,val){
                        @include('dashboard.pages.messages.error')
                    });
                });
            }
        };


        //delete image
        $('#remove_file').on('click',function(){
            let project_id = $(this).data('project_id');
            let n = new Noty({
                theme: 'relax',
                type: 'alert',
                text: 'حذف هذا العنصر',
                layout:"topRight",
                killer:true,
                buttons: [
                    Noty.button('نعم','btn btn-danger ml-2', function () {
                        $.ajax({
                            method:'POST',
                            url:"{{ route('dashboard.project.delete_video') }}",
                            data:{
                                project_id:project_id,
                            },
                            success:function (data) {
                                if(data.status === 'success')
                                {
                                    $('#div-video').empty();
                                    $('#div-video').css('display','none');
                                    $('#remove_file').css('display','none');
                                    n.close();
                                }
                                else if(data.status == 'not_found')
                                {
                                    location.href = "{{ route('dashboard.project.index') }}";

                                }
                            }
                        });
                    }),
                    Noty.button('لا', 'btn btn-light', function () {
                        n.close();
                    }),
                ],
            });
            n.show();
        });


    </script>
@stop
