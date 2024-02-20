@extends('layouts.dashboard.mainlayout')
@section('content')
    <main id="main" class="main p-0">

        {{-- card-modal Modal --}}
        <div class="modal card-modal" id="card-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-center" role="document">
                <div class="modal-content">
                    <div id="card-loadingSpinner" class="loadingSpinner">
                        <div class="spinner-border in-text-secondry" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                    </div>
                    <div class="modal-header px-4">
                        <div class="ms-5 w-100">
                            <p id="card-title" class="m-0 modal-title me-2 rounded no-border card-modal-title"
                                role="button" onclick="makeEditable(this,{{ Auth::user()->id }})"></p>
                            <input id="card-id" type="hidden">
                        </div>
                        <button id="close-card-modal" type="button" class="close injaaz-btn-close" data-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body custom-scrollbar">
                        <div class="row m-0 p-0" dir="rtl">
                            <div class="col-7 p-2 ps-3">
                                <div class="description-section my-2">
                                    <label for="description" class="fw-bold w-100 in-text-secondry my-2">الوصف</label>
                                    <div id="description-confirm" class="card-modal-description w-100"
                                        contenteditable="true" data-placeholder="الوصف" role="button"
                                        onclick="editCardDescription(this,{{ Auth::user()->id }})"></div>
                                    <div id="input-description" class="d-none">
                                        <textarea class="form-control" id="description-text" placeholder="أضف وصف" cols="4" rows="5" name="body"></textarea>
                                        <div class="d-flex gap-2 justify-content-end my-2">
                                            <button id="cancel-add-description"
                                                class="btn injaaz-btn-secondry">إلغاء</button>
                                            <button id="save-description-btn" class="btn injaaz-btn">حفظ</button>
                                        </div>
                                    </div>

                                </div>
                                <div class="comments-section my-2">
                                    <button class="btn injaaz-btn my-2 fw-bold">التعليقات</button>
                                    <button class="btn in-bg-secondry injaaz-btn-secondry my-2 fw-bold">التغييرات</button>
                                    <div class="add-comment d-flex p-3 gap-2">
                                        <img class="comment-img"
                                            src="{{ 'https://www.gravatar.com/avatar/' . md5(strtolower(trim(Auth::user()->email))) . '?d=mp' }}"
                                            alt="loadding">
                                        <div id="comment-confirm" class="card-modal-comment w-100" contenteditable="true"
                                            data-placeholder="تعليق" role="button"
                                            onclick="AddComment({{ Auth::user()->id }},{{ $board->id }})"></div>
                                        <div id="input-comment" class="d-none">
                                            <textarea class="form-control" id="comment-text" placeholder="أضف تعليق" rows="5" name="body"></textarea>
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
                            <div class="col-5 d-flex flex-column align-items-end ps-5">
                                <table class="card-info">
                                    <tr class="card-owner">
                                        <td>
                                            <h5 class="m-0 fw-bold">المالك</h5>
                                        </td>
                                        <td class="py-4 td-custom-padding">
                                            <div id="card-owner" class="d-flex justify-content-start gap-4">

                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="dates">
                                        <td>
                                            <h5 class="m-0 fw-bold">التواريخ</h5>
                                        </td>
                                        <td class="py-4 td-custom-padding">
                                            <div class="d-flex gap-2 justify-content-between align-items-center">
                                                <input id="card-start-date" class="card-modal-title" type="date"
                                                    onchange="updateCardDates(this,{{ Auth::user()->id }},'start_date')">
                                                <i class="fa-solid fa-arrow-left"></i>
                                                <input id="card-due-date" class="card-modal-title" type="date"
                                                    onchange="updateCardDates(this,{{ Auth::user()->id }},'due_date')">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr class="progrss-rate">
                                        <td>
                                            <h5 class="m-0 fw-bold">نسبة الأنجاز</h5>
                                        </td>
                                        <td class="py-4 td-custom-padding">
                                            <div class="d-flex gap-2 justify-content-between align-items-center">
                                                <label for="rate"><input id="progress-rate" type="number"
                                                        max="100" class="card-modal-title text-center"
                                                        value="50" role="button"
                                                        onchange="updateCardProgrss(this,{{ Auth::user()->id }},'progress')">%</label>
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
                                            <h5 class="m-0 fw-bold">الاعضاء</h5>
                                        </td>
                                        <td class="d-flex gap-2 justify-content-between py-4 td-custom-padding">
                                            <div id="member-photos" class="member-photos position-relative w-50">
                                            </div>
                                            <button class="btn injaaz-btn in-sm-text" onclick="showMemberDetails()">عرض
                                                التفاصيل</button>
                                        </td>
                                    </tr>
                                    <tr class="member-details d-none">
                                        <td colspan="2">
                                            <div class="d-flex flex-column gap-3 card-member-list custom-scrollbar px-3"
                                                dir="rtl">
                                                <div id="card_assigneds" class="d-flex flex-column gap-3">

                                                </div>
                                                <div class="d-flex justify-content-center">
                                                    <button class="btn injaaz-btn w-50 in-sm-text"
                                                        onclick="showAddMember()"><i class="fa-solid fa-plus ms-2"></i>
                                                        أضافة عضو </button>
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
        {{-- Card Modal --}}


        {{-- Add Memeber Modal --}}
        <div id="add-card-member" class="modal add-member-modal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-center" role="document">
                <div class="modal-content">
                    <div class="modal-header px-4">
                        <h5 class="m-0 text-center">أضافة عضو</h5>
                        <button id="close-add-member-modal" type="button" class="close injaaz-btn-close"
                            data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div
                            class=" px-5 d-flex justify-content-center w-100 h-100 align-items-center gap-3 flex-column add-member-details">
                            <label for="member-email">الأسم</label>
                            <div id="board-member-dropdown" class="w-75 board-member-dropdown">
                                <input type="text" id="searchInput" class="no-boeder rounded px-2 w-100"
                                    oninput="filterOptions()" onclick="toggleDropdown()" placeholder="ابحث عن اعضاء">
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
        {{-- Add Memeber Modal --}}


        {{-- Start Board --}}
        <div class="py-2 px-3 board-header">
            <div class="col d-flex flex-row gap-3 align-items-center">
                <div class="board-name">
                    <h3 class="fw-bold">{{ $board->name }}</h3>
                </div>
                <a href="{{ route('board.generalSettings', ['userId' => Auth::user()->id, 'board_id' => $board->id]) }}"
                    class="link-board-general" role="button">
                    <i class="fa-solid fa-gear board-general-icon"></i>
                </a>
                <a href="{{ route('board.boardMembres', ['userId' => Auth::user()->id, 'board_id' => $board->id]) }}"
                    class="link-board-membres" role="button">
                    <i class="fa-solid fa-users board-membres-icon"></i>
                </a>
            </div>
        </div>

        {{-- Show Listes and Cards --}}

        <div
            class="row pt-2 mt-2 gap-5 mx-0 board-body algin-itmes-center overflow-x-auto flex-nowrap custom-scrollbar-x custom-row-changes">
            @if ($board->lists->count() > 0)
                @foreach ($board->lists->sortBy('created_at') as $list)
                    <div class="col-3 rounded board-list p-0" data-list-id="{{ $list->id }}">
                        <div class="list-header p-3">
                            <div class="list-title d-flex align-items-center justify-content-between" role="button">
                                <h5 class="fw-bold">{{ $list->title }}</h5>
                                <i class="fa-solid fa-ellipsis list-links"></i>
                            </div>
                        </div>
                        <div class="list-body custom-scrollbar">
                            <div class="list-body-conetnt mkmk custom-scrollbar px-3">
                                @if ($list->cards && $list->cards->count() > 0)
                                    @foreach ($list->cards->sortBy('position') as $card)
                                        <div draggable="true"
                                            class="card bg-white p-2 d-flex flex-row justify-content-between"
                                            onclick="showCard(this,{{ Auth::user()->id }},{{ $card->id }})"
                                            data-card-id="{{ $card->id }}">
                                            <div id="card-short-info"
                                                class="d-flex justify-content-center gap-3 flex-column">
                                                <h6 id="hcard-title" class="fw-bold m-0">{{ $card->title }}</h6>
                                                @if (\Carbon\Carbon::parse($card->due_date)->format('Y-m-d') == date('Y-m-d') || $card->description != null)
                                                    <div id="card-notification" class="d-flex gap-3 align-items-center">
                                                        @if ($card->due_date == date('Y-m-d'))
                                                            <small id="date-notify"
                                                                style="background-color: #EF4040 ;color:white"
                                                                title="أنجز بسرعة" class="fw-bold rounded p-1"
                                                                onclick="markComplete(this)">تنتهي قريبا <i
                                                                    class="fa-regular fa-clock me-2"></i></small>
                                                        @endif
                                                        @if ($card->description != null)
                                                            <i id="description-notify" title="هذه الكارد تحتوي على وصف"
                                                                class="fa-solid fa-align-left"></i>
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
                                <input class="title-card d-none w-100 px-2" type="text" name="" id=""
                                    placeholder="أدخل عنوان المهمة">
                                <button class="btn my-2 w-100 px-3 text-end injaaz-btn add-card-confirm"
                                    onclick="addCardConfirm(this)"> أضافة مهمة<i
                                        class="fa-solid fa-plus plus-icon"></i></button>
                                <div class="add-confirm p-2 d-flex align-items-center justify-content-between d-none">
                                    <i class="fa-solid fa-xmark close-icon btn-cancel-add" onclick="cancelAdd(this)"></i>
                                    <button class="btn my-2 px-3 text-end injaaz-btn btn-add"
                                        onclick="addCard(this,{{ Auth::user()->id }},{{ $list->id }})">أضافة</button>
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
                        <button class="btn injaaz-btn add-list"
                            onclick="addList(this,{{ Auth::user()->id }},{{ $board->id }})">أضافة</button>
                        <i class="fa-solid fa-xmark close-icon btn-cancel-add"></i>
                    </div>
                    <div class="my-2">
                        <button class="btn injaaz-btn text-end add-list-confirm"><i
                                class="fa-solid fa-plus plus-icon"></i>أضافة قائمة</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- Show Listes and Cards --}}

        {{-- Board  --}}
    </main>
@endsection
