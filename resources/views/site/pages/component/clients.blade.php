<!--   Testimonial Start   -->
@if($data['clients']->count() > 0)
    <section id="testimonial" class="testimonial-01 bg-transparent pt-5 pb-6">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-box-03">
                    <h2 class="title-header">العملاء</h2>
                    <h4>استعراض اراء العملاء</h4>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12">
                <div class="owl-carousel">
                    @foreach($data['clients'] as $client)
                        <!-- Item -->
                            <div class="testimonial-item">
                                <div class="testimonial-image">
                                    <img src="{{ asset('dashboard/images/'.$client->image) }}" alt="/">
                                </div>
                                <div class="testimonial-content">
                                    <p class="testimonial-comment">"{{ $client->description }}"</p>
                                    <h6 class="testimonial-name">{{ $client->name }}, <span class="testimonial-job">{{ $client->job }}</span></h6>
                                </div>
                            </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif
<!--    Testimonial End    -->
