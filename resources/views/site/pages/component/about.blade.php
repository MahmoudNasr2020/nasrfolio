<!--    Hero Start    -->
<section class="hero-03" id="hero">
    <div class="container">
        <div class="hero-content">
            <div class="row">
                <div class=" col-lg-4">
                    <div class="personal-img">
                        <img src="{{ asset('dashboard/images'.'/'.$details->image) }}" alt="/">
                    </div>
                </div>
                <div class="col-lg-8 personal-item">
                    <h1 class="mb-3">{{ $details->name }}</h1>
                    <p>{{ $details->job }}</p>
                    <div class="row">
                        <div class="col-6 col-lg-5 personal-info">
                            <ul class="list-unstyled">
                                <li>تاريخ الميلاد : <small>{{ $details->birthday }}</small></li>
                                <li>الموقع : <small>
                                        <a href="{{ $details->website }}"> <i class="fa fa-laptop"></i>
                                        </a>
                                    </small>
                                </li>
                                <li>رقم الهاتف : <small>{{ $details->phone }}</small></li>
                                <li>المدينة : <small> {{ $details->city }}</small></li>
                                <li>السيرة الذاتية : <small>
                                        <a href="{{ asset('dashboard/images/'.$details->cv) }}"> <i class="fa fa-download"></i>
                                        </a>
                                    </small>
                                </li>
                            </ul>
                        </div>
                        <div class="col-6 col-lg-5 personal-info">
                            <ul class="list-unstyled">
                                <li>العمر : <small>{{ $details->age }} سنة</small></li>
                                <li>الدرجة : <small>{{ $details->degree }}</small></li>
                                <li>الايميل : <small style="font-size: 75% !important;word-break: break-all;">{{ $details->mail }}</small></li>
                                <li>الفري لانس : <small>{{  $details->freelance  }}</small></li>
                            </ul>
                        </div>
                        <div class="col-lg-12">
                            <div class="social-icon">
                                <ul class="list-inline py-2 mb-0">
                                    <li class="list-inline-item"><a href="{{  $details->facebook  }}" target="_blank">
                                            <img src="{{ asset('site/assets/img/facebook.svg') }}" alt="/"></a>
                                    </li>
                                    <li class="list-inline-item"><a href="{{  $details->twitter  }}" target="_blank">
                                            <img src="{{ asset('site/assets/img/twitter.svg') }}" alt="/"></a>
                                    </li>
                                    <li class="list-inline-item"><a href="{{  $details->github  }}" target="_blank">
                                            <img src="{{ asset('site/assets/img/github.svg') }}" alt="/"></a>
                                    </li>
                                    <li class="list-inline-item"><a href="{{  $details->linkedIn  }}" target="_blank">
                                            <img src="{{ asset('site/assets/img/linkedin.svg') }}" alt="/"></a>
                                    </li>
                                    <li class="list-inline-item"><a href="{{  $details->telegram  }}" target="_blank">
                                            <img src="{{ asset('site/assets/img/telegram.svg') }}" alt="/"></a>
                                    </li>

                                    <li class="list-inline-item"><a href="{{  $details->whatsApp  }}" target="_blank">
                                            <img src="{{ asset('site/assets/img/whatsapp.png') }}" alt="/"></a>
                                    </li>

                                    <li class="list-inline-item">
                                        <a href="{{ asset('dashboard/images/'.$details->cv) }}" target="_blank">
                                            <img src="{{ asset('site/assets/img/cv.png') }}" alt="/" style="width: 25px !important;margin-top: 5px;">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
<!--    Hero End    -->
