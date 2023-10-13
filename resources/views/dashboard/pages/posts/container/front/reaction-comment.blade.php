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
                    <span style="margin-right: -9px;" class="counter Like-counter"
                          data-counter="{{$counter_reaction['Like']}}">{{$counter_reaction['Like']}}</span>
                </li>

                <li style="
                                                        list-style-type: none;
                                                        cursor: pointer;
                                                        display: inline-block;
                                                        margin-left: 10px;
                                                    ">
                    <img src="{{ asset('site/images/reactions/love.gif') }}" alt="" style="width: 46px !important;">
                    <span style="margin-right: -7px;" class="counter Love-counter " data-counter="{{$counter_reaction['Love']}}">{{$counter_reaction['Love']}}</span>
                </li>

                <li style="
                                                            list-style-type: none;
                                                            cursor: pointer;
                                                            display: inline-block;
                                                            /* width: 36px; */
                                                            margin-right: 10px;
                                                        ">
                    <img src="{{ asset('site/images/reactions/haha.gif') }}" alt="" style="width: 29px !important;">
                    <span class="counter HaHa-counter" data-counter="{{$counter_reaction['HaHa']}}">{{$counter_reaction['HaHa']}}</span>
                </li>

                <li style="
                                                            list-style-type: none;
                                                            cursor: pointer;
                                                            display: inline-block;
                                                            margin-right: 10px;
                                                        ">
                    <img src="{{ asset('site/images/reactions/wow.gif') }}" alt="" style="width: 38px !important;">
                    <span class="counter Wow-counter" data-counter="{{$counter_reaction['Wow']}}">{{$counter_reaction['Wow']}}</span>
                </li>

                <li style="
                                                            list-style-type: none;
                                                            cursor: pointer;
                                                            display: inline-block;
                                                            margin-right: 10px;
                                                        ">
                    <img src="{{ asset('site/images/reactions/silent.gif') }}" alt="" style="width: 32px !important;">
                    <span class="counter Silent-counter" data-counter="{{$counter_reaction['Silent']}}">{{$counter_reaction['Silent']}}</span>
                </li>

                <li style="list-style-type: none;cursor: pointer;display: inline-block;margin-right: 10px;">
                    <img src="{{ asset('site/images/reactions/sad.gif') }}" alt="" style="width: 38px !important;">
                    <span class="counter Sad-counter" data-counter="{{$counter_reaction['Sad']}}">{{$counter_reaction['Sad']}}</span>
                </li>

                <li style="list-style-type: none;cursor: pointer;display: inline-block; margin-right: 10px;">
                    <img src="{{ asset('site/images/reactions/angry.gif') }}" alt="" style="width: 42px !important;">
                    <span class="counter Angry-counter" data-counter="{{$counter_reaction['Angry']}}">{{$counter_reaction['Angry']}}</span>
                </li>

            </ul>
        </div>
    </div>
</div>
<!-- end reaction post -->
<hr>
<!-- comment post -->
<!--   Comments Start  -->
@if($post->comments->count() > 0)
    @php
        $id='';
    @endphp
    <div class="comments mt-5">
        <h3 id="comment-text" style="display: {{ !$post->comments->count() > 0 ? 'none' : 'block'  }}">التعليقات</h3>
        <ul class="list-inline comments-list">
            @foreach($post->comments as $comment)
                @php
                    $id=$comment->id;
                @endphp
                <li class="list-inline-item comment-item">
                    <div class="comment-wrap" >
                        <div class="image-comment">
                            <img src="{{ asset('dashboard/images/'.$comment->user->image) }}" alt="/" style="width: 65px;border-radius: 50%;">
                        </div>
                        <div class="comment-content">
                            <div class="comment-author">
                                <span style="font-size: 16px">{{ $comment->user->name }}</span>
                                <p class="text-muted">
                                    <a href="#">
                                                                            <span>
                                                                                {{  $comment->created_at->format('M d,Y') }}
                                                                            </span>

                                        <span>
                                                                                 {{ $comment->created_at->format('h:i')  }} <span style="float: right;margin-top: -3px;margin-left: 5px;"> {{ $comment->created_at->format('A') == 'PM' ? 'م' : 'ص' }} </span>
                                                                            </span>
                                    </a>
                                </p>
                            </div>
                            <p class="mb-0" style="font-size: 17px;">{{ $comment->comment }}</p>

                            <a href="#" class="comment-reply-link delete-comment delete-comment-{{ $comment->id }}" data-id="{{ $comment->id }}"
                               style="color:red;position: relative;right: 32px;float: left;top: -23px;">
                                <i class="fa fa-trash-alt"></i>
                            </a>
                        </div>
                    </div>
                </li>
            @endforeach

        </ul>
    </div>
    <div class="mb-4" style="text-align: center;">
        <a href="" class="btn btn-primary" id="load_more"
           style="display: {{ !$post->comments->count() > 0 ? 'none' : ''  }}" data-id="{{ $id }}" data-post_id="{{ \Illuminate\Support\Facades\Crypt::encryptString($post->id) }}" >
            المزيد
        </a>
    </div>

    <!-- Data Loader -->
    <div class="auto-load text-center" style="display:none;">
        <svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
             x="0px" y="0px" height="60" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
                                                <path fill="#000"
                                                      d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
                                                    <animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s"
                                                                      from="0 50 50" to="360 50 50" repeatCount="indefinite" />
                                                </path>
                                            </svg>
    </div>
@endif
