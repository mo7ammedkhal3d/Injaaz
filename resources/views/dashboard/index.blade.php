@extends('layouts.mainlayout')
@section('content')
  <main id="main" class="main p-0 in-bg-srface">
    <div class="boards-header mb-5">
      <div class="row mx-0 px-2 py-4">
        <div class="user-info d-flex justify-content-start gap-4 align-items-center p-5 d-flex">
          <div class="d-flex w-100 justify-content-start gap-5 align-items-center">
            <img src="{{"https://www.gravatar.com/avatar/" . md5(strtolower(trim(Auth::user()->email))) . "?d=mp"}}" alt="Profile" class="rounded-circle">
            <h1 class="m-0">{{Auth::user()->name}}</h1>
          </div>
        </div>
      </div>  
    </div>

    {{-- Add Board Modal --}}
      <div class="modal add-board-modal" id="add-board-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-center" role="document">
        {{-- first-modal-content --}}
          <div id="first-modal-content" class="modal-content">
            <div class="row m-0 p-0">
              <div class="col-6 p-4 add-board-img-section">
                <img src="{{asset('assets/img/hero.png')}}" alt="loadding">
              </div>
              <div class="col-6">
                <div class="row m-0 p-0 cancel-add mb-3 p-3 justify-content-end">
                  <button id="close-add-board-modal-1" type="button" class="close injaaz-btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form id="board-info-form">
                  <div class="row m-0 p-0 mt-4 board-info">  
                    <div class="board-name">
                      <input id="board-name-input" type="text" class="form-control fw-bold board-name-input" name="boardName" placeholder="اسم اللوحة" aria-label="name" aria-describedby="basic-addon1">
                    </div>  
                    <div class="mb-3 board-description">
                      <textarea id="board-description-input" class="form-control fw-bold  " rows="5" name="boardDescription" placeholder="وصف اللوحة"></textarea>  
                    </div>
                  </div>
                  <div class="row m-0 p-0 py-3 mb-3 justify-content-center">
                    <div class="col-10">
                      <button id="btn-continue" type="submit" class="btn injaaz-btn w-100 fw-bold">متابعة</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        {{-- first-modal-content --}}

        {{-- second-modal-content --}}
          <div id="second-modal-content" class="modal-content d-none">
            <div id="board-loadingSpinner" class="loadingSpinner d-none">
              <div  class="spinner-border in-text-secondry" role="status">
                  <span class="visually-hidden">Loading...</span>
              </div>
            </div>
            <div class="row m-0 p-0">
              <div class="col-6 p-4 add-board-img-section">
                <img src="{{asset('assets/img/create-board-2.png')}}" alt="loadding">
              </div>
              <div class="col-6">
                <div class="row m-0 p-0 cancel-add mb-3 p-3 justify-content-end gap-2">
                  <button id="back-to-previous" type="button" class="injaaz-btn-close">
                    <i class="fa-solid fa-caret-left previous-icon"></i>
                  </button>
                  <button id="close-add-board-modal-2" type="button" class="close injaaz-btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="row m-0 p-0 my-5 pt-4 invite-section">    
                  <div id="board-add-dropdown"  class="w-100 board-add-dropdown">
                    <label class="form-label mb-4 fw-bold" for="invite-member">قم بدعوة أعضاء</label>  {{--onclick="boardToggleDropdown()"--}}
                    <input type="text" id="invite-member-search" class="form-control board-name-input" oninput="boardFilterOptions()" placeholder="ابحث عن اعضاء">
                    <button id="send-invite-btn" class="btn btn-success btn btn-success w-25 my-3 d-none">دعوة</button>
                    <div id="board-dropdownContent" class="custom-scrollbar rounded d-none">
                      
                    </div>
                  </div>                
                </div>
                <div class="row m-0 p-0 py-3 my-3 justify-content-center">
                  <div class="col-10">
                    <button id="btn-may-later" type="button" class="btn injaaz-btn-transperant fw-bold w-100" onclick="mayLater()">ربما لاحقا</button>                 
                    <button id="btn-create-board" disabled type="button" class="btn injaaz-btn w-100 fw-bold my-2">انشاء اللوحة</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        {{-- second-modal-content --}}

        </div>
      </div>
    {{-- Add Board Modal  --}}
    
    {{-- show boards --}}
      <div class="p-5 pb-4 mt-5">
        <div class="col-3 boards-page-title">
          <h1>اللوحات</h1>
        </div>
        <div class="col-2 mt-4">
          <button id="btn-add-board" class="btn injaaz-btn add-board-btn" onclick="addBoardConfirm({{Auth::user()->id}})">أضافة لوحة</button>
        </div> 
      </div>

      <div id="user-boards" class="row mx-0 my-3 px-4 user-boards">
        @if ($boards->count() > 0)
          @foreach ($boards as $board)
            <div class="col-lg-4 pe-0 ps-3" role=button>
              <div class="board my-3 d-flex flex-row-reverse">
                <div class="board-option p-2">
                  <i class="fa-solid fa-ellipsis board-dropleft-icon" data-bs-toggle="dropdown" aria-expanded="false"></i>
                  <ul class="dropdown-menu text-end">
                    <li>
                      <a href="{{ route('dashboard.lists', ['board_id' => $board->id]) }}" class="dropdown-item">
                        <i class="fa-solid fa-list-check m-0 ms-1 dropdwon-board-icon"></i>
                        <span>عرض اللوحة</span>
                      </a>
                    </li>
                    <li>
                      <hr class="dropdown-divider">
                    </li>
                    <li>
                      <a href="{{ route('board.boardMembres', ['userId' => Auth::user()->id, 'board_id' => $board->id]) }}" class="dropdown-item">
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
                      <a href="{{ route('board.generalSettings', ['userId' => Auth::user()->id, 'board_id' => $board->id]) }}" class="dropdown-item">
                        <i class="fa-solid fa-gear m-0 ms-1 dropdwon-board-icon"></i>
                        <span>الأعدادت</span>
                      </a>
                    </li>
                  </ul>
                </div>
                <a class="board-body p-3" href="{{ route('dashboard.lists', ['board_id' => $board->id]) }}">
                  <div class="d-flex justify-content-between mb-3">
                    <h6 class="board-title">{{ $board->name }}</h6>
                  </div>
                  <p class="board-description">{{ $board->description }}</p>
                </a>
              </div>  
            </div>
          @endforeach
        @else
            <div id="noting-user-boards" class="d-flex align-items-center flex-column justify-content-center noting-user-boards">
              <h1>
                لاتوجد لديك أي لوحات 
              </h1>
              <h4 class="my-4">قم بأضافة لوحتك الأولى</h4>
            </div>
        @endif
      </div>
    {{-- show boards --}}

  </main>
  <script>

    var baseUrl = '{{asset('')}}';

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
                        required: "قم بأدخال اللوحة",
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


          $('#btn-create-board').on('click', createboard);

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
                      window.location.href = `${baseUrl}dashboard/${data.board.id}/lists`;
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

    $(document).ready(function(){
      $('#add-board-modal').on('shown.bs.modal', function (e) {
        $('body').removeClass('modal-open');
        $('body').css({'overflow': 'auto', 'padding-right': '0'});
      })
    });
  </script>
@endsection
