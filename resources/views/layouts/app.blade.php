<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
        body {
            background-color: #DEE8CE;
            font-family: 'Nunito', sans-serif;
        }

        .navbar {
            background-color: #113F67 !important;
        }

        .navbar .nav-link,
        .navbar .navbar-brand {
            color: #ffffff !important;
            font-weight: bold;
            transition: color 0.3s ease, background-color 0.3s ease;
            border-radius: 6px;
            padding: 8px 14px;
            margin: 0 5px;
            /* space between links */
        }

        .navbar .nav-link:hover,
        .navbar .navbar-brand:hover {
            background-color: #3A6D8C;
            color: #DEE8CE !important;
        }

        /* Active link */
        .navbar .nav-link.active {
            background-color: #3A6D8C;
            color: #DEE8CE !important;
        }

        .dropdown-menu {
            background-color: #113F67;
        }

        .dropdown-menu .dropdown-item {
            color: #ffffff;
            font-weight: bold;
        }

        .dropdown-menu .dropdown-item:hover {
            background-color: #3A6D8C;
            color: #DEE8CE;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        @media (max-width: 768px) {
            .navbar .nav-link {
                display: block;
                margin: 6px 0;
            }

            .card {
                margin: 10px;
            }
        }
    </style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Logo
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto"></ul>

                    <ul class="navbar-nav ms-auto">
                        @guest
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
                        @else
                            @can('user-list')
                                <li><a class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}"
                                        href="{{ route('users.index') }}">Manage Users</a></li>
                            @endcan
                            @can('role-list')
                                <li><a class="nav-link {{ request()->routeIs('roles.*') ? 'active' : '' }}"
                                        href="{{ route('roles.index') }}">Manage Role</a></li>
                            @endcan
                            @can('product-list')
                                <li><a class="nav-link {{ request()->routeIs('products.*') ? 'active' : '' }}"
                                        href="{{ route('products.index') }}">Manage Product</a></li>
                            @endcan
                            @can('blog-list')
                                <li><a class="nav-link {{ request()->routeIs('blogs.*') ? 'active' : '' }}"
                                        href="{{ route('blogs.index') }}">Manage Blogs</a></li>
                            @endcan
                            @can('feature-list')
                                <li><a class="nav-link {{ request()->routeIs('features.*') ? 'active' : '' }}"
                                        href="{{ route('features.index') }}">Manage Features</a></li>
                            @endcan
                            @can('offer-list')
                                <li><a class="nav-link {{ request()->routeIs('offers.*') ? 'active' : '' }}"
                                        href="{{ route('offers.index') }}">Manage Offers</a></li>
                            @endcan
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
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
    </div>
</body>

</html>