<script>
    $('#form-rating').on('submit',function (e) {
        e.preventDefault();
        let data = $(this).serialize();
        $.ajax({
            method:"POST",
            url:"{{ route('site.projects.store_rating') }}",
            data:data,
            beforeSend:function () {
                $("#btn-submit").attr('disabled','disabled');
            },
            success:function (data) {
                if(data.status == 'done')
                {
                    $("#btn-submit").removeAttr('disabled','disabled');
                    $('#form-rating')[0].reset();
                    $("#div-rating").css('display','none');
                    $("#rating-text").css('display','block');
                    $("#ratings").css('display','block');
                    $("#load_more").css('display','');
                    $('#load_more').text('المزيد');
                    $('.comments-list').prepend(data.result);
                }
                else if(data == 0)
                {
                    $("#div-rating").css('display','none');
                    $('#form-rating')[0].reset();
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
