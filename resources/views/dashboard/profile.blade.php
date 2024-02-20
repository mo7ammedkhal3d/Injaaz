@extends('layouts.dashboard.mainlayout')
@section('page_title','الملف الشخصي')
@section('content')
    <main id="main" class="main p-0">
        <div class="row m-0 p-3">
            {{-- header --}}
            <div class="row my-3">
                <div class="col-2">
                    <img src="{{ 'https://www.gravatar.com/avatar/' . md5(strtolower(trim(Auth::user()->email))) . '?d=mp' }}"
                        alt="Profile" class="rounded-circle">
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <h3 class="text-end me-2">{{ Auth::user()->name }}</h3>
                </div>
            </div>
            {{-- header --}}

            {{-- profile-navigation --}}
            <div class="row mt-5">
                <div class="col-11 profile-navigation">
                    <ul class="d-flex list-unstyled justify-content-start gap-5">
                        <li class="navigation-item {{ $section === 'user_profile' ? 'active' : '' }}"
                            onclick="getUserProfile(this,'user-profile')">الملف الشخصي</li>
                        <li class="navigation-item {{ $section === 'user_boards' ? 'active' : '' }}"
                            onclick="getUserBoards(this,'user-boards')">اللوحات</li>
                        <li class="navigation-item {{ $section === 'user_cards' ? 'active' : '' }}"
                            onclick="getUserCards(this,'user-cards')">المهام</li>
                        <li class="navigation-item {{ $section === 'user_activity' ? 'active' : '' }}"
                            onclick="changeActiveLink(this,'user-activity')">النشاط</li>
                        <li class="navigation-item {{ $section === 'user_archif' ? 'active' : '' }}"
                            onclick="changeActiveLink(this,'user-archif')">الأرشفة</li>
                    </ul>
                    <hr>
                </div>
            </div>
            {{-- profile-navigation --}}

            {{-- Sections --}}
            <div class="row my-3 justify-content-center sections-container">
                <div class="col-11 d-flex justify-content-center">
                    <div id="user-profile"
                        class="col-6 user-profile {{ $section === 'user_profile' ? '' : 'd-none' }} py-5 profile-section">
                        <div class="col-10">
                            <div class="mb-3">
                                <label for="name" class="form-label fw-bold">أسم المستخدم</label>
                                @if ($section === 'user_profile')
                                    <input id="user-name" type="text" value="{{ $user->name }}" class="form-control">
                                @else
                                    <input id="user-name" type="text" class="form-control">
                                @endif

                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label fw-bold">الوصف</label>
                                @if ($section === 'user_profile')
                                    <textarea id="user-bio" class="form-control" rows="7" aria-label="With textarea">{{ $user->bio }}</textarea>
                                @else
                                    <textarea id="user-bio" class="form-control" rows="7" aria-label="With textarea"></textarea>
                                @endif
                            </div>
                            <div class="mb-3 d-flex justify-content-center">
                                <a class="btn injaaz-btn fw-bold btn-user-profile" onclick="saveProfile()">حفظ</a>
                            </div>
                            <div class="mb-3 d-flex justify-content-center">
                                <a href="{{ route('account.settings', ['userId' => Auth::user()->id]) }}"
                                    class="btn injaaz-btn fw-bold btn-user-profile">أعدادات الحساب</a>
                            </div>
                        </div>
                    </div>
                    <div id="user-boards"
                        class="col-12 user-boards py-5 {{ $section === 'user_boards' ? '' : 'd-none' }} profile-section">
                        <div id="boards-container" class="row gap-5 justify-content-center">
                            @if ($section === 'user_boards')
                                @foreach ($boards as $board)
                                    <div class="col-3 user-porofile-board">
                                        <div class="row py-3">
                                            @if ($board['board_member_no'] > 1)
                                                <div class="col-2">
                                                    <div class="have-memer">
                                                        <i class="fa-solid fa-users have-member-icon"></i>
                                                    </div>
                                                </div>
                                            @else
                                                <div class="col-2">
                                                    <div class="personal">
                                                        <i class="fa-solid fa-user personal-icon"></i>
                                                    </div>
                                                </div>
                                            @endif
                                            <a href="{{ route('board.generalSettings', ['userId' => Auth::user()->id, 'board_id' => $board['id']]) }}"
                                                class="col-10">
                                                <div class="user-board-name">
                                                    <h4 class="text-end pb-2 fw-bold">{{ $board['name'] }}</h4>
                                                    <h6>{{ $board['board_member_no'] }} أعضاء</h6>
                                                    <h6>{{ $board['board_list_no'] }} قوائم</h6>
                                                    <h6>{{ $board['board_card_no'] }} مهمات</h6>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                    <div id="user-cards"
                        class="col-10 user-cards {{ $section === 'user_cards' ? '' : 'd-none' }} py-5 profile-section">
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
                                            <td>{{ $card['card_title'] }}</td>
                                            <td>{{ $card['list_title'] }}</td>
                                            <td>{{ $card['board_name'] }}</td>
                                            <td>{{ $card['created_at'] }}</td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div id="user-activity" class="col-10 user-activity d-none py-5 profile-section">
                        <h1 class="text-center">النشاط</h1>
                    </div>
                    <div id="user-archif" class="col-10 user-archif d-none py-5 profile-section">
                        <h1 class="text-center">الأرشفة</h1>
                    </div>
                </div>
            </div>
            {{-- Sections --}}
        </div>
    </main>
@endsection
