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
            <a class="nav-link nav-profile d-flex gap-2 align-items-center ps-4 justify-content-end" href="#"
                data-bs-toggle="dropdown">
                <img src="{{ 'https://www.gravatar.com/avatar/' . md5(strtolower(trim(Auth::user()->email))) . '?d=mp' }}"
                    alt="Profile" class="rounded-circle">
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
                    <a href="{{ route('viewGetUserProfile', ['userId' => Auth::user()->id]) }}"
                        class="dropdown-item d-flex align-items-center">
                        <i class="bi bi-person"></i>
                        <span>ملفي الشخصي</span>
                    </a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li>
                    <a href="{{ route('viewGetUserBoards', ['userId' => Auth::user()->id]) }}"
                        class="dropdown-item d-flex align-items-center">
                        <i class="bi bi-person"></i>
                        <span>اللوحات</span>
                    </a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li>
                    <a href="{{ route('viewGetUserCards', ['userId' => Auth::user()->id]) }}"
                        class="dropdown-item d-flex align-items-center">
                        <i class="bi bi-person"></i>
                        <span>المهام</span>
                    </a>
                </li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li>
                    <a href="{{ route('account.settings', ['userId' => Auth::user()->id]) }}"
                        class="dropdown-item d-flex align-items-center" href="users-profile.html">
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
</nav>
