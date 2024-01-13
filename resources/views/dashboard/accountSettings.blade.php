@extends('layouts.mainlayout')
@section('content')
    <main id="main" class="main p-0">
        <div class="row m-0 py-5 justify-content-center in-bg-primary">
            <div class="col-8 rounded bg-white p-5">
                <div class="row justify-content-center">
                    <div class="col-2">
                        <div class="account-picture d-flex flex-column align-items-center justify-content-center">
                            <div class="mb-3">
                                <img src="{{"https://www.gravatar.com/avatar/" . md5(strtolower(trim(Auth::user()->email))) . "?d=mp"}}" alt="Profile" class="rounded-circle">
                            </div>
                            <div class="">
                                <button class="btn fw-bold injaaz-btn" onclick="showChangePhotoModal()">تغيير الصورة</button>
                            </div>
                            <!--#region Add Memeber Modal-->
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
                            <!--#endregion Add Memeber Modal-->
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="mb-3">
                            <label for="user-name" class="form-label fw-bold">الأسم</label>
                            <input id="user-name" type="text"  value="{{$user->name}}"  class="form-control"> 
                        </div>
                        <div class="mb-3">
                            <label for="user-email" class="form-label fw-bold">الأيميل</label>
                            <input id="user-email" type="text"  value="{{$user->email}}"  class="form-control"> 
                        </div>
                        <div class="mb-3">
                            <label for="user-phone" class="form-label fw-bold">رقم الهاتف</label>
                            <input id="user-phone" type="text"  value="{{$user->phone}}"  class="form-control"> 
                        </div>
                        <div class="mb-3">
                            <label for="user-bio" class="form-label fw-bold">الوصف</label>
                            <textarea id="user-bio" class="form-control" rows="7" aria-label="With textarea">{{$user->bio}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="user-password" class="form-label fw-bold">كلمة السر الجديدة</label>
                            <input id="user-password" type="text"  class="form-control"> 
                        </div>
                        <div class="mb-3">
                            <label for="user-confirm-password" class="form-label fw-bold">تأكيد كلمة السر الجديدة</label>
                            <input id="user-confirm-password" type="text"  class="form-control"> 
                        </div>
                        <div class="mb-3 d-flex justify-content-center align-items-center">
                            <button class="btn injaaz-btn fw-bold px-5">حفظ</button>
                        </div>
                    </div>
                </div>             
            </div>
        </div>

        <script>

            function showChangePhotoModal() {
                var closeChangePhotoModal = $('.close-change-photo-modal');
                closeChangePhotoModal.each(function (index, closeBtn) {
                    $(closeBtn).on('click', function () {
                        $('#change-photo-modal').modal('hide');
                    });
                });

            $('#change-photo-modal').modal('show'); 
            }
        </script>
    </main>
@endsection