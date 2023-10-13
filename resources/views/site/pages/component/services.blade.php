<!--   Services start  -->
@if($data['services']->count() > 0)
    <section id="services" class="services-03 bg-grey py-6">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-box-03">
                        <h2 class="title-header">خدماتي</h2>
                        <h4>استعراض الخدمات التي اقدمها للعملاء</h4>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
            @foreach($data['services'] as $service)
                <!-- Item -->
                    <div class="col-md-6 col-lg-4">
                        <div class="services-box">
                            <img src="{{ asset('dashboard/images/'.$service->image) }}" alt="/">
                            <div class="services-content">
                                <h5 class="services-head">{{ $service->name }}</h5>
                                <p class="services-description mb-0">{{ $service->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endif
<!--   Services End  -->
