@extends('layouts.guestsLayout')
@section('page_title','عملائنا')
@include('layouts.pageshero')
@section('content')
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
@endsection
