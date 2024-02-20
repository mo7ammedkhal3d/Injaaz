<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    {{-- style files and meta and ... --}}
    @include('layouts.dashboard.headDashboard')
</head>

<body class="toggle-sidebar">

    <!-- ======= Header ======= -->
    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="{{ route('dashboard.index', ['userId' => Auth::user()->id]) }}"
                class="logo d-flex align-items-center">
                <img src="{{ asset('assets/img/logo.png') }}" alt="">
            </a>
        </div><!-- End Logo -->

        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="POST" action="#">
                <input type="text" name="query" placeholder="ابحث" title="ادخل كلمة مفتاحية">
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div>
        <!-- End Search Bar -->

        @include('layouts.dashboard.navDashboard')
        <!-- End Icons Navigation -->

    </header>
    <!-- End Header -->

    <!--Start Main-->

    @yield('content')

    <!--End Main-->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    {{-- Scripts --}}
    @include('layouts.dashboard.scriptsDashboard')
</body>

</html>
