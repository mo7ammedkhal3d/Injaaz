@extends('layouts.secondry')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

      <div class="d-flex justify-content-center py-4">
        <a href="index.html" class=" d-flex align-items-center w-auto">
          <img style="filter: invert();  height: 4rem !important;" src="{{asset('assets/img/logo.png')}}" alt="">
        </a>
      </div><!-- End Logo -->

      <div class="card mb-3">

        <div class="card-body">

          <div class="pt-4 pb-2">
            <h5 class="card-title text-center pb-0 fs-4 in-text-primary">تسجيل الدخول الى الحساب</h5>
            <p class="text-center small">ادخل اسم المسخدم &amp; كلمة السر لتسجيل الدخول</p>
          </div>

          <form class="row g-3 needs-validation" novalidate="">

            <div class="col-12">
              <label for="yourUsername" class="form-label">اسم المستخدم</label>
              <div class="input-group has-validation">
                <span class="edit-border-raduis input-group-text" id="inputGroupPrepend">@</span>
                <input type="text" name="username" class="form-control edit-input-border-raduis" id="yourUsername" required="">
                <div class="invalid-feedback">ادخل اسم المستخدم</div>
              </div>
            </div>

            <div class="col-12">
              <label for="yourPassword" class="form-label">كلمة السر</label>
              <input type="password" name="password" class="form-control" id="yourPassword" required="">
              <div class="invalid-feedback">ادخل كلمة السر</div>
            </div>

            <div class="col-12">
              <div class="form-check">
                <label class="form-check-label me-4" for="rememberMe">تذكرني</label>
                <input class="float-end form-check-input " type="checkbox" name="remember" value="true" id="rememberMe">
              </div>
            </div>
            <div class="col-12">
              <button class="btn btn-primary w-100 in-bg-primary" type="submit">تسجيل</button>
            </div>
            <div class="col-12">
              <p class="small mb-0">ليس لدي حساب <a href="{{route('front.register')}}">أنشاء حساب جديد</a></p>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
@endsection