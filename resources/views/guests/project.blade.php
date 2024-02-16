@extends('layouts.guestsLayout')
@include('layouts.pageshero')
@section('content')
        <!-- Portfolio Start -->
        <div class="container-xxl py-5">
            <div class="container px-lg-5">
                <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="position-relative d-inline edit-text-primary pe-4">مشاريعنا</h6>
                    <h2 class="mt-2">المشاريع المنشئة حديثا</h2>
                </div>
                <div class="row mt-n2 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="col-12 text-center">
                        <ul class="list-inline mb-5" id="portfolio-flters">
                            <li class="btn px-3 ps-4 active" data-filter="*">الكل</li>
                            <li class="btn px-3 ps-4" data-filter=".first">تصميم</li>
                            <li class="btn px-3 ps-4" data-filter=".second">تطوير</li>
                        </ul>
                    </div>
                </div>
                <div class="row g-4 portfolio-container">
                    <div class="col-lg-4 col-md-6 portfolio-item first wow zoomIn" data-wow-delay="0.1s">
                        <div class="position-relative rounded overflow-hidden">
                            <img class="img-fluid w-100" src="{{asset('assets/img/portfolio-1.jpg')}}" alt="">
                            <div class="portfolio-overlay">
                                <a class="btn btn-light" href="{{asset('assets/img/portfolio-1.jpg')}}" data-lightbox="portfolio"><i class="fa fa-plus fa-2x edit-text-primary"></i></a>
                                <div class="mt-auto">
                                    <small class="text-white"><i class="fa fa-folder ms-2"></i>تصميم ويب</small>
                                    <a class="h5 d-block text-white mt-1 mb-0" href="">إنجاز</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 portfolio-item second wow zoomIn" data-wow-delay="0.3s">
                        <div class="position-relative rounded overflow-hidden">
                            <img class="img-fluid w-100" src="{{asset('assets/img/portfolio-2.jpg')}}" alt="">
                            <div class="portfolio-overlay">
                                <a class="btn btn-light" href="{{asset('assets/img/portfolio-2.jpg')}}" data-lightbox="portfolio"><i class="fa fa-plus fa-2x edit-text-primary"></i></a>
                                <div class="mt-auto">
                                    <small class="text-white"><i class="fa fa-folder ms-2"></i>تطوير تطبيقات</small>
                                    <a class="h5 d-block text-white mt-1 mb-0" href="">محفظتك</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 portfolio-item first wow zoomIn" data-wow-delay="0.6s">
                        <div class="position-relative rounded overflow-hidden">
                            <img class="img-fluid w-100" src="{{asset('assets/img/portfolio-3.jpg')}}" alt="">
                            <div class="portfolio-overlay">
                                <a class="btn btn-light" href="{{asset('assets/img/portfolio-3.jpg')}}" data-lightbox="portfolio"><i class="fa fa-plus fa-2x edit-text-primary"></i></a>
                                <div class="mt-auto">
                                    <small class="text-white"><i class="fa fa-folder ms-2"></i>تصميم ويب</small>
                                    <a class="h5 d-block text-white mt-1 mb-0" href="">فودأستيشن</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 portfolio-item second wow zoomIn" data-wow-delay="0.1s">
                        <div class="position-relative rounded overflow-hidden">
                            <img class="img-fluid w-100" src="{{asset('assets/img/portfolio-4.jpg')}}" alt="">
                            <div class="portfolio-overlay">
                                <a class="btn btn-light" href="{{asset('assets/img/portfolio-4.jpg')}}" data-lightbox="portfolio"><i class="fa fa-plus fa-2x edit-text-primary"></i></a>
                                <div class="mt-auto">
                                    <small class="text-white"><i class="fa fa-folder ms-2"></i>تصميم ويب</small>
                                    <a class="h5 d-block text-white mt-1 mb-0" href="">تواصل</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 portfolio-item first wow zoomIn" data-wow-delay="0.3s">
                        <div class="position-relative rounded overflow-hidden">
                            <img class="img-fluid w-100" src="{{asset('assets/img/portfolio-5.jpg')}}" alt="">
                            <div class="portfolio-overlay">
                                <a class="btn btn-light" href="{{asset('assets/img/portfolio-5.jpg')}}" data-lightbox="portfolio"><i class="fa fa-plus fa-2x edit-text-primary"></i></a>
                                <div class="mt-auto">
                                    <small class="text-white"><i class="fa fa-folder ms-2"></i>تطوير تطبيقات</small>
                                    <a class="h5 d-block text-white mt-1 mb-0" href="">مدونتي</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 portfolio-item second wow zoomIn" data-wow-delay="0.6s">
                        <div class="position-relative rounded overflow-hidden">
                            <img class="img-fluid w-100" src="{{asset('assets/img/portfolio-6.jpg')}}" alt="">
                            <div class="portfolio-overlay">
                                <a class="btn btn-light" href="{{asset('assets/img/portfolio-6.jpg')}}" data-lightbox="portfolio"><i class="fa fa-plus fa-2x edit-text-primary"></i></a>
                                <div class="mt-auto">
                                    <small class="text-white"><i class="fa fa-folder ms-2"></i>تطوير ويب</small>
                                    <a class="h5 d-block text-white mt-1 mb-0" href="">دليلك</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Portfolio End -->
@endsection
