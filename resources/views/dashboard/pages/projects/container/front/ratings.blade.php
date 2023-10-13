<!-- comment post -->
<!--   Comments Start  -->
@if($project->ratings->count() > 0)
    @php
        $id='';
    @endphp
    <div class="comments mt-5">
        <h3 id="rating-text" style="display: {{ !$project->ratings->count() > 0 ? 'none' : 'block'  }}">المراجعات</h3>
        <ul class="list-inline comments-list">
            @foreach($project->ratings as $rating)
                @php
                    $id=$rating->id;
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
                <li class="list-inline-item rating-item">
                    <div class="comment-wrap" >
                        <div class="image-comment">
                            <img src="{{ asset('dashboard/images/'.$rating->user->image) }}" alt="/" style="width: 65px;border-radius: 50%;">
                        </div>
                        <div class="comment-content">
                            <div class="comment-author">
                                <span style="font-size: 16px">{{ $rating->user->name }}</span>
                                {!! $star !!}
                                <p class="text-muted">
                                    <a href="#">
                                      <span>
                                       {{  $rating->created_at->format('M d,Y') }}
                                       </span>

                                        <span>
                                          {{ $rating->created_at->format('h:i')  }} <span style="float: right;margin-top: -3px;margin-left: 5px;"> {{ $rating->created_at->format('A') == 'PM' ? 'م' : 'ص' }} </span>
                                         </span>
                                    </a>
                                </p>
                            </div>
                            <p class="mb-0" style="font-size: 17px;">{{ $rating->comment }}</p>

                            <a href="#" class="comment-reply-link delete-rating delete-rating-{{ $rating->id }}" data-id="{{ $rating->id }}"
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
           style="display: {{ !$project->ratings->count() > 0 ? 'none' : ''  }}" data-id="{{ $id }}" data-project_id="{{ \Illuminate\Support\Facades\Crypt::encryptString($project->id) }}" >
            المزيد
        </a>
    </div>

    <!-- Data Loader -->
    <div class="auto-load text-center" style="display:none;">
        <svg version="1.1" id="L9" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
             x="0px" y="0px" height="60" viewBox="0 0 100 100" enable-background="new 0 0 0 0" xml:space="preserve">
            <path fill="#000" d="M73,50c0-12.7-10.3-23-23-23S27,37.3,27,50 M30.9,50c0-10.5,8.5-19.1,19.1-19.1S69.1,39.5,69.1,50">
                <animateTransform attributeName="transform" attributeType="XML" type="rotate" dur="1s" from="0 50 50" to="360 50 50" repeatCount="indefinite" />
            </path>
         </svg>
    </div>
@endif
