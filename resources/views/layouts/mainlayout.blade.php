<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ config('app.name', 'Laravel') }}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Favicons -->
  <link href="{{asset('assets/img/favicon.ico')}}" rel="icon">
  <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!--fontawosme-->
  {{-- <script src="https://kit.fontawesome.com/16f6ba35a2.js" crossorigin="anonymous"></script> --}}

  <!-- Vendor CSS Files -->
  {{-- <script src="https://kit.fontawesome.com/16f6ba35a2.js" crossorigin="anonymous"></script> --}}
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/fontawesome-v6.4.2/css/all.min.css')}}" rel="stylesheet">


  <!-- Template Main CSS File -->
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
  <link href="{{asset('assets/css/custom.css')}}" rel="stylesheet">
  <link href="{{asset('assets/css/main.css')}}" rel="stylesheet">

  <!-- jquery -->
  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/3.1.9-1/crypto-js.js"></script>
  <!-- Include moment.js from CDN -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

</head>

<body class="toggle-sidebar">

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="{{route('dashboard.index', ['userId' => Auth::user()->id])}}" class="logo d-flex align-items-center">
        <img src="{{asset('assets/img/logo.png')}}" alt="">
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="ابحث" title="ادخل كلمة مفتاحية">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav me-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown mx-2" onclick="showNotification(this)">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span id="notification-no" class="badge bg-primary badge-number"></span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications user-notification">
            <div id="user-notification" class=" dropdown-content overflow-x-hidden">

            </div>
          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown mx-2">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">3</span>
          </a><!-- End Messages Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              You have 3 new messages
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="{{asset('assets/img/messages-1.jpg')}}" alt="" class="rounded-circle">
                <div>
                  <h4>Maria Hudson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>4 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="{{asset('assets/img/messages-2.jpg')}}" alt="" class="rounded-circle">
                <div>
                  <h4>Anna Nelson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>6 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="{{asset('assets/img/messages-3.jpg')}}" alt="" class="rounded-circle">
                <div>
                  <h4>David Muldon</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>8 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
              <a href="#">Show all messages</a>
            </li>

          </ul><!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3 me-4">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{"https://www.gravatar.com/avatar/" . md5(strtolower(trim(Auth::user()->email))) . "?d=mp"}}" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle pe-2">{{ Auth::user()->name }}</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>{{ Auth::user()->name }}</h6>
              <span>Web Designer</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a href="{{route('viewGetUserProfile', ['userId' => Auth::user()->id])}}" class="dropdown-item d-flex align-items-center">
                <i class="bi bi-person"></i>
                <span>ملفي الشخصي</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a href="{{route('viewGetUserBoards', ['userId' => Auth::user()->id])}}" class="dropdown-item d-flex align-items-center">
                <i class="bi bi-person"></i>
                <span>اللوحات</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a href="{{route('viewGetUserCards', ['userId' => Auth::user()->id])}}" class="dropdown-item d-flex align-items-center">
                <i class="bi bi-person"></i>
                <span>المهام</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a href="{{route('account.settings',['userId'=>Auth::user()->id])}}" class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>أعدادات الحساب</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span> مساعدة ؟</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item text-center" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
               {{ __('تسجيل الخروج') }}
           </a>

           <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
               @csrf
           </form>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.html">
          <i class="bi bi-grid"></i>
          <span>لوحة التحكم</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-kanban"></i><span>لوحات</span><i class="bi bi-chevron-down me-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="components-alerts.html">
              <i class="bi bi-circle"></i><span>Alerts</span>
            </a>
          </li>
          <li>
            <a href="components-accordion.html">
              <i class="bi bi-circle"></i><span>Accordion</span>
            </a>
          </li>
          <li>
            <a href="components-badges.html">
              <i class="bi bi-circle"></i><span>Badges</span>
            </a>
          </li>
          <li>
            <a href="components-breadcrumbs.html">
              <i class="bi bi-circle"></i><span>Breadcrumbs</span>
            </a>
          </li>
          <li>
            <a href="components-buttons.html">
              <i class="bi bi-circle"></i><span>Buttons</span>
            </a>
          </li>
          <li>
            <a href="components-cards.html">
              <i class="bi bi-circle"></i><span>Cards</span>
            </a>
          </li>
          <li>
            <a href="components-carousel.html">
              <i class="bi bi-circle"></i><span>Carousel</span>
            </a>
          </li>
          <li>
            <a href="components-list-group.html">
              <i class="bi bi-circle"></i><span>List group</span>
            </a>
          </li>
          <li>
            <a href="components-modal.html">
              <i class="bi bi-circle"></i><span>Modal</span>
            </a>
          </li>
          <li>
            <a href="components-tabs.html">
              <i class="bi bi-circle"></i><span>Tabs</span>
            </a>
          </li>
          <li>
            <a href="components-pagination.html">
              <i class="bi bi-circle"></i><span>Pagination</span>
            </a>
          </li>
          <li>
            <a href="components-progress.html">
              <i class="bi bi-circle"></i><span>Progress</span>
            </a>
          </li>
          <li>
            <a href="components-spinners.html">
              <i class="bi bi-circle"></i><span>Spinners</span>
            </a>
          </li>
          <li>
            <a href="components-tooltips.html">
              <i class="bi bi-circle"></i><span>Tooltips</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-people"></i><span>أعضاء</span><i class="bi bi-chevron-down me-auto"></i>
        </a>
        <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="forms-elements.html">
              <i class="bi bi-circle"></i><span>Form Elements</span>
            </a>
          </li>
          <li>
            <a href="forms-layouts.html">
              <i class="bi bi-circle"></i><span>Form Layouts</span>
            </a>
          </li>
          <li>
            <a href="forms-editors.html">
              <i class="bi bi-circle"></i><span>Form Editors</span>
            </a>
          </li>
          <li>
            <a href="forms-validation.html">
              <i class="bi bi-circle"></i><span>Form Validation</span>
            </a>
          </li>
        </ul>
      </li><!-- End Forms Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-calendar-week"></i><span>التقويم</span><i class="bi bi-chevron-down me-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="tables-general.html">
              <i class="bi bi-circle"></i><span>General Tables</span>
            </a>
          </li>
          <li>
            <a href="tables-data.html">
              <i class="bi bi-circle"></i><span>Data Tables</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bar-chart"></i><span>Charts</span><i class="bi bi-chevron-down me-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="charts-chartjs.html">
              <i class="bi bi-circle"></i><span>Chart.js</span>
            </a>
          </li>
          <li>
            <a href="charts-apexcharts.html">
              <i class="bi bi-circle"></i><span>ApexCharts</span>
            </a>
          </li>
          <li>
            <a href="charts-echarts.html">
              <i class="bi bi-circle"></i><span>ECharts</span>
            </a>
          </li>
        </ul>
      </li><!-- End Charts Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-gem"></i><span>Icons</span><i class="bi bi-chevron-down me-auto"></i>
        </a>
        <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="icons-bootstrap.html">
              <i class="bi bi-circle"></i><span>Bootstrap Icons</span>
            </a>
          </li>
          <li>
            <a href="icons-remix.html">
              <i class="bi bi-circle"></i><span>Remix Icons</span>
            </a>
          </li>
          <li>
            <a href="icons-boxicons.html">
              <i class="bi bi-circle"></i><span>Boxicons</span>
            </a>
          </li>
        </ul>
      </li><!-- End Icons Nav -->

      <li class="nav-heading">Pages</li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="users-profile.html">
          <i class="bi bi-person"></i>
          <span>Profile</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-faq.html">
          <i class="bi bi-question-circle"></i>
          <span>F.A.Q</span>
        </a>
      </li><!-- End F.A.Q Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-contact.html">
          <i class="bi bi-envelope"></i>
          <span>Contact</span>
        </a>
      </li><!-- End Contact Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-register.html">
          <i class="bi bi-card-list"></i>
          <span>Register</span>
        </a>
      </li><!-- End Register Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-login.html">
          <i class="bi bi-box-arrow-in-right"></i>
          <span>Login</span>
        </a>
      </li><!-- End Login Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-error-404.html">
          <i class="bi bi-dash-circle"></i>
          <span>Error 404</span>
        </a>
      </li><!-- End Error 404 Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="pages-blank.html">
          <i class="bi bi-file-earmark"></i>
          <span>Blank</span>
        </a>
      </li><!-- End Blank Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->


    <!--Start Main-->

    @yield('content')

    <!--End Main-->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <script>
    var baseUrl = '{{asset('')}}';
        $(document).ready(function() {
            $('.dropdown-menu li').each(function() {
                $(this).click(function(e) {
                    e.stopPropagation();
                });
            });
        });

        // Get new user notification
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

        // Get new user notification


        // Move Notification to stack
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
        // Move Notification to stack
        
        // changeNotificationStatus
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

                var route = `{{ route('dashboard.lists', ['userId' => Auth::user()->id, 'board_id' => ':boardId']) }}`;
                route = route.replace(':boardId', data.board.id);
                
                $('#user-boards').append(`
                    <div class="col-lg-4" role="button">
                        <a href="${route}">
                            <div class="board my-3">
                                <div class="board-body p-3">
                                    <div class="d-flex justify-content-between mb-3">
                                        <h5 class="board-title">${data.board.name}</h5>
                                        <i class="fa-solid fa-ellipsis"></i>
                                    </div>
                                    <p class="board-description">${data.board.description}</p>
                                </div>
                            </div>  
                        </a>
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

        // changeNotificationStatus
        
        // showNotification
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
        // showNotification

        // Delete Notification
          
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
          
        // Delete Notification
  
  </script>
  <!-- Vendor JS Files -->
  {{-- <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> --}}
  {{-- <script src="{{asset('assets/vendor/jquery/jquery-3.7.1.min')}}"></script> --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>
  <script src="{{asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{asset('assets/vendor/sweetalert/sweetalert.min.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{asset('assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{asset('assets/vendor/quill/quill.min.js')}}"></script>
  <script src="{{asset('assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('assets/js/dashboard.js')}}"></script>

  {{-- <script src="{{asset('assets/js/main.js')}}"></script> --}}

</body>

</html>