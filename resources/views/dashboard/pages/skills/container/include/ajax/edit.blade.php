<script>
    //edit
    $(document).on('click','.edit',function (e) {
        e.preventDefault();
        $('#name_edit').val('');
        $('#id').val('');
        $('#percent_edit').val('');
        let route = $(this).data('route');
        $.ajax({
            url:route,
            method:'GET',
            success:function(data){
                $("#submit_button").removeAttr('disabled');
                if(data === 'not_found')
                {
                    $('#skill_table').DataTable().ajax.reload();
                    @include('dashboard.pages.messages.500error',['msg'=>'هذا العنصر غير موجود'])
                }
                else
                {

                    $('#name_edit').val(data.name);
                    $('#percent_edit').val(data.percent);
                    $('#id').val(data.id);
                    $('#modalEdit').modal('show');

                }

            },

    })
    });


    //update
    $('#form_edit').on('submit',function(e){
        e.preventDefault();
        let route = "{{ route('dashboard.skill.index')}}" + '/update/' + e.target.id.value;
        let data = $(this).serialize();
        $.ajax({
            url:route,
            type:'POST',
            data: data,
            beforeSend:function () {
                $("#submit_button_edit").attr('disabled','disabled');
            },
            success:function(data){
                $("#submit_button_edit").removeAttr('disabled');
                $('#skill_table').DataTable().ajax.reload();
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
