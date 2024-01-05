@extends('layouts.mainlayout')
@section('content')
    <main id="main" class="main p-0">
        
     <!--#region card-modal Modal -->

     <div class="modal card-modal" id="card-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-center" role="document">
         <div class="modal-content">
            <div id="loadingSpinner">
                <div  class="spinner-border in-text-secondry" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
             <div class="modal-header px-4">
                 <input id="card-title" readonly class="modal-title me-2 rounded no-border card-modal-title" type="text"  role="button">
                 <button id="close-card-modal" type="button" class="close injaaz-btn-close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>                        
             </div>
             <div class="modal-body custom-scrollbar">
                 <div class="row m-0 p-0"  dir="rtl">    
                     <div class="col-7 p-2">
                         <div class="description-section my-2">
                             <label for="description" class="fw-bold w-100 in-text-secondry my-2">الوصف</label>
                             <div id="description-confirm" class="card-modal-description w-100"  contenteditable="true" data-placeholder="الوصف" role="button"></div>
                             <div id="input-description" class="d-none">
                                 <textarea class="form-control" id="description-text" placeholder="أضف وصف" cols="4" rows="5" name="body"></textarea>
                                 <div class="d-flex gap-2 justify-content-end my-2">
                                     <button class="btn injaaz-btn-secondry" onclick="cancelAddDescription()">إلغاء</button>
                                     <button class="btn injaaz-btn" onclick="saveDescription()">حفظ</button>
                                 </div>
                             </div>

                         </div>
                         <div class="comments-section my-2">
                             <button class="btn injaaz-btn my-2 fw-bold">التعليقات</button>
                             <button  class="btn in-bg-secondry injaaz-btn-secondry my-2 fw-bold">التغييرات</button>
                             <div class="add-comment d-flex p-3 gap-2">
                                 <img class="comment-img" src="{{"https://www.gravatar.com/avatar/" . md5(strtolower(trim(Auth::user()->email))) . "?d=mp"}}" alt="loadding">
                                 <div id="comment-confirm" class="card-modal-comment w-100" contenteditable="true" data-placeholder="تعليق" role="button"></div>
                                 <div id="input-comment" class="d-none">
                                     <textarea class="form-control" id="comment-text" placeholder="أضف تعليق" rows="5"  name="body"></textarea>
                                     <div class="d-flex gap-2 justify-content-end my-2">
                                         <button class="btn injaaz-btn-secondry" onclick="cancelAddComment()">إلغاء</button>
                                         <button class="btn injaaz-btn" onclick="saveComment()">اضافة</button>
                                     </div>
                                 </div>
                             </div>
                             <div id="card-comments" class="comments">

                             </div>
                            
                         </div>
                     </div>
                     <div class="col-5">
                         <table class="card-info">
                             <tr class="card-owner">
                                 <td>
                                     <h5 class="m-0">المالك</h5>
                                 </td>
                                 <td class="py-3 px-3">
                                     <div class="d-flex gap-1">
                                         <img class="comment-img" src="{{"https://www.gravatar.com/avatar/" . md5(strtolower(trim(Auth::user()->email))) . "?d=mp"}}" alt="loadding">
                                         <input id="description" type="text" class="card-modal-title w-100" value="Mohammed khaled" role="button">
                                     </div>
                                 </td>
                             </tr>
                             <tr class="dates">
                                 <td>
                                    <h5 class="m-0">التواريخ</h5> 
                                 </td>
                                 <td class="py-3 px-3">
                                     <div class="d-flex gap-2 align-items-center">
                                         <input id="card-start-date" class="card-modal-title" type="date">
                                         <i class="fa-solid fa-arrow-left"></i>
                                         <input id="card-due-date" class="card-modal-title" type="date">
                                     </div>
                                 </td>
                             </tr>
                             <tr class="progrss-rate">
                                 <td>
                                     <h5 class="m-0">نسبة الأنجاز</h5> 
                                 </td>
                                 <td class="py-3 px-3">
                                     <div class="d-flex gap-2 align-items-center">
                                         <label for="rate"><input id="rate" type="text" class="card-modal-title" value="50" role="button">%</label>
                                         <div class="d-flex gap-2 align-items-center">
                                             <i class="fa-solid fa-circle-half-stroke"></i>
                                             <i class="fa-solid fa-circle-half-stroke"></i>
                                             <i class="fa-solid fa-circle-half-stroke"></i>
                                             <i class="fa-solid fa-circle-half-stroke"></i>
                                         </div>
                                     </div>
                                 </td>
                             </tr>
                             <tr class="card-member">
                                 <td>
                                     <h5 class="m-0">الاعضاء</h5> 
                                 </td>
                                 <td class="d-flex gap-2 py-3 px-3">
                                     <div id="member-photos" class="member-photos position-relative w-50">
                                     </div>
                                     <button class="btn injaaz-btn" onclick="showMemberDetails()">عرض التفاصيل</button>
                                 </td>
                             </tr>
                             <tr class="member-details d-none">
                                 <td>
                                 </td>
                                 <td>
                                     <div id="card_assigneds" class="d-flex flex-column gap-3 card-member-list custom-scrollbar px-3" dir="rtl">
                                        {{-- <div class="d-flex justify-content-center">
                                            <button class="btn injaaz-btn w-50" data-toggle="modal" data-target="#add-card-member"><i class="fa-solid fa-plus ms-2"></i> أضافة عضو </button>
                                        </div>                        --}} 
                                     </div>
                                 </td>
                             </tr>
                         </table>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     </div>

 <!--#endregion Card Modal -->

    <!--#region Add Memeber Modal-->

    <div id="add-card-member" class="modal add-member-modal"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-center" role="document">
            <div class="modal-content">
                <div class="modal-header px-4">
                    <h5 class="m-0 text-center">أضافة عضو</h5>
                    <button id="close-add-member-modal" type="button" class="close injaaz-btn-close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>                        
                </div>
                <div class="modal-body">
                    <div class=" px-5 d-flex justify-content-center h-100 align-items-center gap-3 flex-column add-member-details">
                        <label for="member-email">الأسم</label>
                        <input id="member-email" class="add-member-name w-100 rounded" type="text">
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn injaaz-btn w-50">أضافة</button>
                </div>
            </div>
        </div>
    </div>
    <!--#endregion Add Memeber Modal-->



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
                            {{-- <div class="card bg-white p-2 d-flex flex-row justify-content-between" data-toggle="modal" data-target="#card-modal" data-backdrop="static" data-keyboard="false">  --}}
                            <div class="card bg-white p-2 d-flex flex-row justify-content-between" onclick="showCard({{Auth::user()->id}},{{$card->id}})"> 
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

    // showAddMember
        function showAddMember(){
                $('#close-add-member-modal').on('click', function(){
                    $('#member-email').val("");
                    $('#add-card-member').modal('hide'); 
                });
                $('#member-email').focus();
            $('#add-card-member').modal('show'); 
        }
    // showAddMember

    // Get Card Details

        function showCard(userId,cardId) {      
            $('#close-card-modal').on('click', function(){
                    $('#card-title').val("");
                    $('#description-confirm').html("");
                    $('#card-start-date').val("");
                    $('#card-due-date').val("");
                    $('#card-comments').html("");
                    $('#card_assigneds').html("");
                    $('#member-photos').html("");
                    $('#card-modal').modal('hide'); 
                });
            $('#loadingSpinner').fadeIn(100);
            $('#card-modal').modal('show'); 
            
            
            fetch(`http://127.0.0.1:8000/dashboard/${userId}/card/${cardId}`, {
                method: 'GET',
            })
            .then(response => {  
                if (!response.ok) {
                throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(cardDetails => { 
                setTimeout(() => {
                    $('#loadingSpinner').fadeOut(500);
                    $('#card-title').val("");
                    $('#description-confirm').html("");
                    $('#card-start-date').val("");
                    $('#card-due-date').val("");
                    $('#card-comments').html("");
                    $('#card_assigneds').html("");
                    $('#member-photos').html("");

                    $('#card-title').val(cardDetails.card_title);
                    $('#description-confirm').html(cardDetails.card_description);
                    $('#card-start-date').val(cardDetails.start_date);
                    $('#card-due-date').val(cardDetails.due_date);

                    cardDetails.card_comments.forEach(comment => {
                        const email = comment.user_email.toLowerCase().trim();
                        const md5Hash = CryptoJS.MD5(email).toString();
                        const gravatarUrl = `https://www.gravatar.com/avatar/${md5Hash}?d=mp`;

                        $('#card-comments').append(`
                            <div class="d-flex gap-3 p-3">
                                <img class="comment-img" src="${gravatarUrl}" alt="loadding">
                                <div class="w-100">
                                    <div class="d-flex justify-content-between">
                                        <h6 class="m-0 comment-owner-name">${comment.user_name}</h6>
                                        <h6 class="comment-date m-0" dir="ltr">${comment.comment_date}</h6>
                                    </div>
                                    <div class="card-comment-item w-100 my-1" role="button">${comment.comment_text}</div>
                                </div>
                            </div>                
                        `);
                    });

                    cardDetails.card_assigneds.forEach(card_assigned => {
                        const email = card_assigned.user_email.toLowerCase().trim();
                        const md5Hash = CryptoJS.MD5(email).toString();
                        const gravatarUrl = `https://www.gravatar.com/avatar/${md5Hash}?d=mp`;

                        $('#member-photos').append(`
                                <img class="comment-img" src="${gravatarUrl}" alt="loadding">
                            `);

                        $('#card_assigneds').append(`
                            <div class="d-flex gap-3 align-items-center justify-content-between px-5">
                                <img class="comment-img" src="${gravatarUrl}" alt="loading">
                                <h6 class="m-0">${card_assigned.user_name}</h6>
                                <i class="fa-solid fa-trash delete-member-icon"></i>
                            </div>              
                        `);
                    });

                    $('#card_assigneds').append(`
                        <div class="d-flex justify-content-center">
                            <button class="btn injaaz-btn w-50" onclick="showAddMember()"><i class="fa-solid fa-plus ms-2"></i> أضافة عضو </button>
                        </div> 
                    `)
                }, 400);
            })

            .catch(error => {
                console.error('Error fetching card details:', error);

                // Hide the spinner in case of an error after a 1-second delay
                setTimeout(() => {
                    $('#loadingSpinner').addClass('d-none');

                    // Handle the error, e.g., show an error message
                    alert('Failed to fetch card details. Please try again.');
                }, 1000);
            });

            // $('#loadingSpinner').addClass('d-none');
            // $('#card-modal').data('backdrop', 'static');
            // $('#card-modal').data('keyboard', false); 
            // $('#card-modal').modal('show');    
        }

    // end Get Card Details



    //deal Define Class of ckeditr

        var descriptionText = null;
        var commentText = null;

        ClassicEditor.create(document.querySelector('#description-text'))
            .then(ckEditor => {
                descriptionText = ckEditor;
            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor.create( document.querySelector( '#comment-text' ) )
            .then(ckEditor => {
                    commentText = ckEditor;
                })
            .catch( error => {
                console.error( error );
            } );
    //end 


    // Add Card 
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

    // end


    // Card Operation 

        // Saved Card Description & send Comments

            function saveDescription(){
                if(descriptionText.getData().trim() != ""){
                    $('#description-confirm').html(descriptionText.getData());
                    $('#description-confirm').removeClass('d-none');
                    $('#input-description').addClass('d-none');
                } else {
                    $('#description-confirm').text($('#description-confirm').data('placeholder'));
                    $('#input-description').addClass('d-none');
                    $('#description-confirm').removeClass('d-none');
                }
            }

            function saveComment(){
                if(commentText.getData().trim() !=""){
                    $('#comment-confirm').html(commentText.getData());
                    $('#comment-confirm').removeClass('d-none');
                    $('#input-comment').addClass('d-none');
                }else{
                    $('#comment-confirm').text($('#comment-confirm').data('placeholder'));
                    $('#comment-confirm').removeClass('d-none');
                    $('#input-comment').addClass('d-none');
                }
            }

        // end Saved Card Description & send Comments
        
        // Cancel Saved Card Description & send Comments

            function cancelAddDescription(){
                $('#description-confirm').removeClass('d-none');
                $('#input-description').addClass('d-none');
            }

            function cancelAddComment(){
                $('#comment-confirm').removeClass('d-none');
                $('#input-comment').addClass('d-none');
            }

        //end Cancel Saved Card Description & send Comments

        // show member Details 

            function showMemberDetails() {
            $('.member-details').toggleClass('d-none');
            
            }
        // end show member Details

    // end Card Operation


        $(document).ready(function(){

        // Deal with placeholder of div and ckeditr

            var $descriptionDev = $('#description-confirm');
            var $commentdev = $('#comment-confirm');

            // Set initial placeholder
            if (!$descriptionDev.text().trim() && $descriptionDev.data('placeholder')) {
                $descriptionDev.text($descriptionDev.data('placeholder'));
            }

            if (!$commentdev.text().trim() && $commentdev.data('placeholder')) {
                $commentdev.text($commentdev.data('placeholder'));
            }

            // Remove placeholder on focus
            $descriptionDev.on('focus', function() {
                if ($descriptionDev.text().trim() === $descriptionDev.data('placeholder')) {
                    $descriptionDev.text('');
                }
            });

            $commentdev.on('focus', function() {
                if ($commentdev.text().trim() === $commentdev.data('placeholder')) {
                    $commentdev.text('');
                }
            });

            // Restore placeholder if content is empty on blur
            $descriptionDev.on('blur', function() {
                if (!$descriptionDev.text().trim()) {
                    $descriptionDev.text($descriptionDev.data('placeholder'));
                }
            });

            $commentdev.on('blur', function() {
                if (!$commentdev.text().trim()) {
                    $commentdev.text($commentdev.data('placeholder'));
                }
            });

        // Deal with placeholder of div and ckeditr

            $('#description-confirm').on('click', function(){
                if (descriptionText){
                    descriptionText.setData($('#description-confirm').html());
                } else {
                    console.error('CKEditor instance not initialized');
                }
                $('#description-confirm').addClass('d-none');
                $('#input-description').removeClass('d-none');
            });

            $('#comment-confirm').on('click', function(){
                if(commentText){
                    commentText.setData($('#comment-confirm').html());
                } else{
                    console.error('CKEditor instance not initialized');
                }
                $('#comment-confirm').addClass('d-none');
                $('#input-comment').removeClass('d-none');
            })

            $('#input-description').on('blur', function () {
                $('#description-confirm').removeClass('d-none');
                $('#input-description').addClass('d-none');
            });
  
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


            $('#card-title').on('click', function(){
                $('#card-title').focus();

                $('#card-title').on('blur', function () {
                saveAndSendToServer();
                });

                // Attach keypress event handler to the input element
                $('#card-title').on('keypress', function (event) {
                    // Check if the pressed key is Enter (key code 13)
                    if (event.which === 13) {
                    saveAndSendToServer();
                    return;
                    }
                });

                // Function to save and send the value to the server
                function saveAndSendToServer() {
                    var inputValue = $('#card-title').val();
                    alert('Saving and sending to server:', inputValue);
                }
                });

        });

    </script>
@endsection