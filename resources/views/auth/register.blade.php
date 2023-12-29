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

          <form method="POST" action="{{ route('register') }}" class="row g-3 needs-validation" novalidate="">
            @csrf
            <div class="col-12">
              <label for="name" class="form-label">اسمك الكامل</label>
              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

              @error('name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
              <div class="invalid-feedback">قم بادخال اسمك</div>
            </div>

            <div class="col-12">
              <label for="phone" class="form-label">رقم الهاتف</label>
              <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">
              <div class="invalid-feedback">قم بادخال رقم هاتفك</div>
              
              @error('phone')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
            </div>

            <div class="col-12">
              <label for="email" class="form-label">ايميلك</label>
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

              @error('email')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
              @enderror
              <div class="invalid-feedback">قم بادخال الايميل الخاص بك</div>
            </div>

            <div class="col-12">
              <label for="password" class="form-label">كلمة السر</label>
              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
              <div class="invalid-feedback">قم بادخال كلمة السر</div>

              @error('password')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

            <div class="col-12">
              <label for="yourPassword" class="form-label">تأكيد كلمة السر</label>
              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
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
              <p class="small mb-0">املك حساب ؟ <a href="{{ route('login') }}">تسجيل </a></p>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
@endsection