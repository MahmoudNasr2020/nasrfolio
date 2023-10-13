<script>
    $('#load_more').on('click',function(e){
        e.preventDefault();
        let id = $(this).data('id');
        let post_id = $(this).data('post_id');
        $.ajax({
            method:"POST",
            url:"{{ route('site.comment.loadMore') }}",
            data: {id:id,post_id:post_id,dashboard:true},
            beforeSend:function () {
               $('#load_more').hide();
                $('.auto-load').show();
            },
            success:function (data) {
                if(data.results != '')
                {
                    $('.comments-list').append(data.results);
                    $('#load_more').data('id',data.id)
                    $('#load_more').attr('data-id',data.id)
                    $('#load_more').show();
                    $('.auto-load').hide();
                }

                else
                {
                    $('#load_more').text('لا توجد تعليقات اخري');
                    $('#load_more').show();
                    $('.auto-load').hide();
                }

            },
            error:function () {
                $('#load_more').text('لا توجد تعليقات اخري');
                $('#load_more').show();
                $('.auto-load').hide();
            }
        });
    });
</script>
