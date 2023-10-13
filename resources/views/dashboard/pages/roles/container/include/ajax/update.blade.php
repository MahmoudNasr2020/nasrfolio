<script>
    $('#edit_form').submit(function (e) {
        e.preventDefault();
        let data = new FormData(this);
        let route = $(this).data('route');
        $.ajax({
            url:route,
            method:"POST",
            data:data,
            contentType: false,
            cache: false,
            processData: false,
            beforeSend:function () {
                $("#submit_button").attr('disabled','disabled');
            },
            success:function (data) {
                if(data === "error")
                {
                    @include("dashboard.pages.messages.500error",['msg'=>'حدث خطأ ما'])
                }
                else
                {
                    $("#submit_button").removeAttr('disabled');
                    //$('#show_image').css('display','none');
                    @include('dashboard.pages.messages.success',['msg'=>'تم التعديل بنجاح'])
                }
            },
            error:function (reject) {
                $("#submit_button").removeAttr('disabled');
                let errors = reject.responseJSON.errors;
                $.each(errors,function(key,val){
                    @include("dashboard.pages.messages.error")
                });
            }
        });
    });
</script>
