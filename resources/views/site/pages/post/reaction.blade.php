@php
    $reaction = 'like-btn-default';
    $reaction_btn_text_class='reaction-btn-default';
    $reaction_counter_active = [ 'Like' => '' , 'Love' => '' ,'HaHa' => '' ,'Wow' => '' , 'Silent' => '' , 'Sad'=>'' ,'Angry' => ''];;
    $reaction_btn_text='<i class="fa fa-thumbs-up" style="font-size: 24px;text-decoration: none !important;"></i><span style="margin-right:7px;">أعجبني</span>';
    if(\Illuminate\Support\Facades\Auth::check())
    {
        $reaction_text = [ 'Like' => 'أعجبني' , 'Love' => 'أحببته' ,'HaHa' => 'أضحكني' ,'Wow' => 'أدهشني' , 'Silent' => 'صامت' , 'Sad'=>'أحزنني' ,'Angry' => 'أغضبني'] ;
        $reaction_user = \App\Models\Reaction::where(['user_id'=>\Illuminate\Support\Facades\Auth::user()->id,'post_id'=>$post->id])->first();
        if($reaction_user)
            {
                $reaction_counter_active[$reaction_user->reaction] = 'active';
                $reaction = strtolower('like-btn-'.strtolower($reaction_user->reaction ));
                $reaction_btn_text = $reaction_text[$reaction_user->reaction];
                $reaction_btn_text_class = 'reaction-btn-text-'.strtolower($reaction_user->reaction) .' active';
            }

    }

        $counter_reaction = [ 'Like' => 0 , 'Love' => 0 ,'HaHa' => 0 ,'Wow' => 0 , 'Silent' => 0 , 'Sad'=>0 ,'Angry' => 0];
        foreach ($post->reactions as $item)
        {
           $counter_reaction[$item->reaction]++;
        }
@endphp

<div class="reaction-container" data-post_id="{{ \Illuminate\Support\Facades\Crypt::encryptString($post->id) }}"><!-- container div for reaction system -->
    <span class="reaction-btn"> <!-- Default like button -->
                                <span class="reaction-btn-emo {{ $reaction }}"></span> <!-- Default like button emotion-->
                                <span class="reaction-btn-text {{ $reaction_btn_text_class }}"> {!! $reaction_btn_text  !!}  </span> <!-- Default like button text,(Like, wow, sad..) default:Like  -->
                                <ul class="emojies-box"> <!-- Reaction buttons container-->
                                    <li class="emoji emo-like" data-reaction="Like"  data-reaction_ar="أعجبني"></li>
                                    <li class="emoji emo-love" data-reaction="Love" data-reaction_ar="أحببته"></li>
                                    <li class="emoji emo-haha" data-reaction="HaHa" data-reaction_ar="أضحكني"></li>
                                    <li class="emoji emo-wow" data-reaction="Wow" data-reaction_ar="أدهشني"></li>
                                    <li class="emoji emo-silent" data-reaction="Silent" data-reaction_ar="صامت"></li>
                                    <li class="emoji emo-sad" data-reaction="Sad" data-reaction_ar="أحزنني"></li>
                                    <li class="emoji emo-angry" data-reaction="Angry" data-reaction_ar="أغضبني"></li>
                                </ul>
                                </span>
    <br>
    <div class="like-stat"> <!-- Like statistic container-->
        <div class="container">
            <div class="row">
                <ul style="margin-right: 2rem !important;">
                    <li style="
                                                            list-style-type: none;
                                                            cursor: pointer;
                                                            display: inline-block;
                                                            /* width: 0px; */
                                                            margin-left: 10px;
                                                        ">
                        <img src="{{ asset('site/images/reactions/like.jpg') }}" alt="" style="width: 45px !important;">
                        <span style="margin-right: -9px;" class="counter Like-counter {{ $reaction_counter_active['Like'] }}"
                              data-counter="{{$counter_reaction['Like']}}">{{$counter_reaction['Like']}}</span>
                    </li>

                    <li style="
                                                        list-style-type: none;
                                                        cursor: pointer;
                                                        display: inline-block;
                                                        margin-left: 10px;
                                                    ">
                        <img src="{{ asset('site/images/reactions/love.gif') }}" alt="" style="width: 46px !important;">
                        <span style="margin-right: -7px;" class="counter Love-counter {{ $reaction_counter_active['Love'] }}" data-counter="{{$counter_reaction['Love']}}">{{$counter_reaction['Love']}}</span>
                    </li>

                    <li style="
                                                            list-style-type: none;
                                                            cursor: pointer;
                                                            display: inline-block;
                                                            /* width: 36px; */
                                                            margin-right: 10px;
                                                        ">
                        <img src="{{ asset('site/images/reactions/haha.gif') }}" alt="" style="width: 30px !important;">
                        <span class="counter HaHa-counter {{ $reaction_counter_active['HaHa'] }}" data-counter="{{$counter_reaction['HaHa']}}">{{$counter_reaction['HaHa']}}</span>
                    </li>

                    <li style="
                                                            list-style-type: none;
                                                            cursor: pointer;
                                                            display: inline-block;
                                                            margin-right: 10px;
                                                        ">
                        <img src="{{ asset('site/images/reactions/wow.gif') }}" alt="" style="width: 38px !important;">
                        <span class="counter Wow-counter {{ $reaction_counter_active['Wow'] }}" data-counter="{{$counter_reaction['Wow']}}">{{$counter_reaction['Wow']}}</span>
                    </li>

                    <li style="
                                                            list-style-type: none;
                                                            cursor: pointer;
                                                            display: inline-block;
                                                            margin-right: 10px;
                                                        ">
                        <img src="{{ asset('site/images/reactions/silent.gif') }}" alt="" style="width: 35px !important;">
                        <span class="counter Silent-counter {{ $reaction_counter_active['Silent'] }}" data-counter="{{$counter_reaction['Silent']}}">{{$counter_reaction['Silent']}}</span>
                    </li>

                    <li style="list-style-type: none;cursor: pointer;display: inline-block;margin-right: 10px;">
                        <img src="{{ asset('site/images/reactions/sad.gif') }}" alt="" style="width: 38px !important;">
                        <span class="counter Sad-counter {{ $reaction_counter_active['Sad'] }}" data-counter="{{$counter_reaction['Sad']}}">{{$counter_reaction['Sad']}}</span>
                    </li>

                    <li style="list-style-type: none;cursor: pointer;display: inline-block; margin-right: 10px;">
                        <img src="{{ asset('site/images/reactions/angry.gif') }}" alt="" style="width: 42px !important;">
                        <span class="counter Angry-counter {{ $reaction_counter_active['Angry'] }}" data-counter="{{$counter_reaction['Angry']}}">{{$counter_reaction['Angry']}}</span>
                    </li>

                </ul>
            </div>
        </div>
    </div>
</div>
