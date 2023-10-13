@extends('dashboard.layouts.index')
@section('css')
    <!--  Owl-carousel css-->
    <link href="{{URL::asset('dashboard/assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet" />
    <!-- Maps css -->
    <link href="{{URL::asset('dashboard/assets/plugins/jqvmap/jqvmap.min.css')}}" rel="stylesheet">
@stop
@section('title')
    | الرئيسية
@stop


@section('content')
    <!-- row -->
    <div class="row row-sm">
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-primary-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white">المشاريع</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">{{ \App\Models\Project::count() }}</h4>

                            </div>
                        </div>
                    </div>
                </div>
                <span id="compositeline" class="pt-1">5,9,5,6,4,12,18,14,10,15,12,5,8,5,12,5,12,10,16,12</span>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-danger-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white">المنشورات</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">{{ \App\Models\Post::count() }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <span id="compositeline2" class="pt-1">3,2,4,6,12,14,8,7,14,16,12,7,8,4,3,2,2,5,6,7</span>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-success-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white">العملاء</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">{{ \App\Models\Client::count() }}</h4>

                            </div>
                        </div>
                    </div>
                </div>
                <span id="compositeline3" class="pt-1">5,10,5,20,22,12,15,18,20,15,8,12,22,5,10,12,22,15,16,10</span>
            </div>
        </div>


        <div class="col-xl-3 col-lg-6 col-md-6 col-xm-12">
            <div class="card overflow-hidden sales-card bg-warning-gradient">
                <div class="pl-3 pt-3 pr-3 pb-2 pt-0">
                    <div class="">
                        <h6 class="mb-3 tx-12 text-white">الخدمات</h6>
                    </div>
                    <div class="pb-0 mt-0">
                        <div class="d-flex">
                            <div class="">
                                <h4 class="tx-20 font-weight-bold mb-1 text-white">{{ \App\Models\Service::count() }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <span id="compositeline4" class="pt-1">5,9,5,6,4,12,18,14,10,15,12,5,8,5,12,5,12,10,16,12</span>
            </div>
        </div>
    </div>
    <!-- row closed -->

    <!-- row opened -->
    <div class="row row-sm">
        <div class="col-md-12 col-lg-12 col-xl-7">
            <div class="card">
                <div class="card-header bg-transparent pd-b-0 pd-t-20 bd-b-0">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title mb-0">حالة المشاريع</h4>
                        <i class="mdi mdi-dots-horizontal text-gray"></i>
                    </div>
                    <p class="tx-12 text-muted mb-0">نستعرض حالة المشاريع المكتملة والمنتظرة</p>
                </div>
                <div class="card-body">
                    <div class="total-revenue">
                        <div>
                            <h4>{{ \App\Models\Project::where('status','enable')->count() }}</h4>
                            <label><span class="bg-primary"></span>ناجحة</label>
                        </div>
                        <div>
                            <h4>{{  \App\Models\Project::where('status','disable')->count() }}</h4>
                            <label><span class="bg-danger"></span>منتظرة</label>
                        </div>
                    </div>
                    <div id="bar" class="sales-bar mt-4"></div>
                </div>
            </div>
        </div>
        <div class="col-lg-12 col-xl-5">
            <div class="card card-dashboard-map-one">
                <label class="main-content-label">عملائنا من دول مختلفة</label>
                <div class="">
                    <div class="vmap-wrapper ht-180" id="vmap2"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->

    <!-- row opened -->
    <div class="row row-sm">
        @php
            $clients = \App\Models\Client::limit(5)->get();
        @endphp

        @if($clients->count() > 0)
        <div class="col-xl-4 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header pb-1">
                    <h3 class="card-title mb-2">بعض العملاء</h3>
                    <p class="tx-12 mb-0 text-muted">نستعرض بعض العملاء</p>
                </div>
                <div class="card-body p-0 customers mt-1">
                    <div class="list-group list-lg-group list-group-flush">

                        @foreach($clients as $client)
                            <div class="list-group-item list-group-item-action" href="#">
                                <div class="media mt-0">
                                    <img class="avatar-lg rounded-circle ml-3 my-auto" src="{{URL::asset('dashboard/images/'.$client->image)}}" alt="Image description">
                                    <div class="media-body">
                                        <div class="d-flex align-items-center">
                                            <div class="mt-0">
                                                <h5 class="mb-1 tx-15">{{ $client->name }}</h5>
                                                <p class="mb-0 tx-13 text-muted"><span class="text-success ml-2">{{ $client->job }}</span></p>
                                            </div>
                                            <span class="mr-auto wd-45p fs-16 mt-2">
														<div id="spark1" class="wd-100p"></div>
													</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
        @endif


        @php
            $users = \App\Models\User::limit(5)->get();
        @endphp

        @if($users->count() > 0)
        <div class="col-xl-4 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header pb-1">
                    <h3 class="card-title mb-2">بعض المستخدمين</h3>
                    <p class="tx-12 mb-0 text-muted">نستعرض بعض المستخدمين</p>
                </div>
                <div class="card-body p-0 customers mt-1">
                    <div class="list-group list-lg-group list-group-flush">

                        @foreach($users as $user)
                            <div class="list-group-item list-group-item-action" href="#">
                                <div class="media mt-0">
                                    <img class="avatar-lg rounded-circle ml-3 my-auto" src="{{URL::asset('dashboard/images/'.$user->image)}}" alt="Image description">
                                    <div class="media-body">
                                        <div class="d-flex align-items-center">
                                            <div class="mt-0">
                                                <h5 class="mb-1 tx-15">{{ $user->name }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
        @endif


        @php
            $services = \App\Models\Service::limit(5)->get();
        @endphp

        @if($services->count() > 0)
        <div class="col-xl-4 col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header pb-1">
                    <h3 class="card-title mb-2">بعض الخدمات</h3>
                    <p class="tx-12 mb-0 text-muted">نستعرض بعض الخدمات</p>
                </div>
                <div class="card-body p-0 customers mt-1">
                    <div class="list-group list-lg-group list-group-flush">

                        @foreach($services as $service)
                            <div class="list-group-item list-group-item-action" href="#">
                                <div class="media mt-0">
                                    <img class="avatar-lg rounded-circle ml-3 my-auto" src="{{URL::asset('dashboard/images/'.$service->image)}}" alt="Image description">
                                    <div class="media-body">
                                        <div class="d-flex align-items-center">
                                            <div class="mt-0">
                                                <h5 class="mb-1 tx-15">{{ $service->name }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
        @endif


    </div>
    <!-- row close -->

@stop

@section('js')
    @include('dashboard.pages.users.container.include.script')
@stop
