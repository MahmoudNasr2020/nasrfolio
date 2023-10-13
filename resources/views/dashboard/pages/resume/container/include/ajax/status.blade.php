<script>
    $(document).on('change','.status',function(e){
        let id = $(this).data('id');
        let status ='';
        if($(this).is(':checked'))
        {
            status = 'enable';
        }
        else
        {
            status = 'disable';
        }
        let route = "{{ route('dashboard.resume.status') }}";
        $.ajax({
            url:route,
            method:'POST',
            data: {id:id,status:status},
            success:function(data){
                if (data === 'not_found')
                {
                    @include('dashboard.pages.messages.500error',['msg'=>'هذا العنصر غير موجود'])
                }
            }
        });
    });
</script>
