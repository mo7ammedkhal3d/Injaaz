@extends('layouts.mainlayout')
@section('content')
  <main id="main" class="main p-0 in-bg-srface">
    {{-- Header --}}

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

    {{-- Header --}}

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
@endsection
