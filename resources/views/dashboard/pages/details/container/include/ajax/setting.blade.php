<script>

    //update
    $('#form_setting').on('submit',function(e){
        e.preventDefault();
        let route = "{{ route('dashboard.details.setting')}}";
        let data = new FormData(this);
        $.ajax({
            url:route,
            method:'POST',
            data:data,
            cache:false,
            processData:false,
            contentType:false,
            beforeSend:function () {
                $("#submit_button_setting").attr('disabled','disabled');
            },
            success:function(data){
                $("#submit_button_setting").removeAttr('disabled');
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
                $("#submit_button_setting").removeAttr('disabled');
                let errors = reject.responseJSON.errors;
                $.each(errors,function(key,val){
                    @include('dashboard.pages.messages.error')
                });
            }
        });
    });
</script>
