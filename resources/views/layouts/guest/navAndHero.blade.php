<div class="container-xxl position-relative p-0">
    <nav class="navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
        <a href="{{ route('guests.index') }}" class="navbar-brand p-0" title="الرئيسية">
            <img id="nav-logo" alt="home" src="{{ asset('assets/img/logo.png') }}">
        </a>
        @if (Route::has('login'))
            <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                @auth
                    <div class="px-4 mx-3">
                        <a href="{{ route('dashboard.index') }}"
                            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 btn btn-primary edit-bg-secondry">لوحة
                            التحكم</a>
                    </div>
                @else
                    <div class="px-4 mx-3">
                        <a href="{{ route('login') }}"
                            class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500 btn btn-primary edit-bg-secondry">تسجيل
                            الدخول</a>
                    </div>
                @endauth
            </div>
        @endif
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="fa fa-bars"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav me-auto py-0">
                <a href="{{ route('guests.index') }}"
                    class="nav-item nav-link fw-bold {{ Route::is('guests.index') ? 'active' : '' }}">الرئيسية</a>
                <a href="{{ route('guests.about') }}"
                    class="nav-item nav-link fw-bold {{ Route::is('guests.about') ? 'active' : '' }}">عن
                    إنجاز</a>
                <a href="{{ route('guests.services') }}"
                    class="nav-item nav-link fw-bold {{ Route::is('guests.services') ? 'active' : '' }}">الخدمات</a>
                <a href="{{ route('guests.testimonial') }}"
                    class="nav-item nav-link fw-bold {{ Route::is('guests.testimonial') ? 'active' : '' }}">عملائنا</a>
                <a href="{{ route('guests.team') }}"
                    class="nav-item nav-link fw-bold {{ Route::is('guests.team') ? 'active' : '' }}">الأعضاء</a>
                <a href="{{ route('guests.contact') }}"
                    class="nav-item nav-link fw-bold {{ Route::is('guests.contact') ? 'active' : '' }}">تواصل
                    معنا</a>
            </div>
            <button type="button" class="btn edit-text-secondary me-3" data-bs-toggle="modal"
                data-bs-target="#searchModal"><i class="fa fa-search"></i></button>
        </div>
    </nav>
    @yield('homehero')
    @yield('pageshero')
</div>
