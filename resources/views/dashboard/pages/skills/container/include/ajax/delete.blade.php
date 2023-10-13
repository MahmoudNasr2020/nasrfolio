<script>

    $(document).on('click', '.delete', function () {
        let route = $(this).data('route');
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
                        data:{_method:'DELETE'},
                        success: function (data)
                        {
                            $('#skill_table').DataTable().ajax.reload();
                            n.close();
                            if (data === 'not_found')
                            {
                                @include('dashboard.pages.messages.500error',['msg'=>'هذا العنصر غير موجود'])
                            }
                            else
                            {
                                @include('dashboard.pages.messages.success',['msg'=>'تم الحذف بنجاح'])
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
