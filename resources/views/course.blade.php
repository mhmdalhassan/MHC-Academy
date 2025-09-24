@extends('client.app')

@section('content')
    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Intro -->
    <div class="container text-center my-5">
        <h1 class="fw-bold display-3 text-info mb-3">We Provide Courses in Web, Mobile, AI & More</h1>
        <p class="lead fs-4 text-light">Choose your path, learn hands-on, and build real projects with us.</p>
    </div>

    <!-- Search + Category -->
    <div class="container mb-5" data-aos="fade-up" data-aos-duration="900">
        <form id="searchForm" method="GET" action="{{ route('course') }}" class="row justify-content-center g-3">
            <!-- Animated Search -->
            <div class="col-lg-7">
                <div id="search">
                    <svg viewBox="0 0 420 60" xmlns="http://www.w3.org/2000/svg">
                        <rect class="bar" />
                        <g class="magnifier">
                            <circle class="glass" />
                            <line class="handle" x1="32" y1="32" x2="44" y2="44"></line>
                        </g>
                        <g class="sparks">
                            <circle class="spark" />
                            <circle class="spark" />
                            <circle class="spark" />
                        </g>
                        <g class="burst pattern-one">
                            <circle class="particle circle" />
                            <path class="particle triangle" />
                            <circle class="particle circle" />
                            <path class="particle plus" />
                            <rect class="particle rect" />
                            <path class="particle triangle" />
                        </g>
                        <g class="burst pattern-two">
                            <path class="particle plus" />
                            <circle class="particle circle" />
                            <path class="particle triangle" />
                            <rect class="particle rect" />
                            <circle class="particle circle" />
                            <path class="particle plus" />
                        </g>
                        <g class="burst pattern-three">
                            <circle class="particle circle" />
                            <rect class="particle rect" />
                            <path class="particle plus" />
                            <path class="particle triangle" />
                            <rect class="particle rect" />
                            <path class="particle plus" />
                        </g>
                    </svg>
                    <input type="search" name="q" value="{{ request('q') }}" placeholder="Search courses..."
                        aria-label="Search" />
                </div>
            </div>

            <!-- Category -->
            <div class="col-lg-3">
                <select name="category" class="form-select form-select-lg shadow rounded-3 fw-bold"
                    onchange="this.form.submit()" style="z-index:1000; min-height:60px;">
                    <option value="All" {{ (request('category', 'All') === 'All') ? 'selected' : '' }}>All Categories</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat }}" {{ (request('category') === $cat) ? 'selected' : '' }}>{{ $cat }}</option>
                    @endforeach
                </select>
            </div>
        </form>
    </div>

    <!-- Courses Section -->
    <section class="container my-5 py-4 rounded-4" style="background-color:#1A2A80;">
        <div class="row g-4" id="coursesContainer">
            @forelse($products as $product)
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 course-card-wrapper" data-aos="fade-up" data-aos-duration="900">
                    <a href="{{ route('course.description', $product->id) }}" class="text-decoration-none">
                        <div class="course-card position-relative overflow-hidden rounded-4 h-100 p-3">
                            <!-- Image -->
                            @if($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                    class="img-fluid rounded-3 mb-3" loading="lazy"
                                    style="height:180px; width:100%; object-fit:cover;">
                            @else
                                <div class="rounded-3 mb-3"
                                    style="height:180px; background:linear-gradient(135deg,#2b3e82,#3d5cb8)"></div>
                            @endif

                            <!-- Title -->
                            <h5 class="fw-bold text-white mb-2">{{ $product->name }}</h5>
                            <div class="text-light small mb-2">Duration: {{ $product->duration }}
                                {{ $product->duration > 1 ? 'months' : 'month' }}
                            </div>

                            <!-- Price -->
                            <div class="d-flex justify-content-center align-items-center gap-2">
                                <div class="price-tag px-3 py-1 rounded-pill fw-bold text-success bg-light">
                                    ${{ number_format($product->price, 2) }}
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-12">
                    <div class="p-4 rounded-4 bg-light text-center text-muted">No courses found.</div>
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        <div class="mt-4 d-flex justify-content-center">
            @if ($products->hasPages())
                {{ $products->appends(request()->query())->links('vendor.pagination.bootstrap-5') }}
            @endif
        </div>
    </section>

    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ once: true, duration: 800 });
    </script>

    <!-- Styles -->
    <style>
        /* Prevent select hiding */
        select.form-select {
            position: relative;
            z-index: 2000;
        }

        /* Course card */
        .course-card {
            background: #3B38A0;
            transition: transform .32s ease, box-shadow .32s ease;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.25);
            min-height: 320px;
        }

        .course-card:hover {
            transform: scale(1.05);
            box-shadow: 0 24px 50px rgba(0, 0, 0, 0.4);
        }

        /* Search box SVG */
        #search {
            display: grid;
            grid-template: "search" 60px / 100%;
            justify-items: stretch;
            align-items: stretch;
        }

        #search input {
            grid-area: search;
            border: none;
            border-radius: 50px;
            padding: 0 30px 0 60px;
            font-size: 18px;
            background: #fff;
        }

        #search svg {
            grid-area: search;
            overflow: visible;
            color: hsl(215, 100%, 50%);
            fill: none;
            stroke: currentColor;
        }

        /* Reuse your animation styles */
        .spark {
            fill: currentColor;
            stroke: none;
            r: 15;
        }
    </style>
@endsection
