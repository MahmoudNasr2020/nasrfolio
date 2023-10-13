<script>
    //edit
    $(document).on('click','.edit',function (e) {
        e.preventDefault();
        $('#question_edit').val('');
        $('#ar_answer_edit').val('');
        $('#en_answer_edit').val('');
        $('#id').val('');
        $('#image_edit').attr('src','');
        let route = $(this).data('route');
        $.ajax({
            url:route,
            method:'GET',

            success:function(data){
                $("#submit_button").removeAttr('disabled');
                if(data === 'not_found')
                {
                    $('#interview_table').DataTable().ajax.reload();
                    @include('dashboard.pages.messages.500error',['msg'=>'هذا العنصر غير موجود'])
                }
                else
                {
                    $('#question_edit').val(data.question);
                    $('#ar_answer_edit').val(data.ar_answer);
                    $('#en_answer_edit').val(data.en_answer);
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
        let route = "{{ route('dashboard.interview.index')}}" + '/update/' + e.target.id.value;
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
                $('#client_table').DataTable().ajax.reload();
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
