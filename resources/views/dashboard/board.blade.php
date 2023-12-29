@extends('layouts.mainlayout')
@section('content')
    <main id="main" class="main p-0">
    <div class="py-3 px-3 board-header">
        <div class="col mb-3">
            <h6 class="fw-bold">أسم اللوحة</h4>
        </div>
    </div>
    <div class="row my-2 gap-5 mx-0 board-body algin-itmes-center justify-content-center">
        <div class="col-3 rounded board-list p-0">
            <div class="list-header p-3">
                <div class="list-title">
                    <h5>المنجز</h5>
                </div>
            </div>
            <div class="list-body custom-scrollbar">
                <div class="list-body-conetnt mkmk custom-scrollbar px-3">
                    <div class="card bg-white p-2">
                        <h6>تحليل</h6>
                    </div>
                    <div class="card bg-white p-2">
                        <h6>تحليل</h6>
                    </div>
                    <div class="card bg-white p-2">
                        <h6>تحليل</h6>
                    </div>
                    <div class="card bg-white p-2">
                        <h6>تحليل</h6>
                    </div>
                    <div class="card bg-white p-2">
                        <h6>تحليل</h6>
                    </div>
                    <div class="card bg-white p-2">
                        <h6>تحليل</h6>
                    </div>
                    <div class="card bg-white p-2">
                        <h6>تحليل</h6>
                    </div>
                    <div class="card bg-white p-2">
                        <h6>تحليل</h6>
                    </div>
                    <div class="card bg-white p-2">
                        <h6>تحليل</h6>
                    </div>
                    <div class="card bg-white p-2">
                        <h6>تحليل</h6>
                    </div>
                    <div class="card bg-white p-2">
                        <h6>تحليل</h6>
                    </div>
                    <div class="card bg-white p-2">
                        <h6>تحليل</h6>
                    </div>
                    <div class="card bg-white p-2">
                        <h6>تحليل</h6>
                    </div>
                    <div class="card bg-white p-2">
                        <h6>تحليل</h6>
                    </div>
                    <div class="card bg-white p-2">
                        <h6>تحليل</h6>
                    </div>
                    <div class="card bg-white p-2">
                        <h6>تحليل</h6>
                    </div>
                    <div class="card bg-white p-2">
                        <h6>تحليل</h6>
                    </div>
                    <div class="card bg-white p-2">
                        <h6>تحليل</h6>
                    </div>
                </div>
                <div class="list-footer">
                    <input class="title-card d-none" type="text" name="" id="" placeholder="أدخل عنوان المهمة">
                    <button class="btn my-2 w-100 px-3 text-end btn-add-task add-card-confirm"> أضافة مهمة<i class="fa-solid fa-plus plus-icon"></i></button>
                    <div class="add-confirm p-2 d-flex align-items-center justify-content-between d-none">
                        <i class="fa-solid fa-xmark close-icon btn-cancel-add" ></i>
                        <button class="btn my-2 px-3 text-end btn-add">أضافة</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3 rounded board-list p-0">
            <div class="list-header p-3">
                <div class="list-title">
                    <h5>جاري العمل</h5>
                </div>
            </div>
            <div class="list-body custom-scrollbar">
                <div class="list-body-conetnt mkmk custom-scrollbar px-3">
                    <div class="card bg-white p-2">
                        <h6>تحليل</h6>
                    </div>
                    <div class="card bg-white p-2">
                        <h6>تحليل</h6>
                    </div>
                    <div class="card bg-white p-2">
                        <h6>تحليل</h6>
                    </div>
                    <div class="card bg-white p-2">
                        <h6>تحليل</h6>
                    </div>
                    <div class="card bg-white p-2">
                        <h6>تحليل</h6>
                    </div>
                    <div class="card bg-white p-2">
                        <h6>تحليل</h6>
                    </div>
                    <div class="card bg-white p-2">
                        <h6>تحليل</h6>
                    </div>
                    <div class="card bg-white p-2">
                        <h6>تحليل</h6>
                    </div>
                    <div class="card bg-white p-2">
                        <h6>تحليل</h6>
                    </div>
                    <div class="card bg-white p-2">
                        <h6>تحليل</h6>
                    </div>
                    <div class="card bg-white p-2">
                        <h6>تحليل</h6>
                    </div>
                    <div class="card bg-white p-2">
                        <h6>تحليل</h6>
                    </div>
                    <div class="card bg-white p-2">
                        <h6>تحليل</h6>
                    </div>
                    <div class="card bg-white p-2">
                        <h6>تحليل</h6>
                    </div>
                    <div class="card bg-white p-2">
                        <h6>تحليل</h6>
                    </div>
                    <div class="card bg-white p-2">
                        <h6>تحليل</h6>
                    </div>
                    <div class="card bg-white p-2">
                        <h6>تحليل</h6>
                    </div>
                    <div class="card bg-white p-2">
                        <h6>تحليل</h6>
                    </div>
                </div>
                <div class="list-footer">
                    <input class="title-card d-none" type="text" name="" id="" placeholder="أدخل عنوان المهمة">
                    <button class="btn my-2 w-100 px-3 text-end btn-add-task add-card-confirm"> أضافة مهمة<i class="fa-solid fa-plus plus-icon"></i></button>
                    <div class="add-confirm p-2 d-flex align-items-center justify-content-between d-none">
                        <i class="fa-solid fa-xmark close-icon btn-cancel-add" ></i>
                        <button class="btn my-2 px-3 text-end btn-add">أضافة</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-3 rounded board-list p-0">
            <div class="list-header p-3">
                <div class="list-title">
                    <h5>المؤجل</h5>
                </div>
            </div>
            <div class="list-body custom-scrollbar">
                <div class="list-body-conetnt mkmk custom-scrollbar px-3">
                    <div class="card bg-white p-2">
                        <h6>تحليل</h6>
                    </div>
                    <div class="card bg-white p-2">
                        <h6>تحليل</h6>
                    </div>
                    <div class="card bg-white p-2">
                        <h6>تحليل</h6>
                    </div>
                    <div class="card bg-white p-2">
                        <h6>تحليل</h6>
                    </div>
                    <div class="card bg-white p-2">
                        <h6>تحليل</h6>
                    </div>
                    <div class="card bg-white p-2">
                        <h6>تحليل</h6>
                    </div>
                    <div class="card bg-white p-2">
                        <h6>تحليل</h6>
                    </div>
                    <div class="card bg-white p-2">
                        <h6>تحليل</h6>
                    </div>
                    <div class="card bg-white p-2">
                        <h6>تحليل</h6>
                    </div>
                    <div class="card bg-white p-2">
                        <h6>تحليل</h6>
                    </div>
                    <div class="card bg-white p-2">
                        <h6>تحليل</h6>
                    </div>
                    <div class="card bg-white p-2">
                        <h6>تحليل</h6>
                    </div>
                    <div class="card bg-white p-2">
                        <h6>تحليل</h6>
                    </div>
                    <div class="card bg-white p-2">
                        <h6>تحليل</h6>
                    </div>
                    <div class="card bg-white p-2">
                        <h6>تحليل</h6>
                    </div>
                    <div class="card bg-white p-2">
                        <h6>تحليل</h6>
                    </div>
                    <div class="card bg-white p-2">
                        <h6>تحليل</h6>
                    </div>
                    <div class="card bg-white p-2">
                        <h6>تحليل</h6>
                    </div>
                </div>
                <div class="list-footer">
                    <input class="title-card d-none" type="text" name="" id="" placeholder="أدخل عنوان المهمة">
                    <button class="btn my-2 w-100 px-3 text-end btn-add-task add-card-confirm"> أضافة مهمة<i class="fa-solid fa-plus plus-icon"></i></button>
                    <div class="add-confirm p-2 d-flex align-items-center justify-content-between d-none">
                        <i class="fa-solid fa-xmark close-icon btn-cancel-add" ></i>
                        <button class="btn my-2 px-3 text-end btn-add">أضافة</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </main>
    <script>

        $(document).ready(function() {
            $('.list-body').on('click', '.add-card-confirm', function() {
                var listBody = $(this).closest('.list-body');
                listBody.find('.mkmk').removeClass('list-body-conetnt');
                listBody.find('.title-card').removeClass('d-none');
                listBody.find('.add-confirm').removeClass('d-none');
                listBody.find('.btn-add-task').addClass('d-none');
                listBody.scrollTop(listBody.prop('scrollHeight'));
            });

            $('.list-body').on('click', '.btn-add', function() {
                var listBody = $(this).closest('.list-body');
                var newCardTitle = listBody.find('.title-card').val();
                if (newCardTitle.trim() !== "") {
                    listBody.find('.mkmk').append(`
                        <div class="card bg-white p-2">
                            <h6>${newCardTitle}</h6>
                        </div>
                    `);
                    listBody.scrollTop(listBody.prop('scrollHeight'));
                    listBody.find('.title-card').val("");
                }
            });

            $('.list-body').on('click', '.btn-cancel-add', function() {
                var listBody = $(this).closest('.list-body');
                listBody.find('.mkmk').addClass('list-body-conetnt');
                listBody.find('.title-card').addClass('d-none');
                listBody.find('.add-confirm').addClass('d-none');
                listBody.find('.btn-add-task').removeClass('d-none');
            });
        });
    </script>
@endsection