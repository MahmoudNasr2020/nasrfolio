<script>
    $(document).ready(function() {
        $('#main_row_check').on('change',function () {
            if($(this).is(':checked'))
            {
                $('.row_check').prop('checked',true);
                $('#multi_delete').css('display','inline-flex');
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
                $('#multi_delete').css('display','inline-flex');
            }
            else
            {
                if($('#main_row_check').is(':checked'))
                {
                    $('#multi_delete').css('display','inline-flex');
                }
                else
                {
                    $('#multi_delete').css('display','none');
                }
            }
        });
    });

    $('#multi_delete').on('click',function(){
        let data = [];
        let route = "{{ route('dashboard.resume.multi_delete')  }}";
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
                    Noty.button('نعم','btn btn-danger ml-2', function () {
                        $.ajax({
                            method: "POST",
                            url: route,
                            data:{data:data},
                            success: function (data)
                            {
                                $('#resume_table').DataTable().ajax.reload();
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
    });
</script>
