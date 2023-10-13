@extends('dashboard.layouts.index')
@section('css')
    <!---Internal Fileupload css-->
    <link href="{{URL::asset('dashboard/assets/plugins/fileuploads/css/fileupload.css')}}" rel="stylesheet" type="text/css"/>
    <!---Internal Fancy uploader css-->
    <link href="{{URL::asset('dashboard/assets/plugins/fancyuploder/fancy_fileupload.css')}}" rel="stylesheet" />

    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

@stop

@section('title')
    | صور المشروع
@stop
@section('page-header')
    <a href="{{ route('dashboard.project.index') }}">المشاريع</a> / صور المشروع
@stop
@section('content')

    <!-- row opened -->
    <div class="row row-sm">
        <!--div-->
        <div class="col-xl-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mg-b-0">صور المشروع</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>

                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <form action="{{ route('dashboard.project.upload_multi_images') }}"
                                  class="dropzone"
                                  id="my-dropzone">
                                <input type="hidden" name="project_id" value="{{ $project_id }}">
                                @csrf
                            </form>
                        </div>

                            <div class="col-12">
                                <div class="ff_fileupload_wrap">
                                    <table class="ff_fileupload_uploads">
                                        @if($images != null)
                                            @foreach($images as $image)
                                            <tr>
                                                <td class="ff_fileupload_preview">
                                                    <button class="ff_fileupload_preview_image preview_image ff_fileupload_preview_image_has_preview" data-image="{{ $image }}"
                                                            type="button" aria-label="Preview"
                                                            style="background-image: url({{asset('dashboard/images/'.$image)}});">
                                                        <span class="ff_fileupload_preview_text"></span>
                                                    </button>
                                                    <div class="ff_fileupload_actions_mobile">
                                                        <button class="ff_fileupload_start_upload" type="button" aria-label="Start uploading">

                                                        </button><button class="ff_fileupload_remove_file" type="button" aria-label="Remove from list">

                                                        </button>
                                                    </div>
                                                </td>
                                                <td class="ff_fileupload_summary"><div class="ff_fileupload_filename">
                                                        <input type="hidden">
                                                    </div>
                                                    <div class="ff_fileupload_fileinfo mt-3">{{ substr($image,-10) }}
                                                    </div>
                                                    <div class="ff_fileupload_buttoninfo ff_fileupload_hidden">
                                                    </div>
                                                    <div class="ff_fileupload_errors ff_fileupload_hidden">
                                                    </div>
                                                    <div class="ff_fileupload_progress_background ff_fileupload_hidden">
                                                        <div class="ff_fileupload_progress_bar"></div>
                                                    </div>
                                                </td>
                                                <td class="ff_fileupload_actions">
                                                    <button class="ff_fileupload_remove_file remove_file" data-project_id="{{ $project_id }}" data-image="{{ $image }}" type="button" aria-label="Remove from list">
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                        @endif
                                    </table>
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
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>

    <script>
        let project_id = "{{ $project_id }}";
        Dropzone.options.myDropzone  = {
           acceptedFiles: "image/*",
            // Note: using "function()" here to bind `this` to
            // the Dropzone instance.
            init: function() {
                this.on("complete", file => {
                    this.removeFile(file);
                });
                this.on('success', function(file,response) {
                    let image_name = response.image.substr(-10);
                    let image = "{{ asset('dashboard/images/') }}" + '/' + response.image;
                    $('.ff_fileupload_uploads').prepend('<tr>\n' +
        '                                                <td class="ff_fileupload_preview">\n' +
        '                                                    <button class="ff_fileupload_preview_image preview_image ff_fileupload_preview_image_has_preview" data-image="'+response.image+'" type="button" aria-label="Preview"\n' +
        '                                                            style="background-image: url('+image+');">\n' +
        '                                                        <span class="ff_fileupload_preview_text"></span>\n' +
        '                                                    </button>\n' +
        '                                                    <div class="ff_fileupload_actions_mobile">\n' +
        '                                                        <button class="ff_fileupload_start_upload" type="button" aria-label="Start uploading">\n' +
        '\n' +
        '                                                        </button><button class="ff_fileupload_remove_file" type="button" aria-label="Remove from list">\n' +
        '\n' +
        '                                                        </button>\n' +
        '                                                    </div>\n' +
        '                                                </td>\n' +
        '                                                <td class="ff_fileupload_summary"><div class="ff_fileupload_filename">\n' +
        '                                                        <input type="hidden">\n' +
        '                                                    </div>\n' +
        '                                                    <div class="ff_fileupload_fileinfo mt-3">'+image_name+'\n' +
        '                                                    </div>\n' +
        '                                                    <div class="ff_fileupload_buttoninfo ff_fileupload_hidden">\n' +
        '                                                    </div>\n' +
        '                                                    <div class="ff_fileupload_errors ff_fileupload_hidden">\n' +
        '                                                    </div>\n' +
        '                                                    <div class="ff_fileupload_progress_background ff_fileupload_hidden">\n' +
        '                                                        <div class="ff_fileupload_progress_bar"></div>\n' +
        '                                                    </div>\n' +
        '                                                </td>\n' +
        '                                                <td class="ff_fileupload_actions">\n' +
        '                                                    <button class="ff_fileupload_remove_file remove_file" type="button" data-project_id='+project_id+' data-image="'+response.image+'" aria-label="Remove from list">\n' +
        '                                                    </button>\n' +
        '                                                </td>\n' +
        '                                            </tr>');
                });

                this.on('error',function (file,response) {
                    $.each(response.errors,function(key,val){
                        @include('dashboard.pages.messages.error')
                    });
                });
            }
        };


        //delete image
        $(document).on('click','.remove_file',function(){
            let project_id = $(this).data('project_id');
            let image = $(this).data('image');
            let item = $(this);
            $.ajax({
                method:'POST',
                url:"{{ route('dashboard.project.delete_image') }}",
                data:{
                    project_id:project_id,
                    image:image
                },
                success:function (data) {
                    if(data.status === 'success')
                    {
                       item.parents('tr').remove();
                    }
                    else if(data.status == 'not_found')
                    {
                        location.href = "{{ route('dashboard.project.index') }}";

                    }
                }
            });
        });

        //view image
        $(document).on('click','.preview_image',function() {
            let image = "{{ asset('dashboard/images/') }}" + '/' + $(this).data('image');
            $('#modalImage').modal('show');
            $('#image_modal').attr('src',image);
        });
    </script>
@stop
