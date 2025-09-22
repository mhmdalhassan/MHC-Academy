<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title', 'Client Page')</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
            background-color: #0A192F;
            /* tech dark */
            color: #fff;
        }

        main {
            flex: 1;
        }

        /* Header */
        .navbar-custom {
            background-color: rgba(17, 34, 64, 0.9);
            /* opacity */
            transition: transform 0.4s ease, background-color 0.4s ease;
            backdrop-filter: blur(6px);
        }

        .navbar-nav .nav-link {
            color: #fff !important;
            font-weight: 500;
            position: relative;
            transition: all 0.3s ease-in-out;
            padding: 10px 18px;
            margin: 0 6px;
        }

        .navbar-nav .nav-link:hover {
            color: #64FFDA !important;
            transform: scale(1.08);
        }

        /* Active underline */
        .navbar-nav .nav-link.active::after {
            content: "";
            position: absolute;
            bottom: -6px;
            left: 0;
            width: 100%;
            height: 3px;
            background-color: #64FFDA;
            box-shadow: 0 0 6px #64FFDA;
            border-radius: 2px;
        }

        /* Footer */
        footer {
            background-color: #112240;
            color: #fff;
            text-align: center;
            padding: 20px 0;
            margin-top: auto;
        }
    </style>
</head>

<body>

    <!-- Navbar -->
    <nav id="navbar" class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('images/logo.png') }}" alt="Logo" width="55" height="55">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="/">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Courses</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Blogs</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <main class="container-fluid mt-5 pt-5">
        @yield('content')
    </main>


    <!-- Footer -->
    <footer>
        <p>© 2025 MH-Code Academy. All rights reserved.</p>
    </footer>

    <!-- Bootstrap + JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Navbar Scroll Hide/Show -->
    <script>
        let lastScrollTop = 0;
        const navbar = document.getElementById("navbar");

        window.addEventListener("scroll", function () {
            let scrollTop = window.pageYOffset || document.documentElement.scrollTop;

            if (scrollTop > lastScrollTop) {
                navbar.style.transform = "translateY(-100%)"; // hide
            } else {
                navbar.style.transform = "translateY(0)"; // show
            }
            lastScrollTop = scrollTop;
        });
    </script>
</body>

</html>