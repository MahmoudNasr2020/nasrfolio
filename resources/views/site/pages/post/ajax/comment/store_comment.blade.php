<script>
    $('#form-comment').on('submit',function (e) {
        e.preventDefault();
        let data = $(this).serialize();
        $.ajax({
            method:"POST",
            url:"{{ route('site.comment.store_comment') }}",
            data:data,
            beforeSend:function () {
                $("#btn-submit").attr('disabled','disabled');
            },
            success:function (data) {
                if(data.status == 'done')
                {
                    $("#btn-submit").removeAttr('disabled','disabled');
                    $('#form-comment')[0].reset();
                    $("#comment-text").css('display','block');
                    $("#comments").css('display','block');
                    $("#load_more").css('display','');
                    $('.comments-list').prepend(data.result);
                }
                else if(data == 0)
                {
                    $('#form-comment')[0].reset();
                    $("#btn-submit").removeAttr('disabled','disabled');
                }
            },
            error:function (reject)
            {
                $("#btn-submit").removeAttr('disabled','disabled');
                let errors = reject.responseJSON.errors;
                $.each(errors,function(key,val){
                    @include('dashboard.pages.messages.error')
                });
            }
        });
    });
</script>
