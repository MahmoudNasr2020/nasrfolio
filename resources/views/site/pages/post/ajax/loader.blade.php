<script>
    $('#load_more').on('click',function(e){
        e.preventDefault();
        let id = $(this).data('id');
        let name = $(this).data('name');
        $.ajax({
            method:"GET",
            url:"{{ route('site.posts.loadMore') }}",
            data:{id:id,name:name},
            beforeSend:function () {
                $('#load_more').hide();
                $('.auto-load').show();
            },
            success:function (data) {
                if(data.results != null)
                {
                    $('#blog-item').append(data.results);
                    $('#load_more').data('id',data.id);
                    $('#load_more').show();
                    $('.auto-load').hide();
                }

                else
                {
                    $('#load_more').text('لا توجد بوستات اخري');
                    $('#load_more').show();
                    $('.auto-load').hide();
                }

            },
            error:function () {
                $('#load_more').text('لا توجد بوستات اخري');
                $('#load_more').show();
                $('.auto-load').hide();
            }
        });
    });
</script>
