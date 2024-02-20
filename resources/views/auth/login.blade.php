@extends('layouts.auth.secondry')
@section('page_title','تسجيل الدخول')
@section('content')
<div class="row m-0 justify-content-center">
  <div class="col-11 d-flex justify-content-center">
    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
      <div class="container">
        <div class="row justify-content-between">
          <div class="col-lg-5 col-md-6 d-flex flex-column align-items-center justify-content-center">
            <div class="card mb-3">
              <div class="loging-back d-flex justify-content-center py-4">
                <a href="{{route('guests.index')}}" class="d-flex align-items-center w-auto">
                  <img src="{{asset('assets/img/logo-2.png')}}" alt="">
                </a>
              </div>
              <div class="card-body">
                <div class="pt-4 pb-2">
                  <h5 class="card-title text-center pb-0 fs-4 in-text-primary">تسجيل الدخول الى الحساب</h5>
                </div>

                <form method="POST" action="{{ route('login') }}" class="row g-3 needs-validation" novalidate="">
                  @csrf

                  <div class="col-12">
                    <label for="yourUsername" class="form-label">اسم المستخدم</label>
                    <div class="input-group has-validation">
                      <span class="edit-border-raduis input-group-text" id="inputGroupPrepend">@</span>
                      <input id="email" type="email" class="form-control py-1 edit-input-border-raduis @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                      @error('email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                    </div>
                  </div>

                  <div class="col-12">
                    <label for="yourPassword" class="form-label">كلمة السر</label>
                    <input id="password" type="password" class="form-control py-1 @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  </div>

                  <div class="col-12">
                    <div class="form-check">
                      <label class="form-check-label me-4" for="rememberMe">تذكرني</label>
                      <input class="form-check-input float-end" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    </div>
                  </div>
                  <div class="col-12">
                    <div class="px-4">
                      <button class="btn btn-primary w-100 in-bg-primary" type="submit">تسجيل</button>
                    </div>
                    @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('نسيت كلمة السر ؟') }}
                    </a>
                    @endif
                  </div>
                  <div class="col-12">
                    <p class="small mb-0">ليس لدي حساب <a href="{{ route('register') }}">أنشاء حساب جديد</a></p>
                  </div>
                </form>

              </div>
            </div>
          </div>
          <div class="col-lg-6 col-md-4 d-flex loging-img justify-content-end align-items-center">
            <img src="{{asset('assets/img/loging-img-3.png')}}" alt="loadding">
          </div>
        </div>
      </div>
    </section>

  </div>
</div>
@endsection
