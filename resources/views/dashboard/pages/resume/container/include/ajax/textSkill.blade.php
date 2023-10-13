<script>

    //update
    $('#form_edit_text').on('submit',function(e){
        e.preventDefault();
        let route = "{{ route('dashboard.skill.textSkill')}}";
        let data = $(this).serialize();
        $.ajax({
            url:route,
            type:'POST',
            data: data,
            beforeSend:function () {
                $("#submit_button_text").attr('disabled','disabled');
            },
            success:function(data){
                $("#submit_button_text").removeAttr('disabled');
                if(data === 'not_found')
                {
                    $('#modalTextSkill').modal('hide');
                    @include('dashboard.pages.messages.500error',['msg'=>'هذا العنصر غير موجود'])
                }
                else if(data === 'error')
                {
                    @include('dashboard.pages.messages.500error',['msg'=>'حدث خلل ما'])
                }
                else
                {
                    $('#modalTextSkill').modal('hide');
                    @include('dashboard.pages.messages.success',['msg'=>'تم التعديل بنجاح'])
                }

            },
            error:function(reject)
            {
                $("#submit_button_text").removeAttr('disabled');
                let errors = reject.responseJSON.errors;
                $.each(errors,function(key,val){
                    @include('dashboard.pages.messages.error')
                });
            }
        });
    });
</script>
