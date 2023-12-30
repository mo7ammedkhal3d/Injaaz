@extends('layouts.mainlayout')
@section('content')
    <main id="main" class="main p-0">
    <div class="py-2 px-3 board-header">
        <div class="col d-flex flex-row gap-3 align-items-center">
            <div class="board-name">
                <h3 class="fw-bold">{{$board->name}}</h3>
            </div>
            <div class="board-settings" role="button">
                <i class="fa-solid fa-gear"></i>
            </div>
            <div class="board-members" role="button">
                <i class="fa-solid fa-users"></i>
            </div>
        </div>
    </div>
    <div class="row pb-4 pt-2 mt-2 gap-5 mx-0 board-body algin-itmes-center overflow-x-auto flex-nowrap custom-scrollbar-x">
            @if ($board->lists->count()>0)
            @foreach ($board->lists as $list)
            <div class="col-3 rounded board-list p-0">
                <div class="list-header p-3">
                    <div class="list-title d-flex align-items-center justify-content-between" role="button">
                        <h5>{{$list->title}}</h5>
                        <i class="fa-solid fa-ellipsis"></i>
                    </div>
                </div>
                <div class="list-body custom-scrollbar">
                    <div class="list-body-conetnt mkmk custom-scrollbar px-3">
                    @if ($list->cards && $list->cards->count() > 0)
                        @foreach ($list->cards as $card)
                            <div class="card bg-white p-2">
                                <h6>{{$card->title}}</h6>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="list-footer px-3">
                    <input class="title-card d-none w-100" type="text" name="" id="" placeholder="أدخل عنوان المهمة">
                    <button class="btn my-2 w-100 px-3 text-end injaaz-btn add-card-confirm" onclick="addCardConfirm(this)"> أضافة مهمة<i class="fa-solid fa-plus plus-icon"></i></button>
                    <div class="add-confirm p-2 d-flex align-items-center justify-content-between d-none">
                        <i class="fa-solid fa-xmark close-icon btn-cancel-add" onclick="cancelAdd(this)" ></i>
                        <button class="btn my-2 px-3 text-end injaaz-btn btn-add" onclick="addCard(this)">أضافة</button>
                    </div>
                </div>
                </div>
            </div>
            @endforeach
        @endif
        
        <div class="col-3 rounded new-list p-0">
            <div class="new-list-header p-3">
                <h5>أضافة قائمة جديدة</h5>
            </div>
            <div class="new-list-conetnt p-3 px-3 d-none">
                <input class="w-100" type="text" placeholder="عنوان القائمة ">
                <button class="btn injaaz-btn add-list">أضافة</button>
            </div>
            <div class="px-3 my-2">
                <button class="btn injaaz-btn text-end add-list-confirm"><i class="fa-solid fa-plus plus-icon"></i>أضافة قائمة</button>
            </div>
        </div>
    </div>
    </main>
    <script>

        function addCardConfirm(button){
            var listBody = $(button).closest('.list-body');
            listBody.find('.mkmk').removeClass('list-body-conetnt');
            listBody.find('.title-card').removeClass('d-none');
            listBody.find('.add-confirm').removeClass('d-none');
            listBody.find('.add-card-confirm').addClass('d-none');
            listBody.scrollTop(listBody.prop('scrollHeight'));
        }

        function addCard(button){
            var listBody = $(button).closest('.list-body');
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
        }

        function cancelAdd(button){
            var listBody = $(button).closest('.list-body');
            listBody.find('.mkmk').addClass('list-body-conetnt');
            listBody.find('.title-card').addClass('d-none');
            listBody.find('.add-confirm').addClass('d-none');
            listBody.find('.add-card-confirm').removeClass('d-none');
        }

        $(document).ready(function() {

            $('.new-list').on('click','.add-list-confirm' , function(){
                $('.new-list-header').addClass('d-none');
                $('.add-list-confirm').addClass('d-none');
                $('.new-list-conetnt').removeClass('d-none');
            })

            $('.new-list').on('click','.add-list' , function(){
                $('.new-list').before(`
                    <div class="col-3 rounded board-list p-0">
                        <div class="list-header p-3">
                            <div class="list-title d-flex align-items-center justify-content-between" role="button">
                                <h5>${$('.new-list-conetnt').find('input').val()}</h5>
                                <i class="fa-solid fa-ellipsis"></i>
                            </div>
                        </div>
                        <div class="list-body custom-scrollbar">
                            <div class="list-body-conetnt mkmk custom-scrollbar px-3">
                            </div>
                            <div class="list-footer px-3">
                                <input class="title-card d-none w-100" type="text" name="" id="" placeholder="أدخل عنوان المهمة">
                                <button class="btn my-2 w-100 px-3 text-end injaaz-btn add-card-confirm" onclick="addCardConfirm(this)"> أضافة مهمة<i class="fa-solid fa-plus plus-icon"></i></button>
                                <div class="add-confirm p-2 d-flex align-items-center justify-content-between d-none">
                                    <i class="fa-solid fa-xmark close-icon btn-cancel-add" onclick="cancelAdd(this)" ></i>
                                    <button class="btn my-2 px-3 text-end injaaz-btn btn-add" onclick="addCard(this)">أضافة</button>
                                </div>
                            </div>
                        </div>
                    </div>
                `)
                $('.new-list-conetnt').find('input').val("")
                $('.new-list-header').removeClass('d-none');
                $('.add-list-confirm').removeClass('d-none');
                $('.new-list-conetnt').addClass('d-none');
            })

        });
    </script>
@endsection