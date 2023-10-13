<script>

    //update
    $('#form_edit').on('submit',function(e){
        e.preventDefault();
        let route = "{{ route('dashboard.project.index')}}" + '/update/' + e.target.id.value;
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
