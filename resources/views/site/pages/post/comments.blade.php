<div class="comments mt-5">
    <h3 id="comment-text" style="display: {{ !$comments->count() > 0 ? 'none' : 'block'  }}">التعليقات</h3>
    <ul class="list-inline comments-list">

        @php
            $id='';
        @endphp
        @foreach($comments as $comment)
            @php
                $id=$comment->id;
                $name = $comment->user->name;
                if(\Illuminate\Support\Facades\Auth::check())
                {
                    if ($comment->user_id  == \Illuminate\Support\Facades\Auth::user()->id)
                        {
                            $name =  'أنت' ;
                        }
                }
            @endphp

                <li class="list-inline-item comment-item" data-id="{{ $comment->id }}" style="display: block!important;">
                    <div class="comment-wrap">
                        <div class="image-comment">
                            <img src="{{ asset('dashboard/images/'.$comment->user->image) }}" alt="/">
                        </div>
                        <div class="comment-content">
                            <div class="comment-author">
                                {{  $name }}
                                <p class="text-muted">
                                    <a href="#">
                                        <span>
                                            {{  $comment->created_at->format('M d,Y') }}
                                        </span>

                                        <span>
                                             {{ $comment->created_at->format('h:i')  }} <span style="float: right;margin-top: 4px;margin-left: 5px;"> {{ $comment->created_at->format('A') == 'PM' ? 'م' : 'ص' }} </span>
                                        </span>
                                    </a>
                                </p>
                            </div>
                            <p class="mb-0 comment-content-text-{{ $comment->id }}">{{ $comment->comment }}</p>

                            @auth
                                @if($comment->user_id  == \Illuminate\Support\Facades\Auth::user()->id)
                                    <a href="#" class="comment-reply-link edit-comment edit-comment-{{ $comment->id }}"
                                        data-id="{{ $comment->id }}" data-comment="{{ $comment->comment }}"
                                       style="color:green;position: relative;right: -16px;float: left;top: -23px;">
                                        <i class="fa fa-pen-alt"></i>
                                    </a>

                                    <a href="#" class="comment-reply-link delete-comment delete-comment-{{ $comment->id }}" data-id="{{ $comment->id }}"
                                       style="color:red;position: relative;right: 32px;float: left;top: -23px;">
                                        <i class="fa fa-trash-alt"></i>
                                    </a>
                                @endif
                            @endauth
                        </div>
                    </div>
                </li>


        @endforeach



    </ul>
</div>
<div class="mb-4" style="text-align: center;">
    <a href="" class="pill-button-01" id="load_more"
       style="display: {{ !$comments->count() > 0 ? 'none' : ''  }}" data-id="{{ $id }}" data-post_id="{{ \Illuminate\Support\Facades\Crypt::encryptString($post->id) }}">المزيد</a>
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


@include('site.pages.post.modal.edit_comment')
