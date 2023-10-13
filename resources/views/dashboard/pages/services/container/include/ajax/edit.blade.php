<script>
    //edit
    $(document).on('click','.edit',function (e) {
        e.preventDefault();
        $('#name_edit').val('');
        $('#id').val('');
        $('#image_edit').attr('src','');
        var drEvent = $('#image_dropify').dropify();
        drEvent = drEvent.data('dropify');
        drEvent.resetPreview();
        drEvent.clearElement();
        let route = $(this).data('route');
        $.ajax({
            url:route,
            method:'GET',

            success:function(data){
                $("#submit_button").removeAttr('disabled');
                if(data === 'not_found')
                {
                    $('#service_table').DataTable().ajax.reload();
                    @include('dashboard.pages.messages.500error',['msg'=>'هذا العنصر غير موجود'])
                }
                else
                {

                    $('#name_edit').val(data.name);
                    $('#description_edit').val(data.description);
                    $('#image_edit').attr('src',"{{ asset('dashboard/images/') }}"+"/"+data.image);
                    $('#id').val(data.id);
                    $('#modalEdit').modal('show');

                }

            },

    })
    });


    //update
    $('#form_edit').on('submit',function(e){
        e.preventDefault();
        let route = "{{ route('dashboard.service.index')}}" + '/update/' + e.target.id.value;
        let data = new FormData(this);
        $.ajax({
            url:route,
            method:'POST',
            cache:false,
            processData:false,
            contentType:false,
            data: data,
            beforeSend:function () {
                $("#submit_button_edit").attr('disabled','disabled');
            },
            success:function(data){
                $("#submit_button_edit").removeAttr('disabled');
                $('#service_table').DataTable().ajax.reload();
                if(data === 'not_found')
                {
                    @include('dashboard.pages.messages.500error',['msg'=>'هذا العنصر غير موجود'])
                }
                else if(data === 'error')
                {
                    @include('dashboard.pages.messages.500error',['msg'=>'حدث خلل ما'])
                }
                else
                {
                    $('#form_edit')[0].reset();
                    $('#modalEdit').modal('hide');
                    @include('dashboard.pages.messages.success',['msg'=>'تم التعديل بنجاح'])
                }

            },
            error:function(reject)
            {
                $("#submit_button_edit").removeAttr('disabled');
                let errors = reject.responseJSON.errors;
                $.each(errors,function(key,val){
                    @include('dashboard.pages.messages.error')
                });
            }
        });
    });
</script>
