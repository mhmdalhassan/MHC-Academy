<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'MH-Code Academy')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        :root {
            /* Enhanced Blue Color Palette */
            --primary-dark: #0A1A35;
            --primary-medium: #1A3A5F;
            --primary-light: #2A5A8F;
            --accent-blue: #4A90E2;
            --accent-teal: #2EC4B6;
            --text-light: #E8F1F8;
            --text-muted: #A8C6E0;
            --gradient-dark: linear-gradient(135deg, #0A1A35 0%, #1A3A5F 100%);
            --gradient-medium: linear-gradient(135deg, #1A3A5F 0%, #2A5A8F 100%);
        }

        html,
        body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
            background-color: var(--primary-dark);
            color: var(--text-light);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        main {
            flex: 1;
            padding-top: 80px;
            /* Account for fixed navbar */
        }

        /* Enhanced Header */
        .navbar-custom {
            background: var(--gradient-dark);
            transition: all 0.4s ease;
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
            padding: 10px 0;
        }

        .navbar-brand img {
            transition: transform 0.3s ease;
        }

        .navbar-brand:hover img {
            transform: scale(1.05);
        }

        .navbar-nav .nav-link {
            color: var(--text-light) !important;
            font-weight: 600;
            position: relative;
            transition: all 0.3s ease-in-out;
            padding: 10px 18px;
            margin: 0 6px;
            border-radius: 4px;
        }

        .navbar-nav .nav-link:hover {
            color: var(--accent-teal) !important;
            background-color: rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
        }

        /* Enhanced Active State */
        .navbar-nav .nav-link.active {
            color: var(--accent-teal) !important;
            background-color: rgba(74, 144, 226, 0.15);
        }

        .navbar-nav .nav-link.active::after {
            content: "";
            position: absolute;
            bottom: -6px;
            left: 50%;
            transform: translateX(-50%);
            width: 60%;
            height: 3px;
            background-color: var(--accent-teal);
            box-shadow: 0 0 8px var(--accent-teal);
            border-radius: 2px;
        }

        /* Enhanced Footer */
        .footer-custom {
            background: var(--gradient-medium);
            color: var(--text-light);
            padding: 40px 0 20px;
            margin-top: auto;
        }

        .footer-custom h5,
        .footer-custom h6 {
            color: var(--accent-teal);
            margin-bottom: 15px;
        }

        .footer-custom a {
            color: var(--text-muted);
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .footer-custom a:hover {
            color: var(--accent-teal);
            padding-left: 5px;
        }

        .footer-custom .social-icons a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            transition: all 0.3s ease;
        }

        .footer-custom .social-icons a:hover {
            background-color: var(--accent-blue);
            transform: translateY(-3px);
            color: white !important;
        }

        .footer-divider {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            margin: 30px 0 20px;
        }

        /* Content Enhancements */
        .content-section {
            background: var(--gradient-medium);
            border-radius: 10px;
            padding: 30px;
            margin-bottom: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .btn-academy {
            background: linear-gradient(135deg, var(--accent-blue), var(--accent-teal));
            border: none;
            color: white;
            font-weight: 600;
            padding: 10px 25px;
            border-radius: 30px;
            transition: all 0.3s ease;
        }

        .btn-academy:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(74, 144, 226, 0.4);
        }

        /* Scrollbar Styling */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: var(--primary-dark);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--accent-blue);
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: var(--accent-teal);
        }
    </style>
</head>

<body>

    <!-- Enhanced Navbar -->
    <nav id="navbar" class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('images/logo.png') }}" alt="MH-Code Academy Logo" width="120" height="55">

            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('course') ? 'active' : '' }}"
                            href="{{ route('course') }}">Courses</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('blog') ? 'active' : '' }}"
                            href="{{ route('client.blog') }}">Blogs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('about') ? 'active' : '' }}"
                            href="{{ route('about') }}">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('contact-us') ? 'active' : '' }}"
                            href="{{ route('contact.index') }}">Contact Us</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <main class="container mt-4">
        @yield('content')
    </main>

    <!-- Enhanced Footer -->
    <footer class="footer-custom">
        <div class="container">
            <div class="row gy-4">
                <!-- Brand and Description -->
                <div class="col-lg-4 col-md-6">
                    <h5>MH-Code Academy</h5>
                    <p class="mb-3">Empowering the next generation of developers through comprehensive coding education,
                        hands-on projects, and career mentorship.</p>
                    <div class="d-flex gap-3">
                        <a href="{{ route('course') }}" class="btn btn-academy btn-sm">Explore Courses</a>
                        <a href="{{ route('contact.index') }}" class="btn btn-outline-light btn-sm">Contact Us</a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="col-lg-2 col-md-6">
                    <h6>Quick Links</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#">Home</a></li>
                        <li class="mb-2"><a href="#">All Courses</a></li>
                        <li class="mb-2"><a href="#">Blog</a></li>
                        <li class="mb-2"><a href="#">About Us</a></li>
                        <li class="mb-2"><a href="#">Contact</a></li>
                    </ul>
                </div>

                <!-- Courses -->
                <div class="col-lg-3 col-md-6">
                    <h6>Popular Courses</h6>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#">Web Development</a></li>
                        <li class="mb-2"><a href="#">Python Programming</a></li>
                        <li class="mb-2"><a href="#">Data Science</a></li>
                        <li class="mb-2"><a href="#">Mobile App Development</a></li>
                        <li class="mb-2"><a href="#">UI/UX Design</a></li>
                    </ul>
                </div>

                <!-- Contact & Social -->
                <div class="col-lg-3 col-md-6">
                    <h6>Connect With Us</h6>
                    <p class="small mb-3"><i class="bi bi-envelope me-2"></i> mhcacadimy@gmail.com</p>
                    <p class="small mb-3"><i class="bi bi-telephone me-2"></i> +961 76 179 450</p>

                    <div class="social-icons d-flex gap-3 mt-3">
                        <a href="#"><i class="bi bi-linkedin"></i></a>
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-twitter-x"></i></a>
                        <a href="#"><i class="bi bi-youtube"></i></a>
                        <a href="#"><i class="bi bi-github"></i></a>
                    </div>
                </div>
            </div>

            <div class="footer-divider"></div>

            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0 small">&copy; {{ date('Y') }} MH-Code Academy. All Rights Reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <a href="#" class="small me-3">Privacy Policy</a>
                    <a href="#" class="small">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap + JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Enhanced Navbar Scroll Behavior -->
    <script>
        let lastScrollTop = 0;
        const navbar = document.getElementById("navbar");
        const navbarHeight = navbar.offsetHeight;

        window.addEventListener("scroll", function () {
            let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

            if (scrollTop > lastScrollTop && scrollTop > navbarHeight) {
                // Scrolling down
                navbar.style.transform = "translateY(-100%)";
            } else {
                // Scrolling up
                navbar.style.transform = "translateY(0)";

                // Add shadow when scrolled
                if (scrollTop > 10) {
                    navbar.style.boxShadow = "0 4px 20px rgba(0, 0, 0, 0.2)";
                } else {
                    navbar.style.boxShadow = "none";
                }
            }

            lastScrollTop = scrollTop;
        });
    </script>
</body>

</html>
