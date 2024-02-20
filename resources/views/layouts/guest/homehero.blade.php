@section('homehero')
    <div class="container-xxl py-5 hero-header mb-5 edit-bg-primary">
        <div class="container my-5 py-5 px-lg-5">
            <div class="row g-5 py-5">
                <div class="col-lg-6 text-center text-lg-start">
                    <h1 class="text-white mb-4 animated zoomIn text-end ">تحكم في مشروعاتك بكفاءة مع إنجاز لإدارة المشاريع الرائدة</h1>
                    <p class="text-white pb-3 animated zoomIn text-end ">اكتشف تجربة إدارة مشاريع فائقة السلاسة مع نظامنا المبتكر. استمتع بتنظيم مهامك، وتعاون بفعالية، وتتبع تقدمك بسهولة
                        ولكن بمزايا وإمكانيات محسّنة ومتقدمة. جاهز لتحقيق أهدافك بكفاءة وبأسلوب يلبي تطلعاتك
                       </p>
                    <a href="{{route('register')}}" class="btn btn-light py-sm-3 px-sm-5 rounded-pill ms-3 animated slideInLeft">سجل الآن</a>
                    <a href="{{route('guests.contact')}}" class="btn btn-outline-light py-sm-3 px-sm-5 rounded-pill animated slideInRight">تواصل معنا</a>
                </div>
                <div class="col-lg-6 text-center text-lg-start">
                    <img class="img-fluid" src="{{asset('assets/img/hero.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>
@endsection
