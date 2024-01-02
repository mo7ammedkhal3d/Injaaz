@extends('layouts.mainlayout')
@section('content')
    <main id="main" class="main p-0">

        <!--#region card-modal Modal -->

        <div class="modal card-modal" id="card-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-center" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">أسم الكارد</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                </div>
                <div class="modal-body custom-scrollbar">
                    <div class="row m-0 p-0">    
                        <div class="col-9">
                            <div class="m-2 p-3">
                                <div class="d-flex gap-3 my-2 py-2 align-items-center">
                                    <i class="fa-solid fa-bell" role="button"></i>
                                    <small style="background-color: red ;color:white" title="أنجز بسرعة" class="fw-bold rounded p-1">تنتهي قريبا <i class="fa-regular fa-clock me-2" role="button"></i></small>
                                    <i title="هذه الكارد تحتوي على وصف" class="fa-solid fa-align-left" role="button" ></i>
                                </div>  
                                <div class="my-2 py-2">
                                    <label for="description" class="text-end w-100 my-2 btn injaaz-btn description-label" onclick="showDescriptionArea(this)"> أضف وصف </label>
                                    <div class="discription-area d-none">
                                        <textarea class="w-100" name="description" id="description" rows="10"></textarea>
                                        <button class="btn injaaz-btn my-2 py-1 px-2 w-100" onclick="hideDescriptionArea(this)">حفظ</button>
                                    </div>
                                </div>   
                                <div class="my-2 py-2">
                                    <textarea readonly class="w-100 rounded my-1" name="comments" id="comments" rows="10"></textarea>
                                    <input name="inComment" id="input-comment" class="w-100 rounded my-1" type="text">
                                    <button class="btn injaaz-btn w-100"> أرسال</button>
                                </div>                      
                            </div> 
                        </div>  
                        <div class="col-3">
                            <ul class="list-unstyled card-member d-flex gap-3 flex-column">
                                <li class="nav-item dropdown mx-2">
                                    <a class="nav-link nav-icon d-flex justify-content-end align-items-center py-1 px-2 gap-2 btn injaaz-btn w-100 pe-3"  href="#" data-bs-toggle="dropdown">
                                        <h5 class="m-0">الأعضاء</h5>
                                        <i class="fa-solid fa-users"></i>
                                    </a>
                          
                                    <ul class="dropdown-menu dropdown-menu-end card-member">
                                      <li class="dropdown-header">
                                        هذه الكارد لديها 3 من الأعضاء
                                      </li>

                                      <li>
                                        <hr class="dropdown-divider">
                                      </li>
                          
                                        <li class="card-member-item d-flex align-items-center justify-content-end px-3 py-2">
                                            <h5 class="mb-0">أسم العضو</h5>
                                            <div >
                                                <i class="fa-regular fa-user"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li class="card-member-item d-flex align-items-center justify-content-end px-3 py-2">
                                            <h5 class="mb-0">أسم العضو</h5>
                                            <div >
                                                <i class="fa-regular fa-user"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li class="card-member-item d-flex align-items-center justify-content-end px-3 py-2">
                                            <h5 class="mb-0">أسم العضو</h5>
                                            <div >
                                                <i class="fa-regular fa-user"></i>
                                            </div>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>

                                        <li class="dropdown-footer">
                                            <a href="#">أضف عضو </a>
                                        </li>
                          
                                    </ul><!-- End card member Dropdown Items -->
                          
                                </li><!-- End Card member Nav -->

                                <li class="nav-item dropdown mx-2 position-static">
                                    <a class="nav-link nav-icon d-flex justify-content-end align-items-center py-1 px-2 gap-2 btn injaaz-btn w-100 pe-3" onclick="showSelectedDate()">
                                        <h5 class="m-0">التاريخ</h5>
                                        <i class="fa-regular fa-calendar-days"></i>
                                    </a>
                                    <div class="modal select-date-modal" data-backdrop="static" id="select-date-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-center" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">قم بتحديد تاريخ للمهمة</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body custom-scrollbar">
                                                <div class="row">
                                                    <div class="col p-2">
                                                        <p>from</p>
                                                        <input type="date" id="start-date" name="startDate" value="{{date('Y-m-d')}}">
                                                    </div>
                                                    <div class="col p-2">
                                                        <p>to</p>
                                                        <input type="date">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button class="btn injaaz-btn">حفظ</button>
                                            </div>
                                        </div>
                                    </div>
                                </li><!-- End Card member Nav -->
                            </ul>
                        </div>                  
                    </div>
                </div>
            </div>
        </div>
        </div>

    <!--#endregion Card Modal -->



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
                            <div class="card bg-white p-2 d-flex flex-row justify-content-between" data-toggle="modal" data-target="#card-modal" data-backdrop="static" data-keyboard="false"> 
                                <div class="">
                                    <h6>{{$card->title}}</h6>
                                    <div class="d-flex gap-3 align-items-center">
                                        <small style="background-color: red ;color:white" title="أنجز بسرعة" class="fw-bold rounded p-1">تنتهي قريبا <i class="fa-regular fa-clock me-2"></i></small>
                                        <i title="هذه الكارد تحتوي على وصف" class="fa-solid fa-align-left"></i>
                                    </div>  
                                </div>                               
                                
                                <div class="edit-confirm d-flex align-items-start">
                                    <i class="fa-solid fa-marker edit-card-title"></i>
                                </div>
                                          
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="list-footer px-3">
                    <input class="title-card d-none w-100 px-2" type="text" name="" id="" placeholder="أدخل عنوان المهمة">
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
            <div class="new-list-body mx-3">
                <input class="w-100 px-2 list-title d-none" type="text" placeholder="عنوان القائمة ">
                <div class="new-list-conetnt my-2 d-flex align-items-center justify-content-between d-none">
                    <button class="btn injaaz-btn add-list">أضافة</button>
                    <i class="fa-solid fa-xmark close-icon btn-cancel-add"></i>
                </div>
                <div class="my-2">
                    <button class="btn injaaz-btn text-end add-list-confirm"><i class="fa-solid fa-plus plus-icon"></i>أضافة قائمة</button>
                </div>
            </div> 
        </div>
    </div>
    </main>
    <script>
        function showCard(button) {      
            const Closebuttons = document.querySelectorAll('.btn-close-modal');
            Closebuttons.forEach(function (btnClose) {
                btnClose.addEventListener('click', function(){
                    $('form')[0].reset();
                    $('#card-modal').modal('hide');
                });
            });
            $('#card-modal').modal('show');     
        }

        function addCardConfirm(button){
            var listBody = $(button).closest('.list-body');
            listBody.find('.mkmk').removeClass('list-body-conetnt');
            listBody.find('.title-card').removeClass('d-none');
            listBody.find('.title-card').focus();
            listBody.find('.add-confirm').removeClass('d-none');
            listBody.find('.add-card-confirm').addClass('d-none');
            listBody.scrollTop(listBody.prop('scrollHeight'));
        }

        function addCard(button){
            var listBody = $(button).closest('.list-body');
                var newCardTitle = listBody.find('.title-card').val();
                if (newCardTitle.trim() !== "") {
                    listBody.find('.mkmk').append(`
                            <div class="card bg-white p-2 d-flex flex-row justify-content-between">
                                <h6>${newCardTitle}</h6>
                                <div class="edit-confirm d-flex align-items-start">
                                    <i class="fa-solid fa-marker edit-card-title"></i>
                                </div>
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
                $('.add-list-confirm').addClass('d-none');
                $('.new-list-conetnt').removeClass('d-none');
                $('.list-title').removeClass('d-none');
                $('.new-list').find('input').focus();
            })

            $('.new-list').on('click','.add-list' , function(){
                $('.new-list').before(`
                    <div class="col-3 rounded board-list p-0">
                        <div class="list-header p-3">
                            <div class="list-title d-flex align-items-center justify-content-between" role="button">
                                <h5>${$('.new-list').find('input').val()}</h5>
                                <i class="fa-solid fa-ellipsis"></i>
                            </div>
                        </div>
                        <div class="list-body custom-scrollbar">
                            <div class="list-body-conetnt mkmk custom-scrollbar px-3">
                            </div>
                            <div class="list-footer px-3">
                                <input class="title-card d-none w-100 px-2" type="text" name="" id="" placeholder="أدخل عنوان المهمة">
                                <button class="btn my-2 w-100 px-3 text-end injaaz-btn add-card-confirm" onclick="addCardConfirm(this)"> أضافة مهمة<i class="fa-solid fa-plus plus-icon"></i></button>
                                <div class="add-confirm p-2 d-flex align-items-center justify-content-between d-none">
                                    <i class="fa-solid fa-xmark close-icon btn-cancel-add" onclick="cancelAdd(this)" ></i>
                                    <button class="btn my-2 px-3 text-end injaaz-btn btn-add" onclick="addCard(this)">أضافة</button>
                                </div>
                            </div>
                        </div>
                    </div>
                `)
                $('.new-list').find('input').val("")
                $('.new-list-header').removeClass('d-none');
                $('.add-list-confirm').removeClass('d-none');
                $('.new-list-conetnt').addClass('d-none');
                $('.new-list').find('input').addClass('d-none');
            })

            $('.new-list').on('click','.btn-cancel-add' , function(){
                $('.new-list').find('input').val("")
                $('.new-list-header').removeClass('d-none');
                $('.add-list-confirm').removeClass('d-none');
                $('.new-list-conetnt').addClass('d-none');
                $('.new-list').find('input').addClass('d-none');
            })

        });

        function showDescriptionArea(button){
            $(button).addClass('d-none');
            $('.discription-area').removeClass('d-none');
        }

        function hideDescriptionArea(button){
            $('.description-label').removeClass('d-none');
            $('.discription-area').addClass('d-none')
        }

        function showSelectedDate(){
            $('#select-date-modal').modal('show'); 
        }
    </script>
@endsection