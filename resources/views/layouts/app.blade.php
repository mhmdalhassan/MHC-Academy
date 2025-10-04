<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <link rel="icon" type="image/png" href="{{ asset('images/favicon-96x96.png') }}" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/favicon.svg') }}" />
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images/apple-touch-icon.png') }}" />


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <style>
        :root {
            --sidebar-bg: #113F67;
            --sidebar-hover: #3A6D8C;
            --sidebar-active: #2a5a7a;
            --header-bg: #ffffff;
            --content-bg: #f8fafc;
            --text-light: #ffffff;
            --text-dark: #333333;
            --border-color: #e0e0e0;
            --shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }

        body {
            background-color: var(--content-bg);
            font-family: 'Nunito', sans-serif;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
        }

        /* Layout */
        .dashboard-container {
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 260px;
            background-color: var(--sidebar-bg);
            color: var(--text-light);
            transition: var(--transition);
            position: fixed;
            height: 100vh;
            overflow-y: auto;
            z-index: 1000;
            box-shadow: var(--shadow);
        }

        .sidebar.collapsed {
            width: 70px;
        }

        .sidebar-header {
            padding: 20px 15px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .sidebar-header .logo {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sidebar-header .logo img {
            width: 120px;
            height: auto;
            transition: var(--transition);
        }

        .sidebar.collapsed .sidebar-header .logo img {
            width: 40px;
        }

        .toggle-btn {
            background: none;
            border: none;
            color: var(--text-light);
            font-size: 18px;
            cursor: pointer;
            transition: var(--transition);
        }

        .toggle-btn:hover {
            color: var(--sidebar-hover);
        }

        .sidebar-menu {
            padding: 15px 0;
        }

        .menu-item {
            padding: 12px 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            color: var(--text-light);
            text-decoration: none;
            transition: var(--transition);
            border-left: 3px solid transparent;
            white-space: nowrap;
        }

        .menu-item:hover {
            background-color: var(--sidebar-hover);
            border-left-color: var(--sidebar-hover);
        }

        .menu-item.active {
            background-color: var(--sidebar-active);
            border-left-color: var(--text-light);
        }

        .menu-item i {
            font-size: 18px;
            width: 24px;
            text-align: center;
        }

        .menu-text {
            transition: var(--transition);
            overflow: hidden;
        }

        .sidebar.collapsed .menu-text {
            opacity: 0;
            width: 0;
        }

        .menu-divider {
            height: 1px;
            background-color: rgba(255, 255, 255, 0.1);
            margin: 10px 20px;
        }

        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: 260px;
            transition: var(--transition);
            min-width: 0;
            /* Prevent overflow on small screens */
        }

        .main-content.expanded {
            margin-left: 70px;
        }

        /* Top Header */
        .top-header {
            background-color: var(--header-bg);
            padding: 15px 25px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .page-title h1 {
            margin: 0;
            font-size: 24px;
            color: var(--text-dark);
        }

        .user-menu {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-name {
            font-weight: 600;
        }

        .dropdown-menu {
            background-color: var(--header-bg);
            border: 1px solid var(--border-color);
            box-shadow: var(--shadow);
        }

        .dropdown-item {
            padding: 8px 16px;
            transition: var(--transition);
        }

        .dropdown-item:hover {
            background-color: #f8f9fa;
        }

        /* Content Area */
        .content-area {
            padding: 25px;
        }

        .card {
            background-color: var(--header-bg);
            border-radius: 10px;
            box-shadow: var(--shadow);
            border: none;
            margin-bottom: 20px;
            overflow: hidden;
            /* Prevent content overflow */
        }

        .card-header {
            background-color: transparent;
            border-bottom: 1px solid var(--border-color);
            padding: 15px 20px;
            font-weight: 600;
        }

        .card-body {
            padding: 20px;
            overflow-x: auto;
            /* Allow horizontal scroll for tables */
        }

        /* Table Responsive */
        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
            /* Smooth scrolling on iOS */
        }

        /* Mobile Overlay */
        .mobile-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
        }

        .mobile-overlay.active {
            display: block;
        }

        /* Mobile Menu Button */
        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            font-size: 20px;
            color: var(--text-dark);
            cursor: pointer;
            margin-right: 15px;
        }

        /* ========== RESPONSIVE BREAKPOINTS ========== */

        /* Large Tablets (992px and below) */
        @media (max-width: 992px) {
            .sidebar {
                width: 70px;
                transform: translateX(0);
            }

            .sidebar .menu-text {
                opacity: 0;
                width: 0;
            }

            .sidebar-header .logo img {
                width: 40px;
            }

            .main-content {
                margin-left: 70px;
            }

            .sidebar.mobile-open {
                width: 260px;
                transform: translateX(0);
            }

            .sidebar.mobile-open .menu-text {
                opacity: 1;
                width: auto;
            }

            .sidebar.mobile-open .sidebar-header .logo img {
                width: 120px;
            }

            .mobile-menu-btn {
                display: block;
            }

            .content-area {
                padding: 20px;
            }

            .page-title h1 {
                font-size: 22px;
            }
        }

        /* Tablets (768px and below) */
        @media (max-width: 768px) {
            .main-content {
                margin-left: 0;
            }

            .sidebar {
                transform: translateX(-100%);
                width: 260px;
            }

            .sidebar.mobile-open {
                transform: translateX(0);
            }

            .sidebar-header .logo img {
                width: 120px;
            }

            .sidebar .menu-text {
                opacity: 1;
                width: auto;
            }

            .top-header {
                padding: 12px 20px;
            }

            .content-area {
                padding: 15px;
            }

            .card-body {
                padding: 15px;
            }

            .page-title h1 {
                font-size: 20px;
            }

            .user-name {
                font-size: 14px;
            }
        }

        /* Phones (576px and below) */
        @media (max-width: 576px) {
            .top-header {
                padding: 10px 15px;
                flex-wrap: wrap;
            }

            .header-left {
                display: flex;
                align-items: center;
                width: 100%;
                margin-bottom: 10px;
            }

            .page-title {
                flex: 1;
            }

            .page-title h1 {
                font-size: 18px;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
            }

            .user-menu {
                width: 100%;
                justify-content: space-between;
            }

            .content-area {
                padding: 10px;
            }

            .card {
                margin-bottom: 15px;
                border-radius: 8px;
            }

            .card-header {
                padding: 12px 15px;
                font-size: 16px;
            }

            .card-body {
                padding: 12px 15px;
            }

            .user-name {
                display: none;
            }

            /* Button adjustments for mobile */
            .btn {
                padding: 6px 12px;
                font-size: 14px;
            }

            /* Form adjustments for mobile */
            .form-control {
                font-size: 14px;
            }

            /* Table adjustments for mobile */
            .table {
                font-size: 14px;
            }

            .table th,
            .table td {
                padding: 8px;
            }
        }

        /* Small Phones (400px and below) */
        @media (max-width: 400px) {
            .top-header {
                padding: 8px 10px;
            }

            .content-area {
                padding: 8px;
            }

            .page-title h1 {
                font-size: 16px;
            }

            .mobile-menu-btn {
                margin-right: 10px;
                font-size: 18px;
            }

            .card-header {
                padding: 10px 12px;
                font-size: 15px;
            }

            .card-body {
                padding: 10px 12px;
            }

            /* Stack buttons on very small screens */
            .btn-group-vertical .btn {
                margin-bottom: 5px;
            }
        }

        /* Landscape mode on phones */
        @media (max-height: 500px) and (max-width: 992px) {
            .sidebar {
                overflow-y: auto;
            }

            .sidebar-header {
                padding: 15px 15px;
            }

            .menu-item {
                padding: 10px 20px;
            }
        }

        /* High-resolution displays */
        @media (-webkit-min-device-pixel-ratio: 2),
        (min-resolution: 192dpi) {
            .sidebar-header .logo img {
                image-rendering: -webkit-optimize-contrast;
            }
        }

        /* Submenu Items (Home Page Manage) */
        .submenu-item {
            padding: 10px 40px;
            display: flex;
            align-items: center;
            gap: 10px;
            color: var(--text-light);
            text-decoration: none;
            transition: var(--transition);
            border-left: 3px solid transparent;
            font-size: 14px;
        }

        .submenu-item:hover {
            background-color: var(--sidebar-hover);
            border-left-color: var(--sidebar-hover);
        }

        .submenu-item.active {
            background-color: var(--sidebar-active);
            border-left-color: var(--text-light);
        }
    </style>
