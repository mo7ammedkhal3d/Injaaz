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
                 <div class="ms-5 w-100">
                    <p id="card-title" class="m-0 modal-title me-2 rounded no-border card-modal-title" role="button" onclick="makeEditable(this,{{Auth::user()->id}})"></p>
                    <input id="card-id" type="hidden">
                 </div>
                 <button id="close-card-modal" type="button" class="close injaaz-btn-close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>                        
             </div>
             <div class="modal-body custom-scrollbar">
                 <div class="row m-0 p-0"  dir="rtl">    
                     <div class="col-7 p-2">
                         <div class="description-section my-2">
                             <label for="description" class="fw-bold w-100 in-text-secondry my-2">الوصف</label>
                             <div id="description-confirm" class="card-modal-description w-100"  contenteditable="true" data-placeholder="الوصف" role="button" onclick="editCardDescription(this,{{Auth::user()->id}})"></div>
                             <div id="input-description" class="d-none">
                                 <textarea class="form-control" id="description-text" placeholder="أضف وصف" cols="4" rows="5" name="body"></textarea>
                                 <div class="d-flex gap-2 justify-content-end my-2">
                                     <button id="cancel-add-description" class="btn injaaz-btn-secondry">إلغاء</button>
                                     <button id="save-description-btn" class="btn injaaz-btn">حفظ</button>
                                 </div>
                             </div>

                         </div>
                         <div class="comments-section my-2">
                             <button class="btn injaaz-btn my-2 fw-bold">التعليقات</button>
                             <button  class="btn in-bg-secondry injaaz-btn-secondry my-2 fw-bold">التغييرات</button>
                             <div class="add-comment d-flex p-3 gap-2">
                                 <img class="comment-img" src="{{"https://www.gravatar.com/avatar/" . md5(strtolower(trim(Auth::user()->email))) . "?d=mp"}}" alt="loadding">
                                 <div id="comment-confirm" class="card-modal-comment w-100" contenteditable="true" data-placeholder="تعليق" role="button" onclick="AddComment({{Auth::user()->id}},{{$board->id}})"></div>
                                 <div id="input-comment" class="d-none">
                                     <textarea class="form-control" id="comment-text" placeholder="أضف تعليق" rows="5"  name="body"></textarea>
                                     <div class="d-flex gap-2 justify-content-end my-2">
                                         <button id="cancel-comment" class="btn injaaz-btn-secondry">إلغاء</button>
                                         <button id="add-comment" class="btn injaaz-btn">اضافة</button>
                                     </div>
                                 </div>
                             </div>
                             <div id="card-comments" class="comments">

                             </div>
                            
                         </div>
                     </div>
                     <div class="col-5 d-flex align-items-center flex-column">
                         <table class="card-info w-75">
                             <tr class="card-owner">
                                 <td>
                                     <h5 class="m-0">المالك</h5>
                                 </td>
                                 <td class="py-4 td-custom-padding">
                                     <div class="d-flex">
                                         <img class="comment-img" src="{{"https://www.gravatar.com/avatar/" . md5(strtolower(trim(Auth::user()->email))) . "?d=mp"}}" alt="loadding">
                                         <input id="description" type="text" class="card-modal-title text-center w-100" value="Mohammed khaled" role="button">
                                     </div>
                                 </td>
                             </tr>
                             <tr class="dates">
                                 <td>
                                    <h5 class="m-0">التواريخ</h5> 
                                 </td>
                                 <td class="py-4 td-custom-padding">
                                     <div class="d-flex gap-2 justify-content-between align-items-center">
                                         <input id="card-start-date" class="card-modal-title" type="date" onchange="updateCardDates(this,{{Auth::user()->id}},'start_date')">
                                         <i class="fa-solid fa-arrow-left"></i>
                                         <input id="card-due-date" class="card-modal-title" type="date" onchange="updateCardDates(this,{{Auth::user()->id}},'due_date')">
                                     </div>
                                 </td>
                             </tr>
                             <tr class="progrss-rate">
                                 <td>
                                     <h5 class="m-0">نسبة الأنجاز</h5> 
                                 </td>
                                 <td class="py-4 td-custom-padding">
                                     <div class="d-flex gap-2 justify-content-between align-items-center">
                                         <label for="rate"><input id="rate" type="text" class="card-modal-title" value="50" role="button">%</label>
                                         <div class="d-flex gap-4 justify-content-between align-items-center">
                                             <i class="fa-solid fa-circle-half-stroke progrss-icon"></i>
                                             <i class="fa-solid fa-circle-half-stroke progrss-icon"></i>
                                             <i class="fa-solid fa-circle-half-stroke progrss-icon"></i>
                                             <i class="fa-solid fa-circle-half-stroke progrss-icon"></i>
                                         </div>
                                     </div>
                                 </td>
                             </tr>
                             <tr class="card-member">
                                 <td>
                                     <h5 class="m-0">الاعضاء</h5> 
                                 </td>
                                 <td class="d-flex gap-2 justify-content-between py-4 td-custom-padding">
                                     <div id="member-photos" class="member-photos position-relative w-50">
                                     </div>
                                     <button class="btn injaaz-btn" onclick="showMemberDetails()">عرض التفاصيل</button>
                                 </td>
                             </tr>
                             <tr class="member-details d-none">
                                 <td colspan="2">
                                     <div class="d-flex flex-column gap-3 card-member-list custom-scrollbar px-3" dir="rtl">
                                        <div id="card_assigneds" class="d-flex flex-column gap-3">

                                        </div>
                                        <div class="d-flex justify-content-center">
                                            <button class="btn injaaz-btn w-50" onclick="showAddMember()"><i class="fa-solid fa-plus ms-2"></i> أضافة عضو </button>
                                        </div> 
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
                    <div class=" px-5 d-flex justify-content-center w-100 h-100 align-items-center gap-3 flex-column add-member-details">
                        <label for="member-email">الأسم</label>
                        <div id="board-member-dropdown"  class="w-75 board-member-dropdown">
                            <input type="text" id="searchInput" class="no-boeder rounded px-2 w-100" oninput="filterOptions()" onclick="toggleDropdown()" placeholder="ابحث عن اعضاء">
                            <div id="dropdownContent" class="custom-scrollbar rounded">
                              
                            </div>
                          </div>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button id="add-card-assigned" class="btn injaaz-btn w-50">أضافة</button>
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
    <div class="row pt-2 mt-2 gap-5 mx-0 board-body algin-itmes-center overflow-x-auto flex-nowrap custom-scrollbar-x custom-row-padding">
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
                            @foreach ($list->cards->sortBy('created_at') as $card)
                                <div class="card bg-white p-2 d-flex flex-row justify-content-between" onclick="showCard(this,{{Auth::user()->id}},{{$card->id}})"> 
                                    <div id="card-short-info">
                                        <h6 id="hcard-title">{{$card->title}}</h6>
                                        @if (\Carbon\Carbon::parse($card->due_date)->format('Y-m-d')  == date('Y-m-d') || $card->description != null)
                                            <div id="card-notification" class="d-flex gap-3 align-items-center">
                                                @if ($card->due_date  == date('Y-m-d'))
                                                    <small id="date-notify" style="background-color: red ;color:white" title="أنجز بسرعة" class="fw-bold rounded p-1" onclick="markComplete(this)" >تنتهي قريبا <i class="fa-regular fa-clock me-2"></i></small>
                                                @endif                                        
                                                @if ($card->description != null)
                                                    <i id="description-notify" title="هذه الكارد تحتوي على وصف" class="fa-solid fa-align-left"></i>  
                                                @endif
                                            </div>  
                                        @endif
                                        
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
                            <button class="btn my-2 px-3 text-end injaaz-btn btn-add" onclick="addCard(this,{{Auth::user()->id}},{{$list->id}})">أضافة</button>
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
                    <button class="btn injaaz-btn add-list" onclick="addList(this,{{Auth::user()->id}},{{$board->id}})">أضافة</button>
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
    var baseUrl = '{{asset('')}}';
    var selectedCard;


    // Add member to card 
        function toggleDropdown() {
        $('#dropdownContent').toggle();
        }

        function filterOptions() {
        var input = $('#searchInput').val().toLowerCase();
        $('.dropdownOption').each(function() {
            var optionText = $(this).find('#member-name').text().toLowerCase();
            $(this).toggle(optionText.indexOf(input) > -1);
        });
        }

        function selectUser(boardMemberId, element , userId) {
            $('#searchInput').val($(element).find('#member-name').text());
            $('#dropdownContent').hide();
            $('#add-card-assigned').on('click',addCardMember);
            function addCardMember(){
                var cardId = $('#card-id').val();
                const formData = new FormData();
                formData.append('board_member_id',boardMemberId);
                formData.append('card_id', cardId);

                fetch(`${baseUrl}dashboard/${userId}/cardAssigned/add`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    },
                    body: formData,
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data){
                        $('#add-card-assigned').off('click',addCardMember);
                        element.remove();
                        $('#searchInput').val("");
                        const email = data.user_email.toLowerCase().trim();
                        const md5Hash = CryptoJS.MD5(email).toString();
                        const gravatarUrl = `https://www.gravatar.com/avatar/${md5Hash}?d=mp`;

                        $('#member-photos').append(`
                                <img id="member-photo-${data.board_member_id}" class="comment-img" src="${gravatarUrl}" alt="loadding">
                            `);

                        $('#card_assigneds').append(`
                            <div id="card-member" class="d-flex gap-3 align-items-center justify-content-between px-5">
                                <img class="comment-img" src="${gravatarUrl}" alt="loading">
                                <h6 class="m-0">${data.user_name}</h6>
                                <i class="fa-solid fa-trash delete-member-icon" onclick="deleteCardMember(this,${data.board_member_id},{{Auth::user()->id}})" ></i>
                            </div>              
                        `);
                    }
                })
                .catch(error => {
                    console.error('Error fetching card details:', error);
                });
            }
        }
        

    // Add member to card 

    // Delte Card member
        function deleteCardMember(element,boardMemberId,userId){
            var cardId = $('#card-id').val();
            const formData = new FormData();
            formData.append('board_member_id',boardMemberId);
            formData.append('card_id', cardId);
            fetch(`${baseUrl}dashboard/${userId}/cardAssigned/delete`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: formData,
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                if (data){
                    var cardMember = $(element).closest('#card-member');
                    var memberPhoto = $(`#member-photo-${boardMemberId}`);
                    memberPhoto.remove();
                    cardMember.remove();
                }
            })
            .catch(error => {
                console.error('Error fetching card details:', error);
            });
        }

    // Delete card member

    // mark Complete
        function markComplete(element){
            element.html("Complete");
            element.css({
            color: "white",            
            backgroundColor: "green"    
        });
        }
    // mark Complete

    // Update Card title
        function makeEditable(element, userId) {
            var cardId = $('#card-id').val();
            element.setAttribute('contenteditable', 'true');
            element.focus();
            element.addEventListener('blur', handleBlur);
            element.removeEventListener('keydown', handleKeyDown);
            function handleKeyDown(event) {
                if (event.key === 'Enter') {
                    event.preventDefault();
                    element.blur();
                }
            }

            function handleBlur() {
                const formData = new FormData();
                formData.append('new_title', element.textContent);
                formData.append('card_id', cardId);
                formData.append('update_type', 'card_title');

                fetch(`${baseUrl}dashboard/${userId}/card/update`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    },
                    body: formData,
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    if (data) {
                        selectedCard.find('#hcard-title').html(element.textContent);
                        element.removeEventListener('blur', handleBlur);
                        element.removeEventListener('keydown', handleKeyDown);
                        element.removeAttribute('contenteditable');
                    }
                })
                .catch(error => {
                    console.error('Error fetching card details:', error);
                });
            }
        }

    // End Update Card title
        

    // Update Card Description 
        function editCardDescription(userId){
            if (descriptionText){
                        descriptionText.setData($('#description-confirm').html());
            } else {
                console.error('CKEditor instance not initialized');
            }
            $('#description-confirm').addClass('d-none');
            $('#input-description').removeClass('d-none');
            $('#save-description-btn').on('click', updateDescription);
            $('#cancel-add-description').on('click', cancelUpdateDescription);
            function updateDescription(){
                if(descriptionText.getData().trim() != ""){
                    var cardId = $('#card-id').val();
                    const formData = new FormData();
                    formData.append('new_description', descriptionText.getData());
                    formData.append('card_id', cardId);
                    formData.append('update_type', 'card_description');

                    fetch(`${baseUrl}dashboard/${userId}/card/update`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        },
                        body: formData,
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data) {
                            $('#save-description-btn').off('click', updateDescription);
                            $('#cancel-add-description').off('click', cancelUpdateDescription);
                            $('#description-confirm').html(descriptionText.getData());
                            $('#description-confirm').removeClass('d-none');
                            $('#input-description').addClass('d-none');

                            var notificationDev = selectedCard.find('#card-notification');

                            if (notificationDev.length > 0) {
                                var dateNotify = notificationDev.find('#date-notify');
                                if (dateNotify.length === 0) {
                                    notificationDev.append(`
                                        <i id="description-notify" title="هذه الكارد تحتوي على وصف" class="fa-solid fa-align-left"></i>
                                    `);
                                }
                            } else {
                                selectedCard.find('#card-short-info').append(`
                                    <div id="card-notification" class="d-flex gap-3 align-items-center">
                                        <i id="description-notify" title="هذه الكارد تحتوي على وصف" class="fa-solid fa-align-left"></i>
                                    </div>
                                `);
                            }
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching card details:', error);
                    });
                }
            }

            function cancelUpdateDescription(){
                $('#description-confirm').removeClass('d-none');
                $('#input-description').addClass('d-none');
                $('#save-description-btn').off('click', updateDescription);
                $('#cancel-add-description').off('click', cancelUpdateDescription);
            }
        }

    // End Update Card Description 

    // Add Card comment
        function AddComment(userId,boardId){
            $('#comment-confirm').addClass('d-none');
            $('#input-comment').removeClass('d-none');

            $('#add-comment').on('click', addnewComment);
            $('#cancel-comment').on('click', cancelAddComment);
            $(commentText).on('blur', cancelAddComment);
            function addnewComment(){
                if(commentText.getData().trim() !=""){
                    var cardId = $('#card-id').val();
                    const formData = new FormData();
                    formData.append('comment_text', commentText.getData());
                    formData.append('card_id', cardId);
                    formData.append('user_id', userId);
                    formData.append('board_id', boardId);
                    fetch(`${baseUrl}dashboard/${userId}/comment/create`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        },
                        body: formData,
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data){
                            $('#add-comment').off('click', addnewComment);
                            $('#cancel-comment').off('click', cancelAddComment);
                            $('#input-comment .ck').off('blur', cancelAddComment);
                            $('#comment-confirm').removeClass('d-none');
                            $('#input-comment').addClass('d-none');
                            commentText.setData("");
                            const email = data.user_email.toLowerCase().trim();
                            const md5Hash = CryptoJS.MD5(email).toString();
                            const gravatarUrl = `https://www.gravatar.com/avatar/${md5Hash}?d=mp`;

                            var cardComments = $('#card-comments');
                            if(cardComments.children().length){
                                var firstCardComment = cardComments.find('.comment:first');
                                    firstCardComment.before(`
                                        <div class="d-flex gap-3 p-3 comment">
                                            <img class="comment-img" src="${gravatarUrl}" alt="loadding">
                                            <div class="w-100">
                                                <div class="d-flex justify-content-between">
                                                    <h6 class="m-0 comment-owner-name">${data.user_name}</h6>
                                                    <h6 class="comment-date m-0" dir="ltr">${data.comment_date}</h6>
                                                </div>
                                                <div class="card-comment-item w-100 my-1" role="button">${data.comment_text}</div>
                                            </div>
                                        </div>
                                    `);
                            } else {
                                cardComments.append(`
                                    <div class="d-flex gap-3 p-3 comment">
                                        <img class="comment-img" src="${gravatarUrl}" alt="loadding">
                                        <div class="w-100">
                                            <div class="d-flex justify-content-between">
                                                <h6 class="m-0 comment-owner-name">${data.user_name}</h6>
                                                <h6 class="comment-date m-0" dir="ltr">${data.comment_date}</h6>
                                            </div>
                                            <div class="card-comment-item w-100 my-1" role="button">${data.comment_text}</div>
                                        </div>
                                    </div> `);
                            }
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching card details:', error);
                    });
                }
            }
        

            function cancelAddComment(){
                commentText.setData("");
                $('#comment-confirm').removeClass('d-none');
                $('#input-comment').addClass('d-none');
            }
                
        }

    // End Add Card comment

    // Add Card Dates

        function updateCardDates(element,userId,type){
            var cardId = $('#card-id').val();
            const formData = new FormData();
            formData.append('date', $(element).val());
            formData.append('card_id', cardId);
            if(type=="start_date"){
                formData.append('update_type', 'card_start_date');
            } else formData.append('update_type', 'card_due_date');
            

            fetch(`${baseUrl}dashboard/${userId}/card/update`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                },
                body: formData,
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                if (data) {
                    // sweet
                    var currentDate = new Date().toISOString().slice(0, 10);

                    if($(element).val() === currentDate){
                        var notificationDev = selectedCard.find('#card-notification');

                        if (notificationDev.length > 0) {
                            var dateNotify = notificationDev.find('#date-notify');
                            if (dateNotify.length === 0) {
                                notificationDev.append(`
                                    <small id="date-notify" style="background-color: red ;color:white" title="أنجز بسرعة" class="fw-bold rounded p-1" onclick="markComplete(this)" >تنتهي قريبا <i class="fa-regular fa-clock me-2"></i></small>
                                `);
                            }
                        } else {
                            selectedCard.find('#card-short-info').append(`
                                <div id="card-notification" class="d-flex gap-3 align-items-center">
                                    <small id="date-notify" style="background-color: red ;color:white" title="أنجز بسرعة" class="fw-bold rounded p-1" onclick="markComplete(this)" >تنتهي قريبا <i class="fa-regular fa-clock me-2"></i></small>
                                </div>
                            `);
                        }
                    }              
                }
            })
            .catch(error => {
                console.error('Error fetching card details:', error);
            });
        }
    

    // End Add Card Start Dates

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
        function showCard(card,userId,cardId) {  
            selectedCard = $(card);    
                    $('#close-card-modal').on('click', function(){
                    $('#card-title').html("");
                    $('#description-confirm').html();
                    $('#card-start-date').val("");
                    $('#card-due-date').val("");
                    $('#card-comments').html("");
                    $('#card_assigneds').html("");
                    $('#member-photos').html("");
                    $('#dropdownContent').html("");
                    $('#card-modal').modal('hide'); 
                });
            $('#loadingSpinner').fadeIn(100);
            $('#card-modal').modal('show'); 
            
            
            fetch(`${baseUrl}dashboard/${userId}/card/${cardId}`, {
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
                    $('#card-title').html("");
                    $('#description-confirm').html();
                    $('#card-start-date').val("");
                    $('#card-due-date').val("");
                    $('#card-comments').html("");
                    $('#card_assigneds').html("");
                    $('#member-photos').html("");
                    $('#dropdownContent').html("");

                    $('#card-title').html(cardDetails.card_title);
                    if(cardDetails.card_description != null){
                        $('#description-confirm').html(cardDetails.card_description);
                    } else{
                        $('#description-confirm').html("");
                    }
                    $('#card-start-date').val(cardDetails.start_date);
                    $('#card-due-date').val(cardDetails.due_date);
                    $('#card-id').val(cardDetails.card_id);

                    cardDetails.card_comments.forEach(comment => {
                        const email = comment.user_email.toLowerCase().trim();
                        const md5Hash = CryptoJS.MD5(email).toString();
                        const gravatarUrl = `https://www.gravatar.com/avatar/${md5Hash}?d=mp`;

                        $('#card-comments').append(`
                            <div class="d-flex gap-3 p-3 comment">
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
                                <img id="member-photo-${card_assigned.board_member_id}" class="comment-img" src="${gravatarUrl}" alt="loadding">
                            `);

                        $('#card_assigneds').append(`
                            <div id="card-member" class="d-flex gap-3 align-items-center justify-content-between px-5">
                                <img class="comment-img" src="${gravatarUrl}" alt="loading">
                                <h6 class="m-0">${card_assigned.user_name}</h6>
                                <i class="fa-solid fa-trash delete-member-icon" onclick="deleteCardMember(this,${card_assigned.board_member_id},{{Auth::user()->id}})" ></i>
                            </div>               
                        `);
                    });

                    cardDetails.unassigned_board_members.forEach(board_member =>{
                        const email = board_member.email.toLowerCase().trim();
                        const md5Hash = CryptoJS.MD5(email).toString();
                        const gravatarUrl = `https://www.gravatar.com/avatar/${md5Hash}?d=mp`;

                        $('#dropdownContent').append(`
                            <div class="dropdownOption justify-content-center gap-3 px-4" onclick="selectUser(${board_member.board_member_id},this,{{Auth::user()->id}})">
                                <div class="d-flex justify-content-between align-items-center px-4 w-75">
                                    <img src="${gravatarUrl}" alt="John">
                                    <h6 id="member-name">${board_member.name}</h6>
                                </div>
                            </div>                
                        `);
                    });

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
        }

    // end Get Card Details

    //deal Define Class of ckeditr

        var descriptionText = null;
        var commentText = null;

        ClassicEditor.create($('#description-text')[0])
            .then(ckEditor => {
                descriptionText = ckEditor;

            })
            .catch(error => {
                console.error(error);
            });

        ClassicEditor.create( $( '#comment-text' )[0])
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

        function addCard(button,userId,listId){
            var listBody = $(button).closest('.list-body');
                var newCardTitle = listBody.find('.title-card').val();
                if (newCardTitle.trim() !== "") {
                    const formData = new FormData();
                    formData.append('title', newCardTitle);
                    formData.append('board_list_id',listId);
                    fetch(`${baseUrl}dashboard/${userId}/card/create`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        },
                        body: formData,
                    })
                    .then(response => {  
                        if (!response.ok) {
                        throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data) {
                            listBody.find('.mkmk').append(`
                            <div class="card bg-white p-2 d-flex flex-row justify-content-between" onclick="showCard(this ,{{Auth::user()->id}},${data.card.id})"> 
                                <div id="card-short-info">
                                    <h6 id="hcard-title">${data.card.title}</h6>
                                </div>                               
                                
                                <div class="edit-confirm d-flex align-items-start">
                                    <i class="fa-solid fa-marker edit-card-title"></i>
                                </div>
                                          
                            </div>
                            `);
                            listBody.scrollTop(listBody.prop('scrollHeight'));
                            listBody.find('.title-card').val("");
                        }
                    })

                    .catch(error => {
                        console.error('Error fetching card details:', error);
                    });
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

    // Add List & other operation 

        $('.new-list').on('click','.add-list-confirm' , function(){
            $('.add-list-confirm').addClass('d-none');
            $('.new-list-conetnt').removeClass('d-none');
            $('.list-title').removeClass('d-none');
            $('.new-list').find('input').focus();
        })

        function addList(button,userId,boardId){ 
            var newListTitle = $('.new-list').find('input').val()
            if (newListTitle.trim() !== "") {
                const formData = new FormData();
                formData.append('title', newListTitle);
                formData.append('board_id',boardId);
                fetch(`${baseUrl}dashboard/${userId}/list/create`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    },
                    body: formData,
                })
                .then(response => {  
                    if (!response.ok) {
                    throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then( data => { 
                    if (data) {
                        $('.new-list').before(`
                            <div class="col-3 rounded board-list p-0">
                                <div class="list-header p-3">
                                    <div class="list-title d-flex align-items-center justify-content-between" role="button">
                                        <h5>${data.boardList.title}</h5>
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
                                            <button class="btn my-2 px-3 text-end injaaz-btn btn-add" onclick="addCard(this,{{Auth::user()->id}},${data.boardList.id})">أضافة</button>
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
                    }
                })

                .catch(error => {
                    console.error('Error fetching card details:', error);
                });
            }
        }

                

        $('.new-list').on('click','.btn-cancel-add' , function(){
            $('.new-list').find('input').val("")
            $('.new-list-header').removeClass('d-none');
            $('.add-list-confirm').removeClass('d-none');
            $('.new-list-conetnt').addClass('d-none');
            $('.new-list').find('input').addClass('d-none');
        })

    // End Add List & other operation 

    // Card Operation     

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

    });

    </script>
@endsection