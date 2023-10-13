 <div class="comments mt-5">
        <h3 id="rating-text" style="display: {{ !$ratings->count() > 0 ? 'none' : 'block'  }}">المراجعات</h3>
        <ul class="list-inline comments-list">
            @php
                $other_ratings = [];
                $loading_more=[];
            @endphp
            @foreach($ratings as $rating)
                    @php
                        $star ='';
                        for($i=1;$i<=5;$i++)
                        {
                             if ($i<=$rating->rating)
                                {
                                    $star.=' <span class="fa fa-star checked" style="color: orange"></span>';
                                }
                                else
                                {
                                    $star.=' <span class="fa fa-star"></span>';
                                }
                        }
                        $name = $rating->user->name;
                        if(\Illuminate\Support\Facades\Auth::check())
                        {
                            if ($rating->user_id  == \Illuminate\Support\Facades\Auth::user()->id)
                                {
                                    $name =  'أنت' ;
                                }
                        }
                    @endphp
                 @if($name === 'أنت')
                     @php
                         array_push($loading_more,$rating->id);
                     @endphp
                        <li class="list-inline-item rating-item" data-id="{{ $rating->id }}" style="display: block!important;">
                            <div class="comment-wrap">
                                <div class="image-comment">
                                    <img src="{{ asset('dashboard/images/'.$rating->user->image) }}" alt="/">
                                </div>
                                <div class="comment-content">
                                    <div class="comment-author">
                                        {{  $name}}  (مثبت)
                                        {!! $star !!}
                                        <p class="text-muted">
                                            <a href="#">
                                                <span>
                                                    {{  $rating->created_at->format('M d,Y') }}
                                                </span>
                                                <span>
                                                     {{ $rating->created_at->format('h:i')  }} <span style="float: right;margin-top: 4px;margin-left: 5px;"> {{ $rating->created_at->format('A') == 'PM' ? 'م' : 'ص' }} </span>
                                                </span>
                                            </a>
                                        </p>
                                    </div>
                                    <p class="mb-0">{{ $rating->comment }}</p>

                                    @auth
                                        @if($rating->user_id  == \Illuminate\Support\Facades\Auth::user()->id)
                                            <a href="#" class="comment-reply-link delete-rating" data-id="{{ $rating->id }}"
                                               style="color:red;position: relative;right: 32px;float: left;top: -23px;">
                                                <i class="fa fa-trash-alt"></i>
                                            </a>
                                        @endif
                                    @endauth
                                </div>
                            </div>
                        </li>
                    @else
                     @php
                       array_push($other_ratings,$rating);
                     @endphp
                 @endif
            @endforeach


            @foreach($other_ratings as $rating)
                    @php
                         array_push($loading_more,$rating->id);
                            $star ='';
                            for($i=1;$i<=5;$i++)
                            {
                                 if ($i<=$rating->rating)
                                    {
                                        $star.=' <span class="fa fa-star checked" style="color: orange"></span>';
                                    }
                                    else
                                    {
                                        $star.=' <span class="fa fa-star"></span>';
                                    }
                            }
                    @endphp

                    <li class="list-inline-item rating-item" style="display: block!important;" data-id="{{ $rating->id }}">
                        <div class="comment-wrap">
                            <div class="image-comment">
                                <img src="{{ asset('dashboard/images/'.$rating->user->image) }}" alt="/">
                            </div>
                            <div class="comment-content">
                                <div class="comment-author">
                                    {{ $rating->user->name }}
                                    {!! $star !!}
                                    <p class="text-muted">
                                        <a href="#">
                                             <span>
                                                    {{  $rating->created_at->format('M d,Y') }}
                                             </span>
                                            <span>
                                                     {{ $rating->created_at->format('h:i')  }} <span style="float: right;margin-top: 4px;margin-left: 5px;"> {{ $rating->created_at->format('A') == 'PM' ? 'م' : 'ص' }} </span>
                                            </span>
                                        </a>
                                    </p>
                                </div>
                                <p class="mb-0">{{ $rating->comment }}</p>
                            </div>
                        </div>
                    </li>
                @endforeach

        </ul>
    </div>
    <div class="mb-4" style="text-align: center;">
        <a href="" class="pill-button-01" id="load_more"
           style="display: {{ !$ratings->count() > 0 ? 'none' : ''  }}"
           data-ids="[{{ implode(',',$loading_more) }}]" data-project_id="{{ \Illuminate\Support\Facades\Crypt::encryptString($project->id) }}">المزيد</a>
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
