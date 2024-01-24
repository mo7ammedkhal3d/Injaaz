<script>

    var baseUrl = '{{asset('')}}';
    var descriptionText = null;
    var commentText = null;
    

    $(document).ready(function() {

        // Main-Layout Pervent dropdwon disapper inclick
            $('.dropdown-menu').on('click', function(e) {
                e.stopPropagation();
            });

            $('.dropdown-menu li').on('click', function(e) {
                e.stopPropagation();
                console.log("here here");
            });
        // Main-Layout Pervent dropdwon disapper inclick


        // Dashboard Index remove modal-open class 
            $('#add-board-modal').on('shown.bs.modal', function (e) {
            $('body').removeClass('modal-open');
            $('body').css({'overflow': 'auto', 'padding-right': '0'});
            })
        // Dashboard Index remove modal-open class 

        // Dashboard Board 

            setupDragAndDrop();

            // Deal with placeholder of div and ckeditr

                var descriptionDev = $('#description-confirm');
                var commentdev = $('#comment-confirm');

                if(descriptionDev.length){
                    ClassicEditor.create($('#description-text')[0])
                .then(ckEditor => {
                    descriptionText = ckEditor;

                })
                .catch(error => {
                    console.error(error);
                });
                }

                if(commentdev.length){
                    ClassicEditor.create( $( '#comment-text' )[0])
                    .then(ckEditor => {
                            commentText = ckEditor;
                        })
                    .catch( error => {
                        console.error( error );
                    } );
                }



                // Set initial placeholder
                if (!descriptionDev.text().trim() && descriptionDev.data('placeholder')) {
                    descriptionDev.text(descriptionDev.data('placeholder'));
                }

                if (!commentdev.text().trim() && commentdev.data('placeholder')) {
                    commentdev.text(commentdev.data('placeholder'));
                }

                // Remove placeholder on focus
                descriptionDev.on('focus', function() {
                    if (descriptionDev.text().trim() === descriptionDev.data('placeholder')) {
                        descriptionDev.text('');
                    }
                });

                commentdev.on('focus', function() {
                    if (commentdev.text().trim() === commentdev.data('placeholder')) {
                        commentdev.text('');
                    }
                });

                // Restore placeholder if content is empty on blur
                descriptionDev.on('blur', function() {
                    if (!descriptionDev.text().trim()) {
                        descriptionDev.text(descriptionDev.data('placeholder'));
                    }
                });

                commentdev.on('blur', function() {
                    if (!commentdev.text().trim()) {
                        commentdev.text(commentdev.data('placeholder'));
                    }
                });

            // Deal with placeholder of div and ckeditr
        // Dashboard Board 

    });
    
    
    //#region Main-Layout 
    
        //#region Notification 
    
            //#region Get new user notification
    
                fetch(`${baseUrl}dashboard/{{Auth::user()->id}}/notification/getNew`, {
                    method: 'GET',
                    })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => { 
                    if (data){
                    if(data.unReaded_notifiction > 0){
                        $('#notification-no').html(data.unReaded_notifiction);
                        var notificationTextHeader = `لديك ${data.unReaded_notifiction} اشعارات جديدة`
                    } else var notificationTextHeader = "ليس لديك أي اشعارات جديدة"
                    $('#user-notification').append(`
                        <li class="dropdown-header">
                            ${notificationTextHeader}
                            <a href="{{ route('getAllUserNotification', ['userId' => Auth::user()->id]) }}"><span class="badge rounded-pill in-bg-primary py-2 px-4 me-4">عرض الكل</span></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                    `);
    
                data.notifications.forEach(notification => {
                    if (notification.status == 'inprogress'){
                    $('#user-notification').append(`       
                        <li id="notification-item" class="notification-item p-0 in-transition">
                            <div class="row m-0 px-0 py-2">
                            <div class="row m-0 p-0">
                                <div class="col-12 d-flex justify-content-between">
                                <small class="notify-date">${moment(notification.created_at).fromNow()}</small>
                                <i class="fa-solid fa-xmark notify-delete-icon" onclick="moveNotification(${notification.id},this)"></i>
                                </div>
                            </div>
                            <div class="row m-0 p-0 my-2">
                                <div class="col-12">
                                <h6 class="m-0 fw-bold text-end">${notification.text}</h6>
                                </div>
                            </div>
                            <div class="row m-0 p-0 justify-content-start">
                                <div id="notification-state" class="col-7 d-flex gap-1 justify-content-between">
                                <button class="btn btn-success fw-bold py-0 px-4" onclick="changeNotificationStatus(${notification.id},this,'confirm')">قبول</button>
                                <button class="btn btn-danger fw-bold py-0 px-4" onclick="changeNotificationStatus(${notification.id},this,'reject')">رفض</button>
                                </div>
                            </div>
                            </div>
                            <hr class="dropdown-divider">
                        </li> `); 
                    } else if (notification.status === 'reject'){ 
                        $('#user-notification').append(`
                        <li id="notification-item" class="notification-item p-0 in-transition">
                            <div class="row m-0 px-0 py-2">
                            <div class="row m-0 p-0">
                                <div class="col-12 d-flex justify-content-between">
                                <small class="notify-date">${moment(notification.created_at).fromNow()}</small>
                                <i class="fa-solid fa-xmark notify-delete-icon" onclick="moveNotification(${notification.id},this)"></i>
                                </div>
                            </div>
                            <div class="row m-0 p-0 my-2">
                                <div class="col-12">
                                    <h6 class="m-0 fw-bold text-end in-text-secondry">${notification.text}</h6>
                                </div>
                            </div>
                            <div class="row m-0 p-0 justify-content-start">
                                <div id="notification-state" class="col-7 d-flex gap-1 justify-content-between">
                                    <button disabled class="btn btn-danger fw-bold py-0 px-4">تم الرفض</button>
                                </div>
                            </div>
                            </div>
                            <hr class="dropdown-divider">
                        </li> `);
                    } else { 
                        $('#user-notification').append(`
                        <li id="notification-item" class="notification-item p-0 in-transition">
                            <div class="row m-0 px-0 py-2">
                            <div class="row m-0 p-0">
                                <div class="col-12 d-flex justify-content-between">
                                <small class="notify-date">${moment(notification.created_at).fromNow()}</small>
                                <i class="fa-solid fa-xmark notify-delete-icon" onclick="moveNotification(${notification.id},this)"></i>
                                </div>
                            </div>
                            <div class="row m-0 p-0 my-2">
                                <div class="col-12">
                                <h6 class="m-0 fw-bold text-end in-text-secondry">${notification.text}</h6>
                                </div>
                            </div>
                            <div class="row m-0 p-0 justify-content-start">
                                <div id="notification-state" class="col-7 d-flex gap-1 justify-content-between">
                                <button disabled class="btn btn-success fw-bold py-0 px-4">تمت الموافقة</button>
                                </div>
                            </div>
                            </div>
                            <hr class="dropdown-divider">
                        </li> `);
                        }
                });
                    }
                    $('#user-notification').append(`
                    <li class="dropdown-footer">
                        <a href="{{ route('getAllUserNotification', ['userId' => Auth::user()->id]) }}">عرض جميع الاشعارات</a>
                    </li>
                    `)      
                })
    
                .catch(error => {
                    console.error('Error fetching card details:', error);
                });
    
            //#endregion Get new user notification
    
            //#region Move Notification to stack
                function moveNotification(notificationId,element){
                const formData = new FormData();
                formData.append('notification_id',notificationId);
                fetch(`${baseUrl}dashboard/{{Auth::user()->id}}/notification/moveToStack`, {
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
                    var notificationItem = element.closest('#notification-item');
                    $(notificationItem).css('transform', 'translateX(20rem)');
    
                    setTimeout(() => {
                    notificationItem.remove();
                    }, 200);   
                })
                .catch(error => {
                    console.error('Error fetching card details:', error);
                });
                }
            //#endregion Move Notification to stack
    
            //#region change Notification Status
                function changeNotificationStatus(notificationId,element,updateType){
                const formData = new FormData();
                formData.append('notification_id',notificationId);
                formData.append('update_type',updateType);
                fetch(`${baseUrl}dashboard/{{Auth::user()->id}}/notification/updateNotificationState`, {
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
                var notificationState = $(element).closest('#notification-state');
                if(data.update_type == "reject"){
                    notificationState.html(`
                    <button disabled class="btn btn-danger fw-bold py-0 px-4">تم الرفض</button>
                    `);
                } else{
                    notificationState.html(`
                    <button disabled class="btn btn-success fw-bold py-0 px-4">تمت الموافقة</button>
                    `);
    
                    var boardListsroute = `{{ route('dashboard.lists', ['userId' => Auth::user()->id, 'board_id' => ':boardId']) }}`;
                    boardListsroute = boardListsroute.replace(':boardId', data.board.id);
                    var boardMemebesroute = `{{ route('board.boardMembres', ['userId' => Auth::user()->id, 'board_id' => ':boardId']) }}`;
                    boardMemebesroute = boardMemebesroute.replace(':boardId', data.board.id);
                    var boardSettingsroute = `{{ route('board.generalSettings', ['userId' => Auth::user()->id, 'board_id' => ':boardId']) }}`;
                    boardSettingsroute = boardSettingsroute.replace(':boardId', data.board.id);
                    $('#noting-user-boards').addClass('d-none');
                    $('#user-boards').append(`
                        <div class="col-lg-4 pe-0 ps-3" role=button>
                        <div class="board my-3 d-flex flex-row-reverse">
                            <div class="board-option p-2">
                            <i class="fa-solid fa-ellipsis board-dropleft-icon" data-bs-toggle="dropdown" aria-expanded="false"></i>
                            <ul class="dropdown-menu text-end">
                                <li>
                                <a href="${boardListsroute}" class="dropdown-item">
                                    <i class="fa-solid fa-list-check m-0 ms-1 dropdwon-board-icon"></i>
                                    <span>عرض اللوحة</span>
                                </a>
                                </li>
                                <li>
                                <hr class="dropdown-divider">
                                </li>
                                <li>
                                <a href="${boardMemebesroute}" class="dropdown-item">
                                    <i class="fa-solid fa-users m-0 ms-1 dropdwon-board-icon"></i>
                                    <span>الأعضاء</span>
                                </a>
                                </li>
                                <li>
                                <hr class="dropdown-divider">
                                </li>
                                <li>
                                <a class="dropdown-item">
                                    <i class="fa-solid fa-box-archive m-0 ms-1 dropdwon-board-icon"></i>
                                    <span>أرشفة</span>
                                </a>
                                </li>
                                <li>
                                <hr class="dropdown-divider">
                                </li>
                                <li>
                                <a href="${boardSettingsroute}" class="dropdown-item">
                                    <i class="fa-solid fa-gear m-0 ms-1 dropdwon-board-icon"></i>
                                    <span>الأعدادت</span>
                                </a>
                                </li>
                            </ul>
                            </div>
                            <a class="board-body p-3" href="${boardListsroute}">
                            <div class="d-flex justify-content-between mb-3">
                                <h6 class="board-title">${data.board.name}</h6>
                            </div>
                            <p class="board-description">${data.board.description}</p>
                            </a>
                        </div>  
                        </div>
                    `);
                }
                })
                .catch(error => {
                    console.error('Error fetching card details:', error);
                });
    
                }
    
                function redirectToBoard(boardId,userId) {
                    window.location.href = `${baseUrl}dashboard/${boardId}/lists`
                }
    
            //#endregion change Notification Status
    
            //#region show Notification
    
                function showNotification(element){
                fetch(`${baseUrl}dashboard/{{Auth::user()->id}}/notification/changeReadState`, {
                    method: 'GET',
                })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => { 
                    if (data){
                    var notificationNo = $(element).find('#notification-no');
                    notificationNo.html("");
                    }
                })
    
                .catch(error => {
                    console.error('Error fetching card details:', error);
                });
                }
            //#endregion show Notification
    
            //#region Delete Notification
                function deleteNotification(notificationId,element){
                const formData = new FormData();
                formData.append('notification_id',notificationId);
                fetch(`${baseUrl}dashboard/{{Auth::user()->id}}/notification/deleteNotification`, {
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
                    var notificationItem = element.closest('tr');
                    notificationItem.remove();
                })
                .catch(error => {
                    console.error('Error fetching card details:', error);
                });
                }
            //#endregion Delete Notification
    
        //#endregion
    
    //#endregion

    //#region Dashboard index

        // Add board 

            var inviteUsers = [];

            // board-info-form validation
            jQuery.validator.addMethod("noDigitStart", function(value, element) {
            return this.optional(element) || !/^\d/.test(value);
                }, "لا يجب أن يبدأ برقم");

                jQuery.validator.addMethod("noWhitespaceStart", function(value, element) {
                    return this.optional(element) || !/^\s/.test(value);
                }, "لا يجب أن يبدأ بمسافة");


            // may later invite users
            function mayLater(){
            $('#btn-create-board').prop('disabled', false);
            }
            // may later invite users

            // boardFilterOptions
                function CarateBoardFilterOptions() {
                    var input = $('#invite-member-search').val().toLowerCase();
                    var dropdownVisible = false;

                    $('.dropdownOption').each(function() {
                        var optionText = $(this).find('#user-name').text().toLowerCase();
                        
                        if (optionText.indexOf(input) > -1) {
                            $(this).show();
                            dropdownVisible = true;
                        } else {
                            $(this).hide();
                        }
                    });
                    $('#board-dropdownContent').toggleClass('d-none', !dropdownVisible);
                    $('#board-dropdownContent').toggleClass('d-none', input =="");
                }
            // boardFilterOptions

            // selectUser
                function CarateBoardSelectUser(userId, element){
                    $('#invite-member-search').val($(element).find('#user-name').text());
                    $('#board-dropdownContent').toggleClass('d-none');
                    $('#send-invite-btn').removeClass('d-none');
                    $('#send-invite-btn').on('click',sendInvite);
                    var input = $('#invite-member-search').val().trim().toLowerCase();
                    $('#send-invite-btn').toggleClass('d-none', input ==="");
                    function sendInvite(){
                        $('#send-invite-btn').addClass('d-none');
                        $('#btn-create-board').prop('disabled', false);
                        $('#send-invite-btn').off('click',sendInvite);
                        $('#invite-member-search').val("");
                        inviteUsers.push(userId);
                        element.remove();
                    }
                }
            // selectUser

            // addBoardConfirm
                function addBoardConfirm(userId){
                    $('#add-board-modal').modal('show');

                    $('#board-info-form').validate({
                        rules: {
                            boardName: {
                                required: true,
                                minlength: 5,
                                noDigitStart: true,
                                noWhitespaceStart: true,
                            },
                            boardDescription: {
                                required: true,
                                minlength: 10,
                                noDigitStart: true,
                                noWhitespaceStart: true,
                            }
                        },
                        messages: {
                            boardName: {
                                required: "قم بادخال أسم اللوحة",
                                minlength: "أسم اللوحة يجب أن يكون 5 أحرف على الأقل",
                                noWhitespaceStart: "أسم اللوحة لا يجب أن يبدأ بمسافة"
                            },
                            boardDescription: {
                                required: "فم بادخال وصف للوحة",
                                minlength: "وصف اللوحة يجب أن يكون 10 احرف على الاقل",
                                noWhitespaceStart: "وصف اللوحة لا يجب أن يبدأ بمسافة"
                            }
                        },
                        submitHandler: function (form) {
                            continueCreateBoard();
                            return false; 
                        }
                    });


                    $('#btn-continue').on('click', function () {
                        if ($('#board-info-form').valid()) {
                            continueCreateBoard();
                            return false; 
                        }
                    });

                    $('#close-add-board-modal-1').on('click', function(){
                    $('#board-dropdownContent').html("");
                    $('#board-info-form').trigger('reset');
                    $('#btn-create-board').prop('disabled', true);
                    while (inviteUsers.length > 0) {
                        inviteUsers.pop();
                    }
                    $('#add-board-modal').modal('hide'); 
                    });

                    $('#close-add-board-modal-2').on('click', function(){
                    $('#first-modal-content').removeClass('d-none');
                    $('#second-modal-content').addClass('d-none');
                    $('#board-dropdownContent').html("");
                    $('#board-info-form').trigger('reset');
                    $('#btn-continue').off('click');
                    $('#btn-create-board').off('click');
                    $('#btn-create-board').prop('disabled', true);
                    while (inviteUsers.length > 0) {
                        inviteUsers.pop();
                    }
                    $('#add-board-modal').modal('hide'); 
                    });

                    $('#back-to-previous').on('click', function(){
                    $('#first-modal-content').removeClass('d-none');
                    $('#second-modal-content').addClass('d-none');
                    $('#btn-continue').off('click');
                    $('#btn-create-board').off('click');
                    $('#board-dropdownContent').html("");
                    $('#btn-create-board').prop('disabled', true);
                    while (inviteUsers.length > 0) {
                        inviteUsers.pop();
                    }
                    });
                
                // continueCreateBoard
                    function continueCreateBoard() {
                        $('#btn-create-board').on('click', createboard);
                        $('#first-modal-content').addClass('d-none');
                        $('#btn-continue').off('click', continueCreateBoard);
                        $('#second-modal-content').removeClass('d-none');
                        fetch(`${baseUrl}dashboard/${userId}/users/getAll`, {
                            method: 'GET',
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(data => { 
                            if (data){
                            data.users.forEach(user =>{
                                const email = user.email.toLowerCase().trim();
                                const md5Hash = CryptoJS.MD5(email).toString();
                                const gravatarUrl = `https://www.gravatar.com/avatar/${md5Hash}?d=mp`;

                                $('#board-dropdownContent').append(`
                                <div class="dropdownOption justify-content-center gap-3 px-4" onclick="CarateBoardSelectUser(${user.id},this,{{Auth::user()->id}})">
                                <div class="d-flex justify-content-between align-items-center px-4 w-75">
                                    <img src="${gravatarUrl}" alt="John">
                                    <h6 id="user-name">${user.name}</h6>
                                </div>
                                </div>              
                                `);
                            });
                            }
                        })

                        .catch(error => {
                            console.error('Error fetching card details:', error);
                        });
                    }  
                // continueCreateBoard

                // createboard
                    function createboard(){
                        const formData = new FormData();
                        $('#board-loadingSpinner').removeClass('d-none');
                        formData.append('board_name',$('#board-name-input').val());
                        formData.append('board_description',$('#board-description-input').val());
                        formData.append('user_id',userId);
                        formData.append('invite_users', JSON.stringify(inviteUsers));
                        fetch(`${baseUrl}dashboard/${userId}/board/create`, {
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
                            if (data && data.board && data.board.id) {
                                window.location.href = `${baseUrl}dashboard/{{Auth::user()->id}}/lists/${data.board.id}`;
                            }
                        })
                        .catch(error => {
                            console.error('Error creating board:', error);
                        });
                    }
                    }
                // createboard

            // addBoardConfirm

        // Add board 

    //#region Dashboard index

    //#region Dashboard board
      
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
                element.addEventListener('keydown', handleKeyDown);
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
            function editCardDescription(element,userId){
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
                                    var descriptionNotify = notificationDev.find('#description-notify');
                                    if (descriptionNotify.length === 0) {
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
                            $('#save-description-btn').off('click', updateDescription);
                            $('#cancel-add-description').off('click', cancelUpdateDescription);
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
                            $('#add-comment').off('click', addnewComment);
                            $('#cancel-comment').off('click', cancelAddComment);
                        })
                        .catch(error => {
                            console.error('Error fetching card details:', error);
                        });
                    }
                }
            

                function cancelAddComment(){
                    commentText.setData("");
                    $('#add-comment').off('click', addnewComment);
                    $('#cancel-comment').off('click', cancelAddComment);
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
                                        <small id="date-notify" style="background-color: #EF4040 ;color:white" title="أنجز بسرعة" class="fw-bold rounded p-1" onclick="markComplete(this)" >تنتهي قريبا <i class="fa-regular fa-clock me-2"></i></small>
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

        // Update Card Progress
            function updateCardProgrss(element,userId,type){
                var cardId = $('#card-id').val();
                const formData = new FormData();
                formData.append('progress', $(element).val());
                formData.append('card_id', cardId);
                formData.append('update_type', 'card_progress');
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
                                
                    }
                })
                .catch(error => {
                    console.error('Error fetching card details:', error);
                });
            }
            
        // Update Card Progress

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
                        $('#progress-rate').val("");
                        $('#card-due-date').val("");
                        $('#card-owner').html("");
                        $('#card-comments').html("");
                        $('#card_assigneds').html("");
                        $('#member-photos').html("");
                        $('#dropdownContent').html("");
                        $('#card-modal').modal('hide'); 
                    });
                $('#card-loadingSpinner').fadeIn(100);
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
                        $('#card-loadingSpinner').fadeOut(500);
                        $('#card-title').html("");
                        $('#description-confirm').html();
                        $('#card-owner').html("");
                        $('#card-start-date').val("");
                        $('#progress-rate').val("");
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
                        $('#progress-rate').val(cardDetails.progress_rate);

                        const email = cardDetails.card_owner_email.toLowerCase().trim();
                        const md5Hash = CryptoJS.MD5(email).toString();
                        const gravatarUrl = `https://www.gravatar.com/avatar/${md5Hash}?d=mp`;
                        $('#card-owner').append(`
                            <img class="comment-img" src="${gravatarUrl}" alt="loadding">
                            <p id="owner-name" class="m-0 p-0 px-1 owner-name rounded no-border card-modal-title" role="button" {{--onclick="makeEditable(this,{{Auth::user()->id}})"--}}>${cardDetails.card_owner_name}</p>

                        `);


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
                        formData.append('user_id',userId);
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
                                <div draggable="true" class="card bg-white p-2 d-flex flex-row justify-content-between" onclick="showCard(this ,{{Auth::user()->id}},${data.card.id})" data-card-id="${data.card.id}"> 
                                    <div id="card-short-info" class="d-flex justify-content-center gap-3 flex-column">
                                        <h6 id="hcard-title" class="fw-bold m-0">${data.card.title}</h6>
                                    </div>                               
                                    
                                    <div class="edit-confirm d-flex align-items-start">
                                        <i class="fa-solid fa-marker edit-card-title"></i>
                                    </div>
                                            
                                </div>
                                `);
                                listBody.scrollTop(listBody.prop('scrollHeight'));
                                listBody.find('.title-card').val("");
                                setupDragAndDrop();
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
                                <div class="col-3 rounded board-list p-0" data-list-id="${data.boardList.id}">
                                    <div class="list-header p-3">
                                        <div class="list-title d-flex align-items-center justify-content-between" role="button">
                                            <h5 class="fw-bold">${data.boardList.title}</h5>
                                            <i class="fa-solid fa-ellipsis list-links"></i>
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
                            setupDragAndDrop();
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


        // Drag and drop

            function setupDragAndDrop() {
                const columns = document.querySelectorAll('.list-body-conetnt');
                columns.forEach((item) => {
                    item.addEventListener("dragover", (e) => {
                        e.preventDefault();
                        const dragging = document.querySelector(".dragging");
                        const applyAfter = getNewPosition(item, e.clientY);

                        if (applyAfter) {
                            applyAfter.insertAdjacentElement("afterend", dragging);
                        } else {
                            item.prepend(dragging);
                        }
                    });
                });
            }


            var oldListId;
            var cardId; 
            var newListId;
            var oldPosition;
            var newPosition;

            document.addEventListener("dragstart", (e) => {
                e.target.classList.add("dragging");
                cardId = e.target.dataset.cardId;
                oldListId = e.target.closest('.board-list').dataset.listId;
                oldPosition = Array.from(e.target.parentElement.children).indexOf(e.target)+1;
            });

            document.addEventListener("dragend", (e) => {
                e.target.classList.remove("dragging");
                newListId = e.target.closest('.board-list').dataset.listId;
                newPosition = Array.from(e.target.parentElement.children).indexOf(e.target)+1;

                updateCardPosition(oldListId,cardId, newListId, newPosition,oldPosition);
            });



            function getNewPosition(column, posY) {
                const cards = column.querySelectorAll(".card:not(.dragging)");
                let result;

                for (let refer_card of cards) {
                    const box = refer_card.getBoundingClientRect();
                    const boxCenterY = box.y + box.height / 2;

                    if (posY >= boxCenterY) result = refer_card;
                }
                return result;
            }

            function updateCardPosition(oldListId,cardId, newListId, newPosition,oldPosition) {
                if(oldListId != newListId){
                    const formData = new FormData();
                    formData.append('new_list_id',newListId);
                    formData.append('new_position',newPosition);
                    formData.append('card_id',cardId);
                    fetch(`${baseUrl}dashboard/{{ Auth::user()->id }}/card/updateList`, {
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
                    
                    })
                    .catch(error => {
                        console.error('Error fetching card details:', error);
                    });

                    }else if(oldPosition != newPosition ){
                        const formData = new FormData();
                        formData.append('new_position',newPosition);
                        formData.append('card_id',cardId);
                        fetch(`${baseUrl}dashboard/{{Auth::user()->id}}/card/updatePosition`, {
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
                        })
                        .catch(error => {
                            console.error('Error fetching card details:', error);
                        });
                        }
            }

        // Drag and drop 

    //#endregion Dashboard board

    //#region Dashboard board-settings

        var selectedBoardId ;

        // navigation
            function moveLink(element,section){
                $('.navigation-item').each(function() {
                        $(this).removeClass('active');
                    });

                    $(element).addClass('active');

                    $('.board-sections').addClass('d-none');

                    $(`#${section}`).removeClass('d-none');
            }
        // navigation

        // updateGeneralSettings
            function UpdateGeneralSettings(boardId){
                const formData = new FormData();
                formData.append('board_name',$('#board-name').val());
                formData.append('board_description',$('#board-description').val());
                formData.append('board_id',boardId);
                fetch(`${baseUrl}dashboard/{{Auth::user()->id}}/board/generalSettings/update`, {
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
                    swal({
                        //  title: title,
                            text: data.message,
                            content: true,
                            icon: "success",
                            classname: 'swal-IW',
                            timer: 1700,
                            buttons: false,
                        });

                        $('#board-name').val(data.board.name);
                        $('#board-description').val(data.board.description);
                })

                .catch(error => {
                    console.error('Error fetching card details:', error);
                });
            }
        // updateGeneralSettings

        // delete board member          
            function deleteBoardMember(element,boardId,memberId){
                swal({
                    // title: "Are you sure?",
                    text: "هل تريد بالتأكيد حذف هذا العضو من اللوحة",
                    className: 'swal-IW',
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                    buttons: ["ألغاء", "تأكيد"],
                }).then((result) => {
                    if (result == true) {
                        const formData = new FormData();
                        formData.append('member_id',memberId);
                        formData.append('board_id',boardId);
                        fetch(`${baseUrl}dashboard/{{Auth::user()->id}}/board/boardmember/delete`, {
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
                            swal({
                                //  title: title,
                                    text: data.message,
                                    content: true,
                                    icon: "success",
                                    classname: 'swal-IW',
                                    timer: 1700,
                                    buttons: false,
                                });

                                var boardMember = $(element).closest('#board-member');
                                boardMember.remove();
                        })

                        .catch(error => {
                            console.error('Error fetching card details:', error);
                        });
                    }
                })
            }

        // delete board member

        // boardFilterOptions
            function boardFilterOptions() {
            var input = $('#invite-member-search').val().toLowerCase();
            var dropdownVisible = false;

            $('.dropdownOption').each(function() {
                var optionText = $(this).find('#user-name').text().toLowerCase();
                
                if (optionText.indexOf(input) > -1) {
                    $(this).show();
                    dropdownVisible = true;
                } else {
                    $(this).hide();
                }
            });
            $('#board-dropdownContent').toggleClass('d-none', !dropdownVisible);
            $('#board-dropdownContent').toggleClass('d-none', input =="");
            }
        // boardFilterOptions

        // boardselectUser
            function boardselectUser(userId, element){
                $('#invite-member-search').val($(element).find('#user-name').text());
                $('#board-dropdownContent').toggleClass('d-none');
                $('#send-invite-btn').removeClass('d-none');
                $('#send-invite-btn').on('click',sendInvite);
                var input = $('#invite-member-search').val().trim().toLowerCase();
                $('#send-invite-btn').toggleClass('d-none', input ==="");


                function sendInvite(){
                    const formData = new FormData();
                    formData.append('recipient_userId',userId);
                    formData.append('board_id',selectedBoardId);
                    fetch(`${baseUrl}dashboard/{{Auth::user()->id}}/board/sendInvitation`, {
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
                        swal({
                            //  title: title,
                                text: data.message,
                                content: true,
                                icon: "success",
                                classname: 'swal-IW',
                                timer: 1700,
                                buttons: false,
                            });
                            $('#send-invite-btn').addClass('d-none');
                            $('#send-invite-btn').off('click',sendInvite);
                            $('#invite-member-search').val("");
                            element.remove();
                    })

                    .catch(error => {
                        console.error('Error fetching card details:', error);
                    });
                }
            }
        // boardselectUser


        // invite board membres
            function showInviteToBoardModal(boardId){
                $('#invite-toboard-modal').modal('show');
                selectedBoardId = boardId;
                $('#close-invite-toboard-modal').on('click', function(){
                    $('#invite-toboard-modal').modal('hide'); 
                    $('#board-dropdownContent').html("");
                    $('#send-invite-btn').addClass('d-none');
                    $('#invite-member-search').val("");
                });
                
                fetch(`${baseUrl}dashboard/{{Auth::user()->id}}/users/getUninvite/${boardId}`, {
                method: 'GET',
                })

                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => { 
                    if (data){
                    data.users.forEach(user =>{
                        const email = user.email.toLowerCase().trim();
                        const md5Hash = CryptoJS.MD5(email).toString();
                        const gravatarUrl = `https://www.gravatar.com/avatar/${md5Hash}?d=mp`;

                        $('#board-dropdownContent').append(`
                        <div class="dropdownOption justify-content-center gap-3 px-4" onclick="boardselectUser(${user.id},this,{{Auth::user()->id}})">
                        <div class="d-flex justify-content-between align-items-center px-4 w-75">
                            <img src="${gravatarUrl}" alt="John">
                            <h6 id="user-name">${user.name}</h6>
                        </div>
                        </div>              
                        `);
                    });
                    }
                })

                .catch(error => {
                    console.error('Error fetching card details:', error);
                });

            }  
        // invite board membres


        // delete board          
            function deleteBoard(boardId,userId){
                swal({
                        // title: "Are you sure?",
                        text: "سيتم حذف اللوحة لديك فقط , إذا كان للوحة أعضاء ستظل ظاهرة لديهم",
                        className: 'swal-IW',
                        icon: "warning",
                        buttons: true,
                        dangerMode: true,
                        buttons: ["ألغاء", "تأكيد"],
                    }).then((result) => {
                        if (result == true) {
                            const formData = new FormData();
                            formData.append('member_id',userId);
                            formData.append('board_id',boardId);
                            fetch(`${baseUrl}dashboard/{{Auth::user()->id}}/board/deleteForMe`, {
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
                                swal({
                                        text: data.message,
                                        content: true,
                                        icon: "success",
                                        classname: 'swal-IW',
                                        timer: 1700,
                                        buttons: false,
                                    });

                                    setTimeout(function() {
                                        window.location.href = `${baseUrl}dashboard/{{Auth::user()->id}}`;
                                    }, 500);
                            })

                            .catch(error => {
                                console.error('Error fetching card details:', error);
                            });
                        }
                    })
            }

        // delete board 

    //#endregion board-settings

    //#region Dashboard user-profile
        // navigation
              function changeActiveLink(element,section){
                $('.navigation-item').each(function() {
                    $(this).removeClass('active');
                });

                $(element).addClass('active');

                $('.profile-section').addClass('d-none');

                $(`#${section}`).removeClass('d-none');
            }

        // navigation

        // getUserProfile
            function getUserProfile(element,section){
                fetch(`${baseUrl}dashboard/{{Auth::user()->id}}/getUserProfile/local`, {
                method: 'GET',
            })

            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => { 
                $('#user-name').val(data.user_name);
                if(data.user_bio != ""){
                    $('#user-bio').val(data.user_bio);
                }
                changeActiveLink(element,section);
            })

            .catch(error => {
                console.error('Error fetching card details:', error);
            });

            }
        // getUserProfile


        // saveProfile
            function saveProfile(){
                const formData = new FormData();
                formData.append('user_name',$('#user-name').val());
                formData.append('user_bio',$('#user-bio').val());
                fetch(`${baseUrl}dashboard/{{Auth::user()->id}}/saveProfile`, {
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
                    swal({
                        //  title: title,
                            text: data.message,
                            content: true,
                            icon: "success",
                            classname: 'swal-IW',
                            timer: 1700,
                            buttons: false,
                        });

                        $('#user-name').val(data.user.name);
                        $('#user-bio').val(data.user.bio);
                })

                .catch(error => {
                    console.error('Error fetching card details:', error);
                });
            }

        // saveProfile

        // getUserBoards
           function getUserBoards(element,section){
                fetch(`${baseUrl}dashboard/{{Auth::user()->id}}/getUserBoards/local`, {
                    method: 'GET',
                })

                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => { 
                    if(data){
                        $('#boards-container').html("");
                        $.each(data.boards, function(index, board) {
                        var $boardContainer1 = $('<div class="col-3 user-porofile-board"></div>')
                        var $boardContainer2 = $('<div class="row py-3"></div>');

                        if (board.board_member_no > 1) {
                            $boardContainer2.append(`
                                <div class="col-2">
                                    <div class="have-memer">
                                        <i class="fa-solid fa-users have-member-icon"></i>
                                    </div>
                                </div>
                            `);
                        } else {
                            $boardContainer2.append(`
                                <div class="col-2">
                                    <div class="personal">
                                        <i class="fa-solid fa-user personal-icon"></i>
                                    </div>
                                </div>
                            `);
                        }
                        
                        var route = `{{ route('board.generalSettings', ['userId' => Auth::user()->id, 'board_id' => ':boardId']) }}`;
                        route = route.replace(':boardId', board.id);

                        $boardContainer2.append(`
                            <a href="${route}" class="col-10">
                                <div class="user-board-name">
                                    <h4 class="text-end pb-2 fw-bold">${board.name}</h4>
                                    <h6>${board.board_member_no} أعضاء</h6>
                                    <h6>${board.board_list_no} قوائم</h6>
                                    <h6>${board.board_card_no} مهمات</h6>
                                </div>
                            </a>
                        `);

                        $boardContainer1.append($boardContainer2);
                        $('#boards-container').append($boardContainer1);
                    });
                    changeActiveLink(element,section);
                    }
                })
            

                .catch(error => {
                    console.error('Error fetching card details:', error);
                });
            }
        // getUserBoards

        // getUserCards       
            function getUserCards(element,section){
                fetch(`${baseUrl}dashboard/{{Auth::user()->id}}/getUserCards/local`, {
                    method: 'GET',
                })

                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => { 
                    if(data){
                        $.each(data.cards, function(index, card) {
                            $('#user-cards').find('tbody').append(`
                                <tr>
                                  <td>${card.card_title}</td>
                                  <td>${card.list_title}</td>
                                  <td>${card.board_name}</td>
                                  <td>${card.created_at}</td>
                                </tr>
                            `);
                        });
                        changeActiveLink(element,section);
                    }
                })
            

                .catch(error => {
                    console.error('Error fetching card details:', error);
                });
            }
        // getUserCards
    //#endregion Dashboard user-profile

    //#region Dashboard account-settings
        function showChangePhotoModal() {
                    var closeChangePhotoModal = $('.close-change-photo-modal');
                    closeChangePhotoModal.each(function (index, closeBtn) {
                        $(closeBtn).on('click', function () {
                            $('#change-photo-modal').modal('hide');
                        });
                    });

                    $('#change-photo-modal').modal('show');
                }
    //#endregion Dashboard account-settings

</script>