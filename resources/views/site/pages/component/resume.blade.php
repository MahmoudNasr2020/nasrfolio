<!--    Resume Start   -->
@if($data['categories']->count() > 0 && $data['resumes'] > 0)
    <div class="resume-01 pt-6">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-box-03">
                    <h2 class="title-header">السيرة الذاتية</h2>
                    <h4>عرض السيرة الذاتية الخاصة بي</h4> <br>
                </div>
            </div>
        </div>
        <!--    TimeLine Start   -->
        <div class="row mt-5" style="display: table-header-group;">

            @foreach($data['categories'] as $category)
                <div class="col-md-6" style="display: table-header-group;">
                    <h4 class="title-resume">
                        <img src="{{ asset('dashboard/images/'.$category->image) }}" alt="/">
                        {{ $category->name }}
                    </h4>
                    <div class="timeline-boxes">
                    @foreach($category->resumes as $resume)
                        @if($resume->status == 'enable')
                            <!--    Item 01   -->
                                <div class="timeline-boxe">
                                    <div class="timeline-icon"></div>
                                    <div class="timeline-contents">
                                        <div class="time-line-header">
                                            <h5 class="timeline-title">{{ $resume->title }}</h5>
                                            <p class="timeline-year">{{ $resume->date }}</p>
                                        </div>
                                        <div class="timeline-content">
                                            <p class="mb-0">{{ $resume->description }}</p>
                                        </div>
                                        @if($resume->points != null)
                                            @php
                                                $points = explode(";",$resume->points,)
                                            @endphp
                                            <ul>
                                                @foreach($points as $point)
                                                    <li>{{ $point }}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    </div>
                                </div>
                            @endif

                        @endforeach

                    </div>
                </div>
            @endforeach
        </div>
        <!--    TimeLine End   -->
    </div>
@endif

<!--     Resume End    -->
