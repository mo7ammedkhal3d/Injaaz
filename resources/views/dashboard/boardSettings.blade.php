@extends('layouts.mainlayout')
@section('content')
    <main id="main" class="main p-0">

            <!--#region invite Board Memeber Modal-->
            <div id="invite-toboard-modal" class="modal invite-toboard-modal"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-center" role="document">
                    <div class="modal-content">
                        <div class="modal-header px-4">
                            <h5 class="m-0 text-center">دعوة أعضاء</h5>
                            <button id="close-invite-toboard-modal" type="button" class="close injaaz-btn-close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>                        
                        </div>
                        <div class="modal-body">
                            <div class="row m-0 p-0 my-5 invite-section">    
                                <div id="board-add-dropdown"  class="w-100 board-add-dropdown">
                                  <label class="form-label mb-4 fw-bold" for="invite-member">ادخل اسم العضو للبحث</label>  {{--onclick="boardToggleDropdown()"--}}
                                  <input type="text" id="invite-member-search" class="form-control board-name-input" oninput="boardFilterOptions()" placeholder="ابحث عن اعضاء">
                                  <button id="send-invite-btn" class="btn btn-success btn btn-success w-25 my-3 d-none">دعوة</button>
                                  <div id="board-dropdownContent" class="custom-scrollbar rounded d-none">
                                    
                                  </div>
                                </div>                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!--#endregion invite Board Memeber Modal-->


        <div class="row px-5 pt-5 pb-3 justify-content-center mx-0">
            <div class="row mt-5">
                <div class="col-11 profile-navigation">
                    <ul class="d-flex list-unstyled justify-content-start gap-5">
                        <li class="navigation-item {{ $section === 'board_general' ? 'active' : '' }}"  onclick="moveLink(this,'board-general')">عام</li>
                        <li class="navigation-item {{ $section === 'board_lists' ? 'active' : '' }}" onclick="moveLink(this,'board-lists')">القوائم</li>
                        <li class="navigation-item {{ $section === 'board_cards' ? 'active' : '' }}" onclick="moveLink(this,'board-cards')">المهام</li>
                        <li class="navigation-item {{ $section === 'board_membres' ? 'active' : '' }}" onclick="moveLink(this,'board-membres')">الاعضاء</li>
                        <li class="navigation-item {{ $section === 'board_actions' ? 'active' : '' }}" onclick="moveLink(this,'board-actions')">الاجراءات</li>
                    </ul>
                    <hr>
                </div>
            </div>
            <div class="row board-sections-container">
                <div class="col-11 p-3 d-flex justify-content-start flex-column">
                    <div id="board-general" class="row py-5 {{ $section === 'board_general' ? '' : 'd-none' }} board-general board-sections">
                        <div class="col-12">
                            <div class="row mb-3 justify-content-center">
                                <div class="col-1 ps-0">
                                    <label for="board-name" class="col-1 form-label fw-bold">الأسم</label>
                                </div>
                                <div class="col-7">
                                    <input id="board-name" type="text" value="{{ old('name', $board_details['board_name']) }}" class="col-5 form-control">
                                </div>
                            </div>
                            <div class="row mb-3  justify-content-center mb-3">
                                <div class="col-1 ps-0">
                                    <label for="board-description" class="form-label fw-bold">الوصف</label>
                                </div>
                                <div class="col-7">
                                    <textarea id="board-description" class="form-control" rows="7" aria-label="With textarea">{{$board_details['board_dexcription']}}</textarea>
                                </div>
                            </div>
                            <div class="row mb-3 mb-3 pe-5  justify-content-center">
                                <div class="col-7 me-5 d-flex justify-content-center">
                                    <button class="btn injaaz-btn w-50 fw-bold" onclick="UpdateGeneralSettings({{$board_details['board_id']}})">حفظ</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="board-lists" class="row py-5 {{ $section === 'board_lists' ? '' : 'd-none' }}  justify-content-center board-lists board-sections">
                        <div class="col-7">
                            <table class="table table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>العنوان</th>
                                        <th>عدد المهام</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($board_details['board_listes'] as $list)
                                        <tr>
                                            <td>
                                                {{$list['list_title']}}
                                            </td>
                                            <td>
                                                {{$list['cards_no']}}
                                            </td>
                                        </tr>   
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="board-cards" class="row py-5 {{ $section === 'board_cards' ? '' : 'd-none' }} board-cards board-sections">
                        <div class="col-12">
                            <table class="table table-striped text-center">
                                <thead>
                                    <tr>
                                        <th>العنوان</th>
                                        <th>القائمة</th>
                                        <th>نسبة الأنجاز</th>
                                        <th>الأعضاء المسندين</th>
                                        <th>تاريخ البدء</th>
                                        <th>تاريخ الأنتهاء</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($board_details['board_cards'] as $card)
                                        <tr>
                                            <td>
                                                {{$card['card_title']}}
                                            </td>
                                            <td>
                                                {{$card['card_list']}}
                                            </td>
                                            <td>
                                                {{$card['card_progress']}}%
                                        </td>
                                            <td>
                                                @foreach ($card['card_assigneds'] as $card_assigned)
                                                    <div class="d-flex gap-4 align-items-center my-2 justify-content-between">
                                                        <img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($card_assigned['assgined_email']))) . "?d=mp" }}" style="height: 3rem" alt="Profile" class="rounded-circle">
                                                        <h6 class="m-0" >{{$card_assigned['assgined_name']}}</h6>
                                                    </div>
                                                @endforeach
                                            </td>
                                            <td>
                                                {{$card['card_start_date']}}
                                            </td>
                                            <td>
                                                {{$card['card_start_date']}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div id="board-membres" class="row py-5 {{ $section === 'board_membres' ? '' : 'd-none' }} board_membres board-sections">
                        <div class="col-12 px-5">
                            <div class="row justify-content-center">
                                <div class="col-5">
                                    @foreach ($board_details['board_members'] as $board_member)
                                        <div id="board-member" class="d-flex mb-5 justify-content-between align-items-center">
                                            <div class="d-flex gap-4 align-items-center">
                                                <img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($board_member['member_email']))) . "?d=mp" }}" alt="Profile" class="rounded-circle board-member-photo">
                                                <h5>{{$board_member['member_name']}}</h5>
                                            </div>
                                            @if ($board_member['member_id'] != Auth::user()->id)
                                            @if ($board_details['board_user_id'] == Auth::user()->id)
                                                <div>
                                                    <i class="fa-solid fa-trash-can board-ember-delete-icon" onclick="deleteBoardMember(this, {{$board_details['board_id']}}, {{$board_member['member_id']}})"></i>
                                                </div>   
                                            @endif
                                            @endif
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="row py-2 justify-content-center">
                                <div class="col-3 d-flex justify-content-center flex-column">
                                    <button class="btn fw-bold injaaz-btn" onclick="showInviteToBoardModal({{$board_details['board_id']}})">دعوة أعضاء</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="board-actions" class="row py-5 {{ $section === 'board_actions' ? '' : 'd-none' }} board-actions board-sections">
                        <div class="col-12">
                            <div class="row py-2 justify-content-center">
                                <div class="col-3 d-flex justify-content-center flex-column">
                                    <a href="{{route('dashboard.lists',['board_id'=>$board_details['board_id']])}}" class="btn fw-bold injaaz-btn">عرض مساحة العمل</a>
                                </div>
                            </div>
                            <div class="row py-2 justify-content-center">
                                <div class="col-3 d-flex justify-content-center flex-column">
                                    <button class="btn fw-bold injaaz-btn" onclick="addToArchif({{$board_details['board_id']}})">أرشفة اللوحة</button>
                                </div>
                            </div>
                            <div class="row py-2 justify-content-center">
                                <div class="col-3 d-flex justify-content-center flex-column">
                                    <button class="btn fw-bold btn-danger" onclick="deleteBoard({{$board_details['board_id']}},{{Auth::user()->id}})">حذف اللوحة</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>  
    <script>

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
                    console.log("here");
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
            function selectUser(userId, element){
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
        // selectUser


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
                        <div class="dropdownOption justify-content-center gap-3 px-4" onclick="selectUser(${user.id},this,{{Auth::user()->id}})">
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
    </script>
@endsection

