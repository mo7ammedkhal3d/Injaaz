@extends('layouts.mainlayout')
@section('content')
  <main id="main" class="main p-0">
    <div class="boards-header mb-5">
      <div class="row mx-0 px-2 py-4">
        <div class="user-info col-5 d-flex justify-content-center gap-4 align-items-center p-5 d-flex align-item-center justify-content-center">
          <img src="{{"https://www.gravatar.com/avatar/" . md5(strtolower(trim(Auth::user()->email))) . "?d=mp"}}" alt="Profile" class="rounded-circle">
          <h1 class="m-0">{{Auth::user()->name}}</h1>
        </div>
      </div>  
    </div>

    <!--#region Add Board Modal -->

    <div class="modal fade moda add-board-modal" id="add-board-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-center" role="document">
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
              <div class="row m-0 p-0 my-4 py-4">    
                <input id="board-name" type="text" class="form-control mb-4 board-name-input" name="name" placeholder="اسم اللوحة" aria-label="name" aria-describedby="basic-addon1">
                <textarea id="board-description" class="form-control mb-3" rows="5" placeholder="وصف اللوحة"></textarea>                 
              </div>
              <div class="row m-0 p-0 py-3 my-3 justify-content-center">
                <div class="col-10">
                  <button id="btn-continue" type="button" class="btn injaaz-btn w-100 fw-bold">متابعة</button>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div id="second-modal-content" class="modal-content d-none">
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
    </div>
  </div>
  <!--#endregion Add Board Modal  -->

      <div class="d-flex p-5 mt-5">
        <div class="col-3">
          <div class="boards-page-title">
            <h1>اللوحات</h1>
          </div>
        </div>
        <div class="col-2 d-flex align-items-center justify-content-center">
          <button id="btn-add-board" class="btn injaaz-btn add-board-btn" onclick="addBoardConfirm({{Auth::user()->id}})">أضافة لوحة</button>
        </div> 
      </div>

      <div class="row mx-0 my-5">
        @if ($boards->count() > 0)
          @foreach ($boards as $board)
            <div class="col-lg-4" role=button>
              <a href="{{ route('dashboard.lists', ['board_id' => $board->id]) }}">
                <div class="board my-3">
                  <div class="board-body p-3">
                    <div class="d-flex justify-content-between mb-3">
                      <h5 class="board-title">{{ $board->name }}</h5>
                      <i class="fa-solid fa-ellipsis"></i>
                    </div>
                    <p class="board-description">{{ $board->description }}</p>
                  </div>
                </div>  
              </a>
            </div>
          @endforeach
        @endif
      </div>

  </main>
  <script>

    var baseUrl = '{{asset('')}}';


    // Add board member

      var inviteUsers = [];

      // may later invite users
        function mayLater(){
        $('#btn-create-board').prop('disabled', false);
      }
      // may later invite users


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

            // $('#add-card-assigned').on('click',addCardMember);
            // function addCardMember(){
            //     var cardId = $('#card-id').val();
            //     const formData = new FormData();
            //     formData.append('board_member_id',boardMemberId);
            //     formData.append('card_id', cardId);

            //     fetch(`${baseUrl}dashboard/${userId}/cardAssigned/add`, {
            //         method: 'POST',
            //         headers: {
            //             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            //         },
            //         body: formData,
            //     })
            //     .then(response => {
            //         if (!response.ok) {
            //             throw new Error('Network response was not ok');
            //         }
            //         return response.json();
            //     })
            //     .then(data => {
            //         if (data){
            //             $('#add-card-assigned').off('click',addCardMember);
            //             element.remove();
            //             $('#searchInput').val("");
            //             const email = data.user_email.toLowerCase().trim();
            //             const md5Hash = CryptoJS.MD5(email).toString();
            //             const gravatarUrl = `https://www.gravatar.com/avatar/${md5Hash}?d=mp`;

            //             $('#member-photos').append(`
            //                     <img id="member-photo-${data.board_member_id}" class="comment-img" src="${gravatarUrl}" alt="loadding">
            //                 `);

            //             $('#card_assigneds').append(`
            //                 <div id="card-member" class="d-flex gap-3 align-items-center justify-content-between px-5">
            //                     <img class="comment-img" src="${gravatarUrl}" alt="loading">
            //                     <h6 class="m-0">${data.user_name}</h6>
            //                     <i class="fa-solid fa-trash delete-member-icon" onclick="deleteCardMember(this,${data.board_member_id},{{Auth::user()->id}})" ></i>
            //                 </div>              
            //             `);
            //         }
            //     })
            //     .catch(error => {
            //         console.error('Error fetching card details:', error);
            //     });
            // }
        }
        
    
      function addBoardConfirm(userId){

        $('#add-board-modal').modal('show');
        $('#btn-continue').on('click', continueCreateBoard)
        $('#btn-create-board').on('click', createboard);

        $('#close-add-board-modal-1').on('click', function(){
            $('#add-board-modal').modal('hide'); 
          });

        $('#close-add-board-modal-2').on('click', function(){
          $('#first-modal-content').removeClass('d-none');
          $('#second-modal-content').addClass('d-none');
          $('#btn-continue').off('click', continueCreateBoard);
          $('#add-board-modal').modal('hide'); 
        });

        $('#back-to-previous').on('click', function(){
          $('#first-modal-content').removeClass('d-none');
          $('#second-modal-content').addClass('d-none');
          $('#btn-continue').on('click', continueCreateBoard);
          $('#board-dropdownContent').html("");
          $('#btn-create-board').prop('disabled', true);
          while (inviteUsers.length > 0) {
            inviteUsers.pop();
          }
        });

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

        function createboard(){
            const formData = new FormData();
            formData.append('board_name',$('#board-name').val());
            formData.append('board_description',$('#board-description').val());
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
                    // After creating the board, redirect to the 'dashboard.lists' route
                    window.location.href = `${baseUrl}dashboard/${data.board.id}/lists`;
                }
            })
            .catch(error => {
                console.error('Error creating board:', error);
            });
          }
        }

  // Add board member


    $(document).ready(function(){
      $('#add-board-modal').on('shown.bs.modal', function (e) {
        $('body').removeClass('modal-open');
        $('body').css({'overflow': 'auto', 'padding-right': '0'});
      })
    });
  </script>
@endsection
