<!--   Blog Start   -->
<section id="blog" class="blog-01 py-6 bg-grey">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-box-03">
                    <h2 class="title-header">البوستات</h2>
                    <h4>عرض البوستات الخاصة بي</h4>
                </div>
            </div>
        </div>
        <div class="row mt-4">
        @foreach($data['posts'] as $post)
            <!-- Item  -->
                <div class="col-md-6 col-lg-4">
                    <div class="blog-item">
                        <div class="image-blog">
                            <img src="{{ asset('dashboard/images/'.$post->main_image) }}" alt="/" height="300px">
                        </div>
                        <div class="blog-box">
                            <h5 class="Blog-title"><a href="{{ route('site.posts.single-post',['title'=>str_replace(' ' ,'_',$post->title),'id'=>\Illuminate\Support\Facades\Crypt::encryptString($post->id)]) }}" class=" font-weight-light">{{ $post->title }}</a></h5>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="javascript:void(0)" style="font-size: 15px">
                                        <i class="base-color font-weight-bold">بواسطة</i>
                                        <span class=" font-italic">{{  $details->name }}</span>
                                    </a>
                                </li>
                            </ul>
                            <div class="blog-link">
                                <a class="" href="{{ route('site.posts.single-post',['title'=>str_replace(' ' ,'_',$post->title),'id'=>\Illuminate\Support\Facades\Crypt::encryptString($post->id)]) }}" target="_blank">
                                    <button class="btn btn-primary">
                                        عرض
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
        @endforeach
        </div>
        <div class="mt-5" style="text-align: center;">
            <a href="{{ route('site.posts') }}" class="pill-button-01">مشاهدة المزيد</a>
        </div>
    </div>
</section>
<!--   Blog End   -->
