<script>
    //edit
    $(document).on('click','.edit',function (e) {
        e.preventDefault();
        $('#title_edit').val('');
        $('#date_edit').val('');
        $('#description_edit').text('');
        $('#points_edit').text('');
        $('.category_option').removeAttr('selected');
        $('#id').val('');
        let route = $(this).data('route');
        $.ajax({
            url:route,
            method:'GET',

            success:function(data){
                $("#submit_button").removeAttr('disabled');
                if(data === 'not_found')
                {
                    $('#category_table').DataTable().ajax.reload();
                    @include('dashboard.pages.messages.500error',['msg'=>'هذا العنصر غير موجود'])
                }
                else
                {

                    $('#title_edit').val(data.title);
                    $('#date_edit').val(data.date);
                    $('#description_edit').text(data.description);
                    $('#points_edit').text(data.points);
                    $('#id').val(data.id);
                    $('.category_option[value='+data.category_id+']').attr('selected','selected');
                    $('#modalEdit').modal('show');

                }

            },

    })
    });


    //update
    $('#form_edit').on('submit',function(e){
        e.preventDefault();
        let route = "{{ route('dashboard.resume.index')}}" + '/update/' + e.target.id.value;
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
                $('#resume_table').DataTable().ajax.reload();
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
