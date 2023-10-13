<script>

    $(document).on('click', '.delete-comment', function (e) {
        e.preventDefault();
        let id = $(this).data('id');
        let route = "{{route('site.comment.delete')}}";
        let n = new Noty({
            theme: 'relax',
            type: 'alert',
            text: 'حذف هذا العنصر',
            layout:"topRight",
            killer:true,
            buttons: [
                Noty.button('نعم','btn btn-danger ml-2', function () {
                    $.ajax({
                        method: "POST",
                        url: route,
                        data:{id:id},
                        success: function (data)
                        {
                            if (data.status === 'not_found')
                            {
                                @include('dashboard.pages.messages.500error',['msg'=>'هذا العنصر غير موجود'])
                            }
                            else
                            {
                                n.close();
                                $('.delete-comment-'+id).parents('.comment-item').remove();
                                $("#div-comment").css('display','block');
                                @include('dashboard.pages.messages.success',['msg'=>'تم الحذف بنجاح'])
                                if($.trim($(".comments-list").html())=='')
                                {
                                    $("#comment-text").css('display','none');
                                    $("#comments").css('display','none');
                                    $("#load_more").css('display','none');
                                }

                            }
                        }
                    });
                }),
                Noty.button('لا', 'btn btn-light', function () {
                    n.close();
                }),
            ],
        });
        n.show();
    });

</script>
