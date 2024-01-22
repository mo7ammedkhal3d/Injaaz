@extends('layouts.mainlayout')
@section('content')
    <main id="main" class="main p-0">

        {{-- invite Board Memeber Modal --}}
            <!--#region -->
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
        {{-- invite Board Memeber Modal --}}       

    
        <div class="row px-5 pt-5 pb-3 justify-content-center mx-0">
        {{-- Board Settings Navigation --}}
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
        {{-- Board Settings Navigation --}}

        {{-- Sections --}}
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
                                    <a href="{{ route('dashboard.lists', ['userId'=>Auth::user()->id,'board_id' => $board_details['board_id']]) }}" class="btn fw-bold injaaz-btn">عرض مساحة العمل</a>
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
        {{-- Sections --}}
        </div>
    </main>  
@endsection