</head>

<body>
    <div id="app">
        @guest
            <!-- Original layout for guest users -->
            <nav class="navbar navbar-expand-md shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="/">
                        <img src="{{ asset('images/logo.png') }}" alt="MH-Code Academy Logo" width="120" height="55">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto"></ul>

                        {{-- <ul class="navbar-nav ms-auto">
                            @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}"
                                    href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @endif
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link {{ request()->routeIs('register') ? 'active' : '' }}"
                                    href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                            @endif
                        </ul> --}}
                    </div>
                </div>
            </nav>

            <main class="py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    @yield('content')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        @else
            <!-- New dashboard layout for authenticated users -->
            <div class="dashboard-container">


                <!-- =========================Sidebar====================== -->
                <div class="sidebar" id="sidebar">

                    {{-- =========================header======================= --}}
                    <div class="sidebar-header">
                        <div class="logo">
                            <img src="{{ asset('images/logo.png') }}" alt="MH-Code Academy Logo">
                        </div>
                        <button class="toggle-btn" id="toggleSidebar">
                            <i class="fas fa-bars"></i>
                        </button>
                    </div>

                    <div class="sidebar-menu">

                        {{-- ======================Manage Users========================== --}}

                        @can('user-list')
                            <a href="{{ route('users.index') }}"
                                class="menu-item {{ request()->routeIs('users.*') ? 'active' : '' }}">
                                <i class="fas fa-users"></i>
                                <span class="menu-text">Manage Users</span>
                            </a>
                        @endcan

                        {{-- =========================Manage Roles======================= --}}

                        @can('role-list')
                            <a href="{{ route('roles.index') }}"
                                class="menu-item {{ request()->routeIs('roles.*') ? 'active' : '' }}">
                                <i class="fas fa-user-tag"></i>
                                <span class="menu-text">Manage Roles</span>
                            </a>
                        @endcan

                        {{-- =========================Manage Product Page======================= --}}
                        @canany(['product-list', 'internal-course-list', 'instructor-list', 'student-review-list'])
                            <div class="menu-dropdown">
                                <a href="#" class="menu-item dropdown-toggle" data-bs-toggle="collapse"
                                    data-bs-target="#productPageMenu"
                                    aria-expanded="{{ request()->routeIs('products.*') || request()->routeIs('internal-courses.*') || request()->routeIs('instructors.*') || request()->routeIs('student-reviews.*') ? 'true' : 'false' }}">
                                    <i class="fas fa-box-open"></i>
                                    <span class="menu-text">Manage Product Page</span>
                                </a>
                                <div id="productPageMenu"
                                    class="collapse {{ request()->routeIs('products.*') || request()->routeIs('internal-courses.*') || request()->routeIs('instructors.*') || request()->routeIs('student-reviews.*') ? 'show' : '' }}">

                                    @can('product-list')
                                        <a href="{{ route('products.index') }}"
                                            class="submenu-item {{ request()->routeIs('products.*') ? 'active' : '' }}">
                                            <i class="fas fa-box"></i>
                                            <span class="menu-text">Manage Products</span>
                                        </a>
                                    @endcan

                                    @can('internal-course-list')
                                        <a href="{{ route('internal-courses.index') }}"
                                            class="submenu-item {{ request()->routeIs('internal-courses.*') ? 'active' : '' }}">
                                            <i class="fas fa-chalkboard-teacher"></i>
                                            <span class="menu-text">Manage Internal Courses</span>
                                        </a>
                                    @endcan

                                    @can('instructor-list')
                                        <a href="{{ route('instructors.index') }}"
                                            class="submenu-item {{ request()->routeIs('instructors.*') ? 'active' : '' }}">
                                            <i class="fas fa-chalkboard-teacher"></i>
                                            <span class="menu-text">Manage Instructors</span>
                                        </a>
                                    @endcan

                                    @can('student-review-list')
                                        <a href="{{ route('student-reviews.index') }}"
                                            class="submenu-item {{ request()->routeIs('student-reviews.*') ? 'active' : '' }}">
                                            <i class="fas fa-user-graduate"></i>
                                            <span class="menu-text">Manage Student Reviews</span>
                                        </a>
                                    @endcan
                                </div>
                            </div>
                        @endcanany


                        {{-- =========================Manage Blogs======================= --}}

                        @can('blog-list')
                            <a href="{{ route('blogs.index') }}"
                                class="menu-item {{ request()->routeIs('blogs.*') ? 'active' : '' }}">
                                <i class="fas fa-blog"></i>
                                <span class="menu-text">Manage Blogs</span>
                            </a>
                        @endcan


                        {{-- =========================Requests======================= --}}

                        @can('request-list')
                            <a href="{{ route('requests.index') }}"
                                class="menu-item {{ request()->routeIs('requests.*') ? 'active' : '' }}">
                                <i class="fas fa-clipboard-list"></i>
                                <span class="menu-text">Requests</span>
                            </a>
                        @endcan

                        {{-- =========================Home Page Manage======================= --}}
                        @canany(['feature-list', 'footer-list', 'hero-section-list', 'home-statistic-list', 'course-track-list'])
                            <div class="menu-dropdown">
                                <a href="#" class="menu-item dropdown-toggle" data-bs-toggle="collapse"
                                    data-bs-target="#homePageMenu"
                                    aria-expanded="{{ request()->routeIs('features.*') || request()->routeIs('footer.*') || request()->routeIs('hero-sections.*') || request()->routeIs('home-statistics.*') || request()->routeIs('course-tracks.*') ? 'true' : 'false' }}">
                                    <i class="fas fa-home"></i>
                                    <span class="menu-text">Manage Home Page </span>
                                </a>
                                <div id="homePageMenu"
                                    class="collapse {{ request()->routeIs('features.*') || request()->routeIs('footer.*') || request()->routeIs('hero-sections.*') || request()->routeIs('home-statistics.*') || request()->routeIs('course-tracks.*') ? 'show' : '' }}">

                                    @can('feature-list')
                                        <a href="{{ route('features.index') }}"
                                            class="submenu-item {{ request()->routeIs('features.*') ? 'active' : '' }}">
                                            <i class="fas fa-star"></i>
                                            <span class="menu-text">Manage Features</span>
                                        </a>
                                    @endcan

                                    @can('footer-list')
                                        <a href="{{ route('footer.index') }}"
                                            class="submenu-item {{ request()->routeIs('footer.*') ? 'active' : '' }}">
                                            <i class="fas fa-shoe-prints"></i>
                                            <span class="menu-text">Manage Footer</span>
                                        </a>
                                    @endcan

                                    @can('hero-section-list')
                                        <a href="{{ route('hero-sections.index') }}"
                                            class="submenu-item {{ request()->routeIs('hero-sections.*') ? 'active' : '' }}">
                                            <i class="fas fa-heading"></i>
                                            <span class="menu-text">Manage Hero Section</span>
                                        </a>
                                    @endcan

                                    @can('home-statistic-list')
                                        <a href="{{ route('home-statistics.index') }}"
                                            class="submenu-item {{ request()->routeIs('home-statistics.*') ? 'active' : '' }}">
                                            <i class="fas fa-chart-line"></i>
                                            <span class="menu-text">Manage Home Statistics</span>
                                        </a>
                                    @endcan

                                    @can('course-track-list')
                                        <a href="{{ route('course-tracks.index') }}"
                                            class="submenu-item {{ request()->routeIs('course-tracks.*') ? 'active' : '' }}">
                                            <i class="fas fa-graduation-cap"></i>
                                            <span class="menu-text">Manage Course Tracks</span>
                                        </a>
                                    @endcan

                                    @can('service-list')
                                        <a href="{{ route('services.index') }}"
                                            class="submenu-item {{ request()->routeIs('services.*') ? 'active' : '' }}">
                                            <i class="fas fa-code"></i>
                                            <span class="menu-text">Manage Home services</span>
                                        </a>
                                    @endcan


                                    @can('image-list')
                                        <a href="{{ route('home-banner.index') }}"
                                            class="submenu-item {{ request()->routeIs('home-banner.*') ? 'active' : '' }}">
                                            <i class="fas fa-code"></i>
                                            <span class="menu-text">Manage Home banner</span>
                                        </a>
                                    @endcan



                                </div>
                            </div>
                        @endcanany


                        {{-- =========================logout======================= --}}

                        <div class="menu-divider"></div>

                        <a href="{{ route('logout') }}" class="menu-item"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-out-alt"></i>
                            <span class="menu-text">Logout</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>

                <!-- Mobile Overlay -->
                <div class="mobile-overlay" id="mobileOverlay"></div>

                <!-- Main Content -->
                <div class="main-content" id="mainContent">
                    <!-- Top Header -->
                    <div class="top-header">
                        <div class="header-left">
                            <button class="mobile-menu-btn" id="mobileMenuBtn">
                                <i class="fas fa-bars"></i>
                            </button>
                            <div class="page-title">
                                <h1>@yield('page-title', 'Dashboard')</h1>
                            </div>
                        </div>

                        <div class="user-menu">
                            <div class="user-info">
                                <span class="user-name">{{ Auth::user()->name }}</span>
                            </div>

                            <div class="dropdown">
                                <button class="btn btn-light dropdown-toggle" type="button" id="userDropdown"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fas fa-user"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fas fa-sign-out-alt me-2"></i> Logout
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- Content Area -->
                    <div class="content-area">
                        @yield('content')
                    </div>
                </div>
            </div>
        @endguest
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('mainContent');
            const toggleBtn = document.getElementById('toggleSidebar');
            const mobileMenuBtn = document.getElementById('mobileMenuBtn');
            const mobileOverlay = document.getElementById('mobileOverlay');

            // Function to toggle sidebar
            function toggleSidebar() {
                if (window.innerWidth <= 768) {
                    // Mobile behavior - slide in/out
                    sidebar.classList.toggle('mobile-open');
                    mobileOverlay.classList.toggle('active');
                } else if (window.innerWidth <= 992) {
                    // Tablet behavior - collapse/expand
                    sidebar.classList.toggle('collapsed');
                    if (mainContent) {
                        mainContent.classList.toggle('expanded');
                    }
                } else {
                    // Desktop behavior - collapse/expand
                    sidebar.classList.toggle('collapsed');
                    if (mainContent) {
                        mainContent.classList.toggle('expanded');
                    }
                }
            }

            // Toggle sidebar on button click
            if (toggleBtn) {
                toggleBtn.addEventListener('click', toggleSidebar);
            }

            // Mobile menu button click
            if (mobileMenuBtn) {
                mobileMenuBtn.addEventListener('click', function () {
                    sidebar.classList.add('mobile-open');
                    mobileOverlay.classList.add('active');
                });
            }

            // Close sidebar when clicking on overlay (mobile)
            if (mobileOverlay) {
                mobileOverlay.addEventListener('click', function () {
                    sidebar.classList.remove('mobile-open');
                    mobileOverlay.classList.remove('active');
                });
            }

            // Auto-close sidebar on mobile when menu item is clicked
            const menuItems = document.querySelectorAll('.menu-item');
            menuItems.forEach(item => {
                item.addEventListener('click', function () {
                    if (window.innerWidth <= 768) {
                        sidebar.classList.remove('mobile-open');
                        mobileOverlay.classList.remove('active');
                    }
                });
            });

            // Handle window resize
            window.addEventListener('resize', function () {
                if (window.innerWidth > 768) {
                    // Reset mobile states when resizing to larger screens
                    sidebar.classList.remove('mobile-open');
                    mobileOverlay.classList.remove('active');
                }

                if (window.innerWidth > 992) {
                    // Ensure sidebar is visible on desktop
                    sidebar.classList.remove('collapsed');
                    if (mainContent) {
                        mainContent.classList.remove('expanded');
                    }
                }
            });

            // Close sidebar when pressing Escape key
            document.addEventListener('keydown', function (event) {
                if (event.key === 'Escape') {
                    sidebar.classList.remove('mobile-open');
                    mobileOverlay.classList.remove('active');
                }
            });
        });
    </script>
</body>

</html>
