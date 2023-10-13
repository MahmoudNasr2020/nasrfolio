<!--  Contact Start  -->
<section id="contact" class="contact-01 py-6">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-box-03">
                    <h2 class="title-header">أبقي علي تواصل</h2>
                    <h6>تواصل معنا في اي وقت</h6>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="row">
                    <!--  Item 01 -->
                    <div class="col-lg-12">
                        <div class="info-box">
                            <div class="item-icon">
                                <img src="{{ asset('site/assets/img/message.svg') }}" alt="/">
                            </div>
                            <div class="info-text">
                                <h5 class=" mb-0">راسلنا</h5>
                                <small><a href="mailto:{{ $details->mail }}" >{{ $details->mail }}</a></small>
                            </div>
                        </div>
                    </div>
                    <!--  Item 02 -->
                    <div class="col-lg-12">
                        <div class="info-box">
                            <div class="item-icon">
                                <img src="{{ asset('site/assets/img/phone-call.svg') }}" alt="/">
                            </div>
                            <div class="info-text">
                                <h5 class="mb-0">اتصل بنا</h5>
                                <small>{{ $details->phone }}</small>
                            </div>
                        </div>
                    </div>
                    <!--  Item 03 -->
                    <div class="col-lg-12">
                        <div class="info-box">
                            <div class="item-icon">
                                <img src="{{ asset('site/assets/img/location.svg') }}" alt="/">
                            </div>
                            <div class="info-text">
                                <h5 class="mb-0">المدينة</h5>
                                <small>{{$details->city}}</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="contact-box">
                    <div class="contact-form">
                        <form id="contactForm">
                            <div class="row">
                                <div class="col-lg-6 form-item">
                                    <div class="form-group">
                                        <input name="name" id="name" type="text" class="form-control" placeholder="First name*" required >
                                    </div>
                                </div>
                                <div class="col-lg-6 form-item">
                                    <div class="form-group">
                                        <input name="family" id="family" type="text" class="form-control" placeholder="Last name*" required >
                                    </div>
                                </div>
                                <div class="col-lg-6 form-item">
                                    <div class="form-group">
                                        <input name="email" id="email" type="email" class="form-control" placeholder="Your email*" required >
                                    </div>
                                </div>
                                <div class="col-lg-6 form-item">
                                    <div class="form-group">
                                        <input name="phone" id="phone" type="tel" class="form-control" placeholder="Phone number*" required >
                                    </div>
                                </div>
                                <div class="col-12 form-item">
                                    <div class="form-group">
                                        <textarea name="comments" id="comments" rows="4" class="form-control textarea" placeholder="Your message..."></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12 text-left">
                                    <a href="javascript:void(0)" class="pill-button-01" id="submit-btn" onclick="sendEmail()">Send Message</a>
                                    <div id="message" class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-delay="4000" >
                                        <div class="toast-body d-inline-block"></div>
                                        <button type="button" class="pr-3 close" data-dismiss="toast" aria-label="Close">
                                            <span aria-hidden="true" class="lni lni-close size-xs "></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--   Contact End   -->
