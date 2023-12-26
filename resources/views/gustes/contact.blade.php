@extends('layouts.gustlayout')
@include('layouts.pageshero')
@section('content')
            <!-- Contact Start -->
            <div class="container-xxl py-5">
                <div class="container px-lg-5">
                    <div class="row justify-content-center">
                        <div class="col-lg-7">
                            <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">
                                <h6 class="position-relative d-inline edit-text-primary pe-4">تواصل معنا</h6>
                                <h2 class="mt-2">تواصل لأي طلب</h2>
                            </div>
                            <div class="wow fadeInUp" data-wow-delay="0.3s">
                                <form>
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="name" placeholder="الأسم">
                                                <label class="edit-label" for="name">أسمك</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input type="email" class="form-control" id="email" placeholder="الإيميل">
                                                <label class="edit-label" for="email">إيميلك</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating">
                                                <input type="text" class="form-control" id="subject" placeholder="عنوان">
                                                <label class="edit-label" for="subject">العنوان</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Leave a message here" id="message" style="height: 150px"></textarea>
                                                <label class="edit-label" for="message">الرسالة</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <button class="btn ediy- edit-bg-primary w-100 py-3" type="submit">أرسال الرسالة</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Contact End -->
@endsection