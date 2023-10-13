<script>
    //store reaction

        $(document).on('click','.emoji',function () {
            let auth = "{{ \Illuminate\Support\Facades\Auth::check() }}";
            if(auth)
            {
                let reaction = $(this).data('reaction');
                let reaction_ar = $(this).data('reaction_ar');
                let post_id = $('.reaction-container').data('post_id');
                let new_counter = $('.'+reaction+'-counter').attr('data-counter');
                let old_counter_item = $('.counter[class*=active]');

                if(!$('.'+reaction+'-counter').hasClass('active'))
                {
                    if(old_counter_item.length != 0)
                    {
                        let old_counter =  parseInt(old_counter_item.attr('data-counter'));
                        old_counter--;
                        old_counter_item.attr('data-counter',old_counter);
                        old_counter_item.text(old_counter);
                        $('.counter').removeClass('active');
                    }

                    new_counter++;
                    $('.'+reaction+'-counter').attr('data-counter',new_counter);
                    $('.'+reaction+'-counter').text(new_counter);
                    $('.'+reaction+'-counter').addClass('active');
                }
                $(".reaction-btn-emo").removeClass().addClass('reaction-btn-emo').addClass('like-btn-' + reaction.toLowerCase());
                $(".reaction-btn-text").empty().text(reaction_ar).removeClass().addClass('reaction-btn-text').addClass('reaction-btn-text-' + reaction.toLowerCase()).addClass("active");

                $.ajax({
                    method:"POST",
                    url:"{{ route('site.reaction.store_reaction') }}",
                    data:{reaction:reaction,post_id:post_id},
                    success:function(data)
                    {
                        if(data == 0)
                        {
                            @include('dashboard.pages.messages.500error',['msg'=>'حدث خطأ ما'])
                            $(".reaction-btn-emo").removeClass().addClass('reaction-btn-emo').addClass('like-btn-default');
                            $(".reaction-btn-text").empty().html('<i class="fa fa-thumbs-up" style="font-size: 24px;"></i>').removeClass().addClass('reaction-btn-text');
                        }
                    },
                    error:function () {
                        @include('dashboard.pages.messages.500error',['msg'=>'حدث خطأ ما'])
                    }
                });
            }
            else {
                swal("يجب تسجيل الدخول اولا");
            }
        })


        //remove reaction
        $('.reaction-btn').on('click',function () {
            let auth = "{{ \Illuminate\Support\Facades\Auth::check() }}";
            if(auth)
            {
                if($('.reaction-btn-text').hasClass('active'))
                {
                    let post_id = $('.reaction-container').data('post_id');
                    $('.reaction-btn-text').removeClass().addClass('reaction-btn-text').addClass('reaction-btn-default');
                    $('.reaction-btn-text').html('<i class="fa fa-thumbs-up" style="font-size: 24px;"></i><span style="margin-right:7px;">أعجبني</span>');
                    $('.reaction-btn-emo').removeClass().addClass('reaction-btn-emo').addClass('like-btn-default');
                    let old_counter_item = $('.counter[class*=active]');
                    //let old_counter =  parseInt(old_counter_item.attr('data-counter'));
                    if(old_counter_item.length != 0)
                    {
                        let old_counter =  parseInt(old_counter_item.attr('data-counter'));
                        old_counter--;
                        old_counter_item.attr('data-counter',old_counter);
                        old_counter_item.text(old_counter);
                        $('.counter').removeClass('active');
                    }

                    $.ajax({
                        method:"POST",
                        url:"{{ route('site.reaction.remove_reaction') }}",
                        data:{post_id:post_id},
                        success:function(data)
                        {
                            if(data == 0)
                            {
                                @include('dashboard.pages.messages.500error',['msg'=>'حدث خطأ ما'])
                                $(".reaction-btn-emo").removeClass().addClass('reaction-btn-emo').addClass('like-btn-default');
                                $(".reaction-btn-text").empty().html('<i class="fa fa-thumbs-up" style="font-size: 24px;"></i><span style="margin-right:7px;">أعجبني</span>').removeClass().addClass('reaction-btn-text');
                            }
                        },
                        error:function () {
                            @include('dashboard.pages.messages.500error',['msg'=>'حدث خطأ ما'])
                        }
                    });
                }
            }
            else
            {
                swal("يجب تسجيل الدخول اولا");
            }

        })


</script>
