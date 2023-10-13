<script>
    $('#add_member').submit(function (e) {
        e.preventDefault();
        let data = new FormData(this);
        $.ajax({
            url:"{{ route('dashboard.role.store') }}",
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
                    $('#show_image').css('display','none');
                    $('#add_member')[0].reset();
                    @include('dashboard.pages.messages.success',['msg'=>'تم الحفظ بنجاح'])
                }
            },
            error:function (reject) {
                $("#submit_button").removeAttr('disabled');
                var errors = reject.responseJSON.errors;
                $.each(errors,function(key,val){
                    @include("dashboard.pages.messages.error")
                });
            }
        });
    });
</script>
