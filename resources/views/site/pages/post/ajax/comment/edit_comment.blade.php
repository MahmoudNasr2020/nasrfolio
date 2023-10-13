<script>
    $(document).on('click', '.edit-comment', function (e) {
        e.preventDefault();
        let comment = $(this).data('comment');
        let id = $(this).data('id');
        $('#modal-comment-edit').modal('show');
        $('#comment_edit').text(comment);
        $('#id').val(id);
    });



    $('#form-comment-edit').on('submit',function (e) {
        e.preventDefault();
        let data = $(this).serialize();
        let comment = e.target.comment_edit.value;
        console.log(comment);
        $.ajax({
            method:"POST",
            url:"{{ route('site.comment.edit_comment') }}",
            data:data,
            beforeSend:function () {
                $("#btn-submit-edit").attr('disabled','disabled');
            },
            success:function (data) {
                if(data.status == 'done')
                {
                    $("#btn-submit-edit").removeAttr('disabled','disabled');
                    $('#form-comment-edit')[0].reset();
                    $('.edit-comment-'+data.id).data('comment',comment);
                    $('.edit-comment-'+data.id).attr('data-comment',comment);
                    $('.comment-content-text-'+data.id).text(comment);
                    $('#modal-comment-edit').modal('hide');
                }
                else if(data.status == 'error')
                {
                    @include('dashboard.pages.messages.500error',['msg'=>'حدث خطأ ما'])
                    $('#form-comment-edit')[0].reset();
                    $("#btn-submit-edit").removeAttr('disabled','disabled');
                }
            },
            error:function (reject)
            {
                $("#btn-submit-edit").removeAttr('disabled','disabled');
                let errors = reject.responseJSON.errors;
                $.each(errors,function(key,val){
                    @include('dashboard.pages.messages.error')
                });
            }
        });
    });
</script>
