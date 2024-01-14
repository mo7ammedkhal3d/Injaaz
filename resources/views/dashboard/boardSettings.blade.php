@extends('layouts.mainlayout')
@section('content')
    <main id="main" class="main p-0">
        <div class="row px-5 pt-5 pb-3 justify-content-center mx-0">
            <div class="col-10 p-3 d-flex justify-content-center flex-column">
                <div class="row py-5">
                    <div class="col-1">
                        <h4>عام</h4>
                    </div>
                    <div class="col-11">
                        <div class="row mb-3 align-items-center">
                            <div class="col-1 ps-0">
                                <label for="board-name" class="col-1 form-label fw-bold">الأسم</label>
                            </div>
                            <div class="col-7">
                                <input id="board-name" type="text" value="{{ old('name', $board_details['board_name']) }}" class="col-5 form-control">
                            </div>
                        </div>
                        <div class="row mb-3 align-items-start mb-3">
                            <div class="col-1 ps-0">
                                <label for="board-name" class="form-label fw-bold">الوصف</label>
                            </div>
                            <div class="col-7">
                                <textarea id="board-description" class="form-control" rows="7" aria-label="With textarea">{{$board_details['board_dexcription']}}</textarea>
                            </div>
                        </div>
                        <div class="row mb-3 mb-3 pe-5">
                            <div class="col-7 me-5">
                                <button class="btn injaaz-btn w-100 fw-bold">حفظ</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row py-5">
                    <div class="col-1">
                        <h4>القوائم</h4>
                    </div>
                    <div class="col-11">
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
                <div class="row py-5">
                    <div class="col-1">
                        <h4>المهام</h4>
                    </div>
                    <div class="col-11">
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
                                                <div class="d-flex gap-4 align-items-center my-2">
                                                    <img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($card_assigned['assgined_email']))) . "?d=mp" }}" alt="Profile" class="rounded-circle">
                                                    <h6>{{$card_assigned['assgined_name']}}</h6>
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
                <div class="row py-5">
                    <div class="col-1">
                        <h4>الأعضاء</h4>
                    </div>
                    <div class="col-11 px-5">
                        <div class="row">
                            <div class="col-7">
                                @foreach ($board_details['board_members'] as $board_member)
                                    <div class="d-flex mb-5 justify-content-between align-items-center">
                                        <div class="d-flex gap-5 align-items-center">
                                            <img src="{{ "https://www.gravatar.com/avatar/" . md5(strtolower(trim($board_member['member_email']))) . "?d=mp" }}" alt="Profile" class="rounded-circle">
                                            <h4>{{$board_member['member_name']}}</h4>
                                        </div>
                                        <div>
                                            <i class="fa-solid fa-trash-can board-ember-delete-icon" onclick="deleteBoardMember({{$board_details['board_id']}},{{$board_member['member_id']}},this)"></i>
                                        </div>
                                    </div>   
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row py-2 justify-content-center">
                    <div class="col-3 d-flex justify-content-center flex-column">
                        <button class="btn fw-bold btn-danger" onclick="deleteBoard({{$board_details['board_id']}})">حذف اللوحة</button>
                    </div>
                </div>
            </div>
        </div>
    </div>  
@endsection

