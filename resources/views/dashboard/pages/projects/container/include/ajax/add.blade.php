<script>
    $('#add_project').on('submit',function(e){
        e.preventDefault();
        let route = "{{ route('dashboard.project.store')  }}";
        let data = new FormData(this);
        $.ajax({
            url:route,
            method:'POST',
            cache:false,
            processData:false,
            contentType:false,
            data:data,
            beforeSend:function () {
                $("#submit_button").attr('disabled','disabled');
            },
            success:function(data){

                $("#submit_button").removeAttr('disabled');
                if(data === 'error')
                {
                    @include('dashboard.pages.messages.500error',['msg'=>'حدث خطأ ما'])
                }
                /* else if(data.error === 'skill_found')
                {
                    $('#skill_table').DataTable().ajax.reload();
                    $('[data-repeater-item]').slice(1).remove();
                    $('#add_skill')[0].reset();
                    $('#modalAdd').modal('hide');
                    @include('dashboard.pages.messages.500error',['msg' => 'موجوده بالفعل'])
                }*/
                else
                {
                    var drEvent = $('#image').dropify();
                    drEvent = drEvent.data('dropify');
                    drEvent.resetPreview();
                    drEvent.clearElement();
                    $('.uploaded').empty();
                    $('.image-uploader').removeClass('has-files');
                    $('#add_project')[0].reset();
                    @include('dashboard.pages.messages.success',['msg'=>'تم الحفظ بنجاح'])
                }

            },
            error:function(reject)
            {
                console.log(reject);
                $("#submit_button").removeAttr('disabled');
                let errors = reject.responseJSON.errors;
                $.each(errors,function(key,val){
                    @include('dashboard.pages.messages.error')
                });
            }
        });
    });
</script>
