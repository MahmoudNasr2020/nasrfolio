<script>
    $('#load_more').on('click',function(e){
        e.preventDefault();
        let data = [];
        let project_id = $(this).data('project_id');
        $('.rating-item').each(function () {
            data.push($(this).data('id'));
        });
        console.log(data);
        $.ajax({
            method:"POST",
            url:"{{ route('site.rating.loadMore') }}",
            data: {data:data,project_id:project_id},
            beforeSend:function () {
               $('#load_more').hide();
                $('.auto-load').show();
            },
            success:function (data) {
                if(data.results != '')
                {
                    $('.comments-list').append(data.results);
                    $('#load_more').show();
                    $('.auto-load').hide();
                }

                else
                {
                    $('#load_more').text('لا توجد مراجعات اخري');
                    $('#load_more').show();
                    $('.auto-load').hide();
                }

            },
            error:function () {
                $('#load_more').text('لا توجد مراجعات اخري');
                $('#load_more').show();
                $('.auto-load').hide();
            }
        });
    });
</script>
