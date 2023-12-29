@extends('layouts.secondry')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

      <div class="d-flex justify-content-center py-4">
        <a href="index.html" class="logo d-flex align-items-center w-auto">
          <img style="filter: invert();  height: 4rem !important;" src="{{asset('assets/img/logo.png')}}" alt="">
        </a>
      </div><!-- End Logo -->

      <div class="card mb-3">

        <div class="card-body">

          <div class="pt-4 pb-2">
            <h5 class="card-title text-center pb-0 fs-4 in-text-primary">أنشاء حساب</h5>
            <p class="text-center small">قم بأدخال معلوماتك الشخصية لأنشاء حساب</p>
          </div>

          <form class="row g-3 needs-validation" novalidate="">
            <div class="col-12">
              <label for="yourName" class="form-label">اسمك الكامل</label>
              <input type="text" name="name" class="form-control" id="yourName" required="">
              <div class="invalid-feedback">قم بادخال اسمك</div>
            </div>

            <div class="col-12">
              <label for="yourName" class="form-label">رقم الهاتف</label>
              <input type="text" name="name" class="form-control" id="yourName" required="">
              <div class="invalid-feedback">قم بادخال رقم هاتفك</div>
            </div>

            <div class="col-12">
              <label for="yourEmail" class="form-label">ايميلك</label>
              <input type="email" name="email" class="form-control" id="yourEmail" required="">
              <div class="invalid-feedback">قم بادخال الايميل الخاص بك</div>
            </div>

            <div class="col-12">
              <label for="yourPassword" class="form-label">كلمة السر</label>
              <input type="password" name="password" class="form-control" id="yourPassword" required="">
              <div class="invalid-feedback">قم بادخال كلمة السر</div>
            </div>

            <div class="col-12">
              <label for="yourPassword" class="form-label">تأكيد كلمة السر</label>
              <input type="password" name="password" class="form-control" id="yourPassword" required="">
              <div class="invalid-feedback">قم بادخال تأكيد كلمة السر</div>
            </div>

            <div class="col-12">
              <div class="form-check">
                <input class="float-end form-check-input" name="terms" type="checkbox" value="" id="acceptTerms" required="">
                <label class="me-4 form-check-label" for="acceptTerms">اوافق على جميع  <a href="#">الاحكام والشروط</a></label>
                <div class="invalid-feedback">يجيب عليك الموافقة قبل انشاء الحساب</div>
              </div>
            </div>
            <div class="col-12">
              <button class="btn btn-primary w-100 in-bg-primary" type="submit">أنشاء الحساب</button>
            </div>
            <div class="col-12">
              <p class="small mb-0">املك حساب ؟ <a href="{{route('front.login')}}">تسجيل </a></p>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
@endsection