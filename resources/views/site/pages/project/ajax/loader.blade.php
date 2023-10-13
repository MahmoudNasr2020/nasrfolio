<script>
    $('#load_more').on('click',function(e){
        e.preventDefault();
        let id = $(this).data('id');
        $.ajax({
            method:"GET",
            url:"{{ route('site.projects.loadMore') }}",
            data:{id:id},
            beforeSend:function () {
                $('#load_more').hide();
                $('.auto-load').show();
            },
            success:function (data) {
                if(data.results != '')
                {
                    $('#portfolio-items').append(data.results);
                    $('#load_more').data('id',data.id);
                    $('#load_more').show();
                    $('.auto-load').hide();
                }

                else
                {
                    $('#load_more').text('لا توجد مشاريع اخري');
                    $('#load_more').show();
                    $('.auto-load').hide();
                }

            },
            error:function () {
                $('#load_more').text('لا توجد مشاريع اخري');
                $('#load_more').show();
                $('.auto-load').hide();
            }
        });
    });
</script>
