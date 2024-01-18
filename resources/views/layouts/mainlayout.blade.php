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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js" integrity="sha512-WMEKGZ7L5LWgaPeJtw9MBM4i5w5OSBlSjTjCtSnvFJGSVD26gE5+Td12qN5pvWXhuWaWcVwF++F7aqu9cvqP0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="ابحث" title="ادخل كلمة مفتاحية">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav me-auto">
      <ul class="d-flex align-items-center gap-4">

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

        <li class="nav-item dropdown ms-4 nav-user-info">
          <a class="nav-link nav-profile d-flex gap-2 align-items-center ps-4 justify-content-end" href="#" data-bs-toggle="dropdown">
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