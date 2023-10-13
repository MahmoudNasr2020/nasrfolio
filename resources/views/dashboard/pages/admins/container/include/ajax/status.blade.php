<script>
    $(document).on('change','.status',function () {
        let status = $(this).is(':checked') ? 'enable' : 'disable';
        let id = $(this).data('id');
        $.ajax({
            method:"POST",
            url:"{{ route('dashboard.admin.status') }}",
            data:{id:id,status:status},
            success:function (data) {
                if(data === "error")
                {
                    @include("dashboard.pages.messages.500error",['msg'=>'حدث خطأ ما'])
                }
            },
        });
    });
</script>
