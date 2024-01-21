@extends('layouts.mainlayout')
@section('content')
    <main id="main" class="main p-0">
        @if(session('success'))
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    swal({
                            text:' تم تحديث بيانات الحساب',
                            content: true,
                            icon: "success",
                            classname: 'swal-IW',
                            timer: 1700,
                            buttons: false,
                        });
                });
            </script>
        @endif
        <div class="row m-0 py-5 justify-content-center in-bg-srface">
            <div class="col-8 rounded bg-white p-5 shadow ">
                <div class="row justify-content-center">
                    <div class="col-2">
                        <div class="account-picture d-flex flex-column align-items-center justify-content-center">
                            <div class="mb-3">
                                <img src="{{"https://www.gravatar.com/avatar/" . md5(strtolower(trim(Auth::user()->email))) . "?d=mp"}}" alt="Profile" class="rounded-circle">
                            </div>
                            <div class="">
                                <button class="btn fw-bold injaaz-btn" onclick="showChangePhotoModal()">تغيير الصورة</button>
                            </div>
                            {{-- change-photo-modal --}}
                                <div id="change-photo-modal" class="modal change-photo-modal"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-center" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header px-4">
                                                <button type="button" class="close injaaz-btn-close close-change-photo-modal" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>                        
                                            </div>
                                            <div class="modal-body">
                                                <h5>الصورة الظاهر تعتمد على حساب الإيميل المسجل على موقع gravatar اذا أردت تغيير الصورة قم بتغييرها من الموقع   <a target="_blank" href="https://www.gravatar.com">gravatar</a></h5>
                                            </div>
                                            <div class="modal-footer d-flex justify-content-center">
                                                <button class="btn btn-danger w-50 close-change-photo-modal">اغلاق</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            {{-- change-photo-modal --}}
                        </div>
                    </div>
                    <div class="col-8">
                    {{-- Start Form --}}
                        <form method="POST" action="{{ route('account.settings.update', ['userId' => $user->id]) }}" class="row g-3 needs-validation" novalidate>
                            @csrf
                            <div class="mb-3">
                                <label for="user-name" class="form-label fw-bold">الأسم</label>
                                <input id="user-name" type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control @error('name') is-invalid @enderror" required>
                                <div class="invalid-feedback">قم بادخال الأسم</div>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="user-email" class="form-label fw-bold">الأيميل</label>
                                <input id="user-email" type="email" name="email" value="{{ old('email', $user->email) }}" class="form-control @error('email') is-invalid @enderror" required>
                                <div class="invalid-feedback">قم بادخال الإيميل</div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="user-phone" class="form-label fw-bold">رقم الهاتف</label>
                                <input id="user-phone" type="text" name="phone"  value="{{ old('phone', $user->phone) }}" class="form-control @error('phone') is-invalid @enderror" required>
                                <div class="invalid-feedback">قم بادخال رقم هاتفك</div>
                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="user-bio" class="form-label fw-bold">الوصف</label>
                                <textarea id="user-bio" name="bio" class="form-control" rows="7">{{ old('bio', $user->bio) }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="user-password" class="form-label fw-bold">كلمة السر الجديدة</label>
                                <input id="user-password" type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="user-confirm-password" class="form-label fw-bold">تأكيد كلمة السر الجديدة</label>
                                <input id="user-confirm-password" type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror">
                                @error('password_confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="mb-3 d-flex justify-content-center align-items-center">
                                <button class="btn injaaz-btn fw-bold px-5" type="submit">حفظ</button>
                            </div>
                        </form>
                    {{-- Start Form --}}
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
