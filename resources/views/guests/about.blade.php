@extends('layouts.guestsLayout')
@include('layouts.pageshero')
@section('content')
    <!-- About Start -->
        <div class="container-xxl py-5">
            <div class="container px-lg-5">
                <div class="row g-5">
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="section-title position-relative mb-4 pb-2">
                            <h6 class="position-relative edit-text-primary pe-4">عن إنجاز</h6>
                            <h2 class="mt-2 text-end">أفضل حل مع سنين من الخبرة</h2>
                        </div>
                        <p class="mb-4 text-end">
                        مرحبًا بك في مشروع إنجاز، حيث نسعى لجعل حياتك أكثر تنظيمًا وإدارة. إنجاز هو تطبيق ويب مبتكر يهدف إلى تسهيل تنظيم المهام اليومية وتحقيق الأهداف بسهولة وفعالية
                        باستخدام واجهة مستخدم بسيطة وسهلة، يمكنك إدارة مهامك الشخصية أو مشاريع الفريق بكل يسر وسلاسة. يتيح لك إنجاز تحديد الأولويات، ومتابعة تقدم المهام، وتعيين مسؤوليات الفريق بشكل فعّال.
                        نحن نقدم لك أدوات متقدمة تساعدك على فهم أداء المشروع بشكل أفضل، مما يمكنك من اتخاذ قرارات مستنيرة وتحسين إنتاجيتك. انطلق الآن وابدأ رحلتك مع إنجاز لتجربة فريدة من نوعها في إدارة المهام وتحقيق الإنجاز.
                        </p>
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <h6 class="mb-3"><i class="fa fa-check edit-text-primary ms-2"></i>الحائز على جائزة</h6>
                                <h6 class="mb-0"><i class="fa fa-check edit-text-primary ms-2"></i>الطاقم المحترف</h6>
                            </div>
                            <div class="col-sm-6">
                                <h6 class="mb-3"><i class="fa fa-check edit-text-primary ms-2"></i>24/7  دعم</h6>
                                <h6 class="mb-0"><i class="fa fa-check edit-text-primary ms-2"></i>أسعار مناسبة</h6>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mt-4">
                            <a class="btn edit-bg-primary btn-primary rounded-pill px-4 ms-3" href="">اقرء المزيد</a>
                            <a class="btn edit-text-primary btn-outline-primary btn-square ms-3" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn edit-text-primary btn-outline-primary btn-square ms-3" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn edit-text-primary btn-outline-primary btn-square ms-3" href=""><i class="fab fa-instagram"></i></a>
                            <a class="btn edit-text-primary btn-outline-primary btn-square" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <img class="img-fluid wow zoomIn" data-wow-delay="0.5s" src="{{asset('assets/img/about.jpg')}}">
                    </div>
                </div>
            </div>
        </div>
    <!-- About End -->


    <!-- Newsletter Start -->
        <div class="container-xxl newsletter my-5 wow fadeInUp edit-bg-primary" data-wow-delay="0.1s">
            <div class="container px-lg-5">
                <div class="row align-items-center" style="height: 250px;">
                    <div class="col-12 col-md-6">
                        <h3 class="text-white">مستعد للبدء</h3>
                        <small class="text-white">اشترك في نشرتنا الإخبارية لتكون أول من يعلم بآخر التحديثات والميزات الجديدة في مشروع إنجاز</small>
                        <div class="position-relative w-100 mt-3">
                            <input class="form-control border-0 rounded-pill w-100 pe-4 ps-5" type="text" placeholder="ادخل إيميلك" style="height: 48px;">
                            <button type="button" class="btn shadow-none position-absolute top-0 start-0 mt-1 me-2"><i class="fa fa-paper-plane text-primary fs-4"></i></button>
                        </div>
                    </div>
                    <div class="col-md-6 text-center mb-n5 d-none d-md-block">
                        <img class="img-fluid mt-5" style="height: 250px;" src="{{asset('assets/img/newsletter.png')}}">
                    </div>
                </div>
            </div>
        </div>
    <!-- Newsletter End -->

    <!-- Team Start -->
        <div class="container-xxl py-5">
            <div class="container px-lg-5">
                <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="position-relative d-inline text-primary pe-4">الأعضاء</h6>
                    <h2 class="mt-2">قم بالتواصل مع اعضاء فريقنا</h2>
                </div>
                <div class="row g-4">
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item">
                            <div class="d-flex">
                                <div class="flex-shrink-0 d-flex flex-column align-items-center mt-4 pt-5" style="width: 75px;">
                                    <a class="btn btn-square text-primary bg-white my-1" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-square text-primary bg-white my-1" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-square text-primary bg-white my-1" href=""><i class="fab fa-instagram"></i></a>
                                    <a class="btn btn-square text-primary bg-white my-1" href=""><i class="fab fa-linkedin-in"></i></a>
                                </div>
                                <img class="img-fluid rounded w-100" src="{{asset('assets/img/team-1.png')}}" alt="">
                            </div>
                            <div class="px-4 py-3">
                                <h5 class="fw-bold m-0">محمد خالد </h5>
                                <small>مطور</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                        <div class="team-item">
                            <div class="d-flex">
                                <div class="flex-shrink-0 d-flex flex-column align-items-center mt-4 pt-5" style="width: 75px;">
                                    <a class="btn btn-square text-primary bg-white my-1" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-square text-primary bg-white my-1" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-square text-primary bg-white my-1" href=""><i class="fab fa-instagram"></i></a>
                                    <a class="btn btn-square text-primary bg-white my-1" href=""><i class="fab fa-linkedin-in"></i></a>
                                </div>
                                <img class="img-fluid rounded w-100" src="{{asset('assets/img/team-2.png')}}" alt="">
                            </div>
                            <div class="px-4 py-3">
                                <h5 class="fw-bold m-0">إبراهيم عمر</h5>
                                <small>مصمم ويب</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
                        <div class="team-item">
                            <div class="d-flex">
                                <div class="flex-shrink-0 d-flex flex-column align-items-center mt-4 pt-5" style="width: 75px;">
                                    <a class="btn btn-square text-primary bg-white my-1" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-square text-primary bg-white my-1" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-square text-primary bg-white my-1" href=""><i class="fab fa-instagram"></i></a>
                                    <a class="btn btn-square text-primary bg-white my-1" href=""><i class="fab fa-linkedin-in"></i></a>
                                </div>
                                <img class="img-fluid rounded w-100" src="{{asset('assets/img/team-3.png')}}" alt="">
                            </div>
                            <div class="px-4 py-3">
                                <h5 class="fw-bold m-0">محمد مزهر</h5>
                                <small>مبرمج</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- Team End -->
@endsection
