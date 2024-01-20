@extends('layouts.gustlayout')
@include('layouts.homehero')
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


        <!-- Service Start -->
            <div class="container-xxl py-5">
                <div class="container px-lg-5">
                    <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
                        <h6 class="position-relative d-inline text-primary pe-4">خدماتنا</h6>
                        <h2 class="mt-2">ما الحلول التي نقدمها</h2>
                    </div>
                    <div class="row g-4">
                        <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.1s">
                            <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                                <div class="service-icon flex-shrink-0 ">
                                    <i class="fas fa-tasks" style="font-size: 1.5rem"></i>
                                </div>
                                <h5 class="mb-3">تنظيم المهام</h5>
                                <p>يقدم إنجاز واجهة سهلة لتنظيم المهام اليومية بشكل فعّال ومنظم، مما يجعل العمل أكثر إنتاجية.</p>
                                <a class="btn px-3 mt-auto mx-auto" href="">اقرء المزيد</a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.3s">
                            <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                                <div class="service-icon flex-shrink-0">
                                    <i class="fas fa-hands-helping" style="font-size: 1.5rem" ></i>
                                </div>
                                <h5 class="mb-3">تعاون فعّال</h5>
                                <p>يتيح إنجاز مشاركة المهام مع أعضاء الفريق وتحديد المسؤوليات بشكل واضح لتحقيق التعاون الفعّال.</p>
                                <a class="btn px-3 mt-auto mx-auto" href="">اقرء المزيد</a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.6s">
                            <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                                <div class="service-icon flex-shrink-0">
                                    <i class="fas fa-cogs" style="font-size: 1.5rem"></i>
                                </div>
                                <h5 class="mb-3">أدوات متقدمة</h5>
                                <p>تقدم إنجاز أدوات متقدمة لتحليل أداء المشروع وتحديد الأولويات لتحسين إدارة الوقت.</p>
                                <a class="btn px-3 mt-auto mx-auto" href="">اقرء المزيد</a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.1s">
                            <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                                <div class="service-icon flex-shrink-0">
                                    <i class="fas fa-chart-line" style="font-size: 1.5rem"></i>
                                </div>
                                <h5 class="mb-3">تقييم الأداء</h5>
                                <p>يقدم إنجاز تقارير دورية حول أداء المهام والمشروع بشكل عام لتمكينك من اتخاذ القرارات الاستراتيجية بناءً على البيانات.</p>
                                <a class="btn px-3 mt-auto mx-auto" href="">اقرء المزيد</a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.3s">
                            <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                                <div class="service-icon flex-shrink-0">
                                    <i class="fas fa-sitemap" style="font-size: 1.5rem"></i>
                                </div>
                                <h5 class="mb-3">تخصيص مهام الفريق</h5>
                                <p>يمكن لفريق العمل تخصيص مهامه بشكل فعّال باستخدام أدوات التعيين والتحديد المتاحة في إنجاز لتحقيق أقصى قدر من التنظيم.</p>
                                <a class="btn px-3 mt-auto mx-auto" href="">اقرء المزيد</a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 wow zoomIn" data-wow-delay="0.6s">
                            <div class="service-item d-flex flex-column justify-content-center text-center rounded">
                                <div class="service-icon flex-shrink-0">
                                    <i class="fas fa-headset" style="font-size: 1.5rem"></i>
                                </div>
                                <h5 class="mb-3">دعم العملاء</h5>
                                <p>نحن هنا لتقديم دعم كامل لكل عميل، حيث يمكنك الوصول إلينا في أي وقت لحل المشاكل والاستفسارات.</p>
                                <a class="btn px-3 mt-auto mx-auto" href="">اقرء المزيد</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- Service End -->


        <!-- Portfolio Start -->
            {{-- <div class="container-xxl py-5">
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
            </div> --}}
        <!-- Portfolio End -->


        <!-- Testimonial Start -->
            <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
                <h2 class="mt-2">ماذا  قالوا عنا</h2>
            </div>
            <div class="container-xxl edit-bg-primary testimonial py-5 my-5 wow fadeInUp" style="direction: ltr" data-wow-delay="0.1s">
                <div class="container py-5 px-lg-5">
                    <div class="owl-carousel testimonial-carousel">
                        <div class="testimonial-item bg-transparent border rounded text-white p-4">
                            <i class="fa fa-quote-left fa-2x mb-3"></i>
                            <p> أعجبتني خاصية تتبع الأداء، حيث يمكنني رؤية مدى تقدم المشروع بسهولة واتخاذ الإجراءات المناسبة تصميم رائع ووظائف فعّالة، إنجاز أصبح لا غنى عنه في فريقنا. نجحنا في تحقيق تنظيم أفضل وزيادة في إنتاجيتنا</p>
                            <div class="d-flex align-items-center">
                                <img class="img-fluid flex-shrink-0 rounded-circle" src="{{asset('assets/img/testimonial-1.jpg')}}" style="width: 50px; height: 50px;">
                                <div class="ps-3">
                                    <h6 class="text-white mb-1">خالد عبدالله</h6>
                                    <small>مطور رمجيات</small>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-item bg-transparent border rounded text-white p-4">
                            <i class="fa fa-quote-left fa-2x mb-3"></i>
                            <p>إنجاز قلب مفاتيح إدارة المشاريع. بفضل واجهته البسيطة والأدوات المتقدمة، أصبح من السهل جدًا تنظيم المهام ومتابعة التقدم بشكل دوري ساعدني إنجاز في إنجاز مشروعي الأخير في وقت أقل، وبنتائج تفوقت عن توقعاتي</p>
                            <div class="d-flex align-items-center">
                                <img class="img-fluid flex-shrink-0 rounded-circle" src="{{asset('assets/img/testimonial-2.jpg')}}" style="width: 50px; height: 50px;">
                                <div class="ps-3">
                                    <h6 class="text-white mb-1">حمود رقيب</h6>
                                    <small>صانع العاب</small>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-item bg-transparent border rounded text-white p-4">
                            <i class="fa fa-quote-left fa-2x mb-3"></i>
                            <p>إنجاز جعل تسويق عبر وسائل التواصل أمرًا سهلاً وممتعًا. يمكنني إدارة حملاتنا بفعالية وقياس أدائها بشكل دقيق التعاون الفعّال مع فريقي أصبح أمرًا ضروريًا، وإنجاز يقدم لنا الأدوات اللازمة لتحقيق ذلك بنجاح</p>
                            <div class="d-flex align-items-center">
                                <img class="img-fluid flex-shrink-0 rounded-circle" src="{{asset('assets/img/testimonial-3.jpg')}}" style="width: 50px; height: 50px;">
                                <div class="ps-3">
                                    <h6 class="text-white mb-1">عبدالرحمن عبدالله</h6>
                                    <small>مبرمج تطبيقات</small>
                                </div>
                            </div>
                        </div>
                        <div class="testimonial-item bg-transparent border rounded text-white p-4">
                            <i class="fa fa-quote-left fa-2x mb-3"></i>
                            <p>تجربتي مع إنجاز كانت استثنائية. سهولة الاستخدام والأداء المتميز جعلت من تنظيم مشروعي أمرًا ممتعًا استفدت كثيرًا من دعم العملاء الرائع، حيث تمكنوا من حل أي استفسار بفعالية وسرعة</p>
                            <div class="d-flex align-items-center">
                                <img class="img-fluid flex-shrink-0 rounded-circle" src="{{asset('assets/img/testimonial-4.jpg')}}" style="width: 50px; height: 50px;">
                                <div class="ps-3">
                                    <h6 class="text-white mb-1">احمد علي</h6>
                                    <small>مطور ويب</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- Testimonial End -->


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