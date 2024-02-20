@extends('layouts.auth.secondry')
@section('page_title', 'الشروط والاحكام')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-11">
                <div class="terms-header">
                    <a href="{{ route('guests.index') }}">
                        <div class="terms-img">
                            <img src="{{ asset('assets/img/logo-2.png') }}" alt="loading">
                        </div>
                    </a>
                    <div class="terms-head-title my-5">
                        <h1 class="text-center">الشروط والأحكام</h1>
                    </div>
                </div>
                <div class="terms-body py-5 text-center">
                    <div class="term my-2">
                        <h2>الشروط العامة</h2>
                        <p>
                            بموجب استخدامك لمشروع "إنجاز"، فإنك توافق على الالتزام بالشروط والأحكام الواردة في هذا الوثيقة.
                        </p>
                    </div>
                    <div class="term my-2">
                        <h2>الاستخدام الشخصي</h2>
                        <p>
                            يجب عليك استخدام مشروع "إنجاز" فقط للأغراض الشخصية وغير التجارية. يمنع استخدام الموقع لأي أغراض
                            غير قانونية أو غير أخلاقية.
                        </p>
                    </div>
                    <div class="term my-2">
                        <h2>حقوق الملكية الفكرية</h2>
                        <p>
                            جميع حقوق الملكية الفكرية المتعلقة بمشروع "إنجاز"، بما في ذلك الشعار والعلامات التجارية، هي ملك
                            لشركة إنجاز. يُمنع نسخ أو استخدام هذه المواد دون إذن كتابي.
                        </p>
                    </div>
                    <div class="term my-2">
                        <h2>المحتوى المستخدم</h2>
                        <p>
                            أنت مسؤول عن المحتوى الذي تقوم بنشره على مشروع "إنجاز". يُمنع نشر محتوى يتعارض مع القوانين
                            السارية أو ينتهك حقوق الآخرين.
                        </p>
                    </div>
                    <div class="term my-2">
                        <h2>حساب المستخدم</h2>
                        <p>
                            يجب عليك الحفاظ على سرية معلومات حسابك وعدم مشاركتها مع الآخرين. نحن غير مسؤولين عن أي استخدام
                            غير مصرح به لحسابك.
                        </p>
                    </div>
                    <div class="term my-2">
                        <h2>المسؤولية</h2>
                        <p>
                            نحن غير مسؤولين عن أي خسائر أو أضرار تنشأ عن استخدامك لمشروع "إنجاز". يجب عليك استخدام المشروع
                            على مسؤوليتك الشخصية.
                        </p>
                    </div>
                    <div class="term my-2">
                        <h2>التعديلات على الشروط والأحكام</h2>
                        <p>
                            نحتفظ بالحق في تعديل شروط وأحكام مشروع "إنجاز" في أي وقت. يُفضل مراجعة هذه الشروط بشكل دوري
                            للتأكد من أي تحديثات.
                        </p>
                    </div>
                    <div class="term my-2">
                        <h2>التحكيم</h2>
                        <p>
                            في حالة حدوث أي نزاع بينك وبين مشروع "إنجاز"، يتم التحكيم وفقًا للقوانين السارية في مكان تأسيس
                            المشروع.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
