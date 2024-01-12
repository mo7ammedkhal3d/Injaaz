@extends('layouts.mainlayout')
@section('content')
    <main id="main" class="main p-0">
            <div class="row m-0 p-3">
                <div class="row my-3">
                    <div class="col-2">
                        <img src="{{"https://www.gravatar.com/avatar/" . md5(strtolower(trim(Auth::user()->email))) . "?d=mp"}}" alt="Profile" class="rounded-circle">
                    </div>  
                </div>
                <div class="row">
                    <div class="col-3">
                        <h3 class="text-end me-2">{{Auth::user()->name}}</h3>
                    </div>  
                </div>
                <div class="row mt-5">
                    <div class="col-11 profile-navigation">
                        <ul class="d-flex list-unstyled justify-content-start gap-5">
                            <li class="navigation-item {{ $section === 'user_profile' ? 'active' : '' }}" onclick="getUserProfile(this,'user-profile')">الملف الشخصي</li>
                            <li class="navigation-item {{ $section === 'user_boards' ? 'active' : '' }}" onclick="getUserBoards(this,'user-boards')">اللوحات</li>
                            <li class="navigation-item {{ $section === 'user_cards' ? 'active' : '' }}" onclick="getUserCards(this,'user-cards')">المهام</li>
                            <li class="navigation-item {{ $section === 'user_activity' ? 'active' : '' }}" onclick="changeActiveLink(this,'user-activity')">النشاط</li>
                            <li class="navigation-item {{ $section === 'user_archif' ? 'active' : '' }}" onclick="changeActiveLink(this,'user-archif')">الأرشفة</li>
                        </ul>
                        <hr>
                    </div>
                </div>
                <div class="row my-3 justify-content-center sections-container">
                    <div class="col-11 d-flex justify-content-center">
                        <div id="user-profile" class="col-6 user-profile {{ $section === 'user_profile' ? '' : 'd-none' }} py-5 profile-section">
                            <div class="col-10">
                                <div class="mb-3">
                                    <label for="name" class="form-label fw-bold">أسم المستخدم</label>
                                    @if ($section === 'user_profile')
                                        <input id="user-name" type="text"  value="{{$user->name}}"  class="form-control"> 
                                    @else
                                        <input id="user-name" type="text" class="form-control">
                                    @endif

                                </div>
                                <div class="mb-3">
                                    <label for="name" class="form-label fw-bold">الوصف</label>
                                    @if ($section === 'user_profile')
                                    <textarea id="user-bio" class="form-control" rows="7" aria-label="With textarea">{{$user->bio}}</textarea>
                                    @else
                                    <textarea id="user-bio" class="form-control" rows="7" aria-label="With textarea"></textarea> 
                                    @endif
                                </div>
                                <div class="mb-3 d-flex justify-content-center">
                                    <a class="btn injaaz-btn fw-bold btn-user-profile" onclick="saveProfile()">حفظ</a>
                                </div>
                                <div class="mb-3 d-flex justify-content-center">
                                    <a href="{{route('getAccountSettings',['userId'=>Auth::user()->id])}}" class="btn injaaz-btn fw-bold btn-user-profile" >أعدادات الحساب</a>
                                </div>
                            </div>
                        </div>
                        <div id="user-boards" class="col-4 user-boards py-5 {{ $section === 'user_boards' ? '' : 'd-none' }} profile-section">
                            @if ($section === 'user_boards')
                                @foreach ($boards as $board)
                                <div class="row py-3">
                                    @if ($board['board_member_no'] > 1)
                                        <div class="col-3">
                                            <div class="have-memer">
                                                <i class="fa-solid fa-users have-member-icon"></i>
                                            </div>
                                        </div>
                                    @else
                                        <div class="col-3">
                                            <div class="personal">
                                                <i class="fa-solid fa-user personal-icon"></i>
                                            </div>
                                        </div>
                                    @endif
                                        <a href="{{ route('getBoardInfo', ['userId' => Auth::user()->id, 'boardId' => $board['id']]) }}" class="col-9">
                                            <div class="user-board-name">
                                                <h3 class="text-end pb-2 fw-bold">{{ $board['name'] }}</h3>
                                            </div>
                                        </a>
                                </div>
                                @endforeach
                            @endif
                        </div>
                        <div id="user-cards" class="col-10 user-cards {{ $section === 'user_cards' ? '' : 'd-none' }} py-5 profile-section">
                            <table class="table table-striped text-center">
                                <thead>
                                <tr>
                                  <th scope="col">المهمة</th>
                                  <th scope="col">القائمة</th>
                                  <th scope="col">اللوحة</th>
                                  <th scope="col">تاريخ الأنشاء</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @if ($section === 'user_cards')
                                        @foreach ($cards as $card)
                                        <tr>
                                            <td>{{$card['card_title']}}</td>
                                            <td>{{$card['list_title']}}</td>
                                            <td>{{$card['board_name']}}</td>
                                            <td>{{$card['created_at']}}</td>
                                        </tr>
                                        @endforeach   
                                    @endif
                                </tbody>
                              </table>
                        </div>
                        <div id="user-activity" class="col-10 user-activity d-none py-5 profile-section" >
                            <h1 class="text-center">النشاط</h1>
                        </div>
                        <div id="user-archif" class="col-10 user-archif d-none py-5 profile-section" >
                            <h1 class="text-center">الأرشفة</h1>
                        </div>
                    </div>
                </div>
            </div>

        <script>

            function changeActiveLink(element,section){
                $('.navigation-item').each(function() {
                    $(this).removeClass('active');
                });

                $(element).addClass('active');

                $('.profile-section').addClass('d-none');

                $(`#${section}`).removeClass('d-none');
            }

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
                        $('#user-boards').html("");
                        $.each(data.boards, function(index, board) {
                        var $boardContainer = $('<div class="row py-3"></div>');

                        if (board.board_member_no > 1) {
                            $boardContainer.append(`
                                <div class="col-3">
                                    <div class="have-memer">
                                        <i class="fa-solid fa-users have-member-icon"></i>
                                    </div>
                                </div>
                            `);
                        } else {
                            $boardContainer.append(`
                                <div class="col-3">
                                    <div class="personal">
                                        <i class="fa-solid fa-user personal-icon"></i>
                                    </div>
                                </div>
                            `);
                        }

                        $boardContainer.append(`
                            <a class="col-9">
                                <div class="user-board-name">
                                    <h3 class="text-end pb-2 fw-bold">${board.name}</h3>
                                </div>
                            </a>
                        `);

                        $('#user-boards').append($boardContainer);
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
        </script>
    </main>
@endsection