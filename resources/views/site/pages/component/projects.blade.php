<!--  Portfolio Start  -->
@if($data['projects']->count() > 0)
    <section id="portfolio" class="portfolio-02 bg-portfolio pt-6">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-box-03">
                        <h2 class="title-header">اعمالي</h2>
                        <h4>اعرض الاعمال التي قمت بها</h4>
                    </div>
                </div>
            </div>
            <div class="portfolio-body">
                <div class="row portfolio-items">
                    <!-- Item 01 -->
                    @foreach($data['projects'] as $project)
                        <div class="col-lg-4 portfolio-item seo">
                            <div class="portfolio-box">
                                <div class="portfolio-img">
                                    <img src="{{ asset('dashboard/images/'.$project->main_image) }}" alt="/" height="350px">
                                </div>
                                <div class="portfolio-overlay">
                                    <div class="portfolio-overlay-content">
                                        <h5 class="portfolio-category">{{ $project->name }}</h5>
                                        <div class="portfolio-icon">
                                            <a href="{{ route('site.projects.single-project',['name'=>str_replace(' ' ,'_',$project->name),'id'=>\Illuminate\Support\Facades\Crypt::encryptString($project->id)]) }}">
                                                <i class="fas fa-link"></i>
                                            </a>
                                            <a href="{{ asset('dashboard/images/'.$project->main_image) }}" class="js-zoom-gallery">
                                                <i class="fas fa-search-plus    "></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="portfolio-linked-more">
                <a href="{{ route('site.projects') }}" class="pill-button-01">مشاهدة المزيد</a>
            </div>
        </div>
    </section>
@endif

<!--   Portfolio End   -->
