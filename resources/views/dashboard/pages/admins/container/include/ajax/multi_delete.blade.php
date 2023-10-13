<script>
    $(document).ready(function() {
        $('#main_row_check').on('change',function () {
            if($(this).is(':checked'))
            {
                $('.row_check').prop('checked',true);
                $('#multi_delete').css('display','block');
            }
            else
            {
                $('.row_check').prop('checked',false);
                $('#multi_delete').css('display','none');
            }
        });

        $(document).on('change','.row_check',function () {
            if($(this).is(':checked'))
            {
                $('#multi_delete').css('display','block');
            }
            else
            {
                if($('#main_row_check').is(':checked'))
                {
                    $('#multi_delete').css('display','block');
                }
                else
                {
                    $('#multi_delete').css('display','none');
                }
            }
        });
    });

    //delete multi item
    $('#multi_delete').on('click',function () {
        let data = [];
        let route = "{{ route('dashboard.admin.multi_delete') }}";
        $('.row_check:checked').each(function(){
            data.push($(this).val());
        });
            if(data.length > 0)
            {
                let n = new Noty({
                    theme: 'relax',
                    type: 'alert',
                    text: 'حذف العناصر المحددة',
                    layout:"topRight",
                    killer:true,
                    buttons: [
                        Noty.button('نعم','btn btn-danger mr-2', function () {
                            $.ajax({
                                method: "POST",
                                url: route,
                                data:{data:data},
                                success: function (data)
                                {
                                    $('#admin_table').DataTable().ajax.reload(null, false);
                                    n.close();
                                    $('#multi_delete').css('display','none');
                                    $('.row_check').prop('checked',false);
                                    $('#main_row_check').prop('checked',false);
                                    @include('dashboard.pages.messages.success',['msg'=>'تم الحذف بنجاح'])
                                }
                            });
                        }),
                        Noty.button('لا', 'btn btn-light', function () {
                            n.close();
                        }),
                    ],
                });
                n.show();
            }
            else
            {
                @include("dashboard.pages.messages.500error",['msg'=>'يجب اختيار العناصر المراد حذفها'])
            }

    });
</script>
