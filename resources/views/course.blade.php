@extends('client.app')

@section('content')
    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container text-center py-5">
            <h1 class="fw-bold display-4 mb-3" data-aos="fade-up" data-aos-duration="800">Master In-Demand Tech Skills</h1>
            <p class="lead fs-5 mb-4" data-aos="fade-up" data-aos-delay="100" data-aos-duration="800">Choose your path,
                learn hands-on, and build real projects with industry experts.</p>

            <!-- Stats -->
            <div class="row justify-content-center mt-5" data-aos="fade-up" data-aos-delay="200" data-aos-duration="800">
                <div class="col-md-3 col-6 mb-3">
                    <div class="stat-card">
                        <h3 class="fw-bold text-accent">2,500+</h3>
                        <p class="small mb-0">Students Enrolled</p>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-3">
                    <div class="stat-card">
                        <h3 class="fw-bold text-accent">50+</h3>
                        <p class="small mb-0">Expert Instructors</p>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-3">
                    <div class="stat-card">
                        <h3 class="fw-bold text-accent">98%</h3>
                        <p class="small mb-0">Completion Rate</p>
                    </div>
                </div>
                <div class="col-md-3 col-6 mb-3">
                    <div class="stat-card">
                        <h3 class="fw-bold text-accent">1,200+</h3>
                        <p class="small mb-0">Projects Built</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Search + Filter Section -->
    <section class="search-section py-4">
        <div class="container">
            <div class="search-container" data-aos="fade-up" data-aos-duration="900">
                <form id="searchForm" method="GET" action="{{ route('course') }}">
                    <div class="row g-3 align-items-end">
                        <!-- Search Input -->
                        <div class="col-lg-6">
                            <div class="search-box">
                                <i class="bi bi-search search-icon"></i>
                                <input type="search" name="q" value="{{ request('q') }}"
                                    placeholder="Search courses by name, technology, or instructor..." class="search-input"
                                    aria-label="Search courses">
                            </div>
                        </div>

                        <!-- Category Filter -->
                        <div class="col-lg-3">
                            <label class="form-label small text-uppercase fw-bold">Category</label>
                            <select name="category" class="category-select" onchange="this.form.submit()">
                                <option value="All" {{ (request('category', 'All') === 'All') ? 'selected' : '' }}>All
                                    Categories</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat }}" {{ (request('category') === $cat) ? 'selected' : '' }}>{{ $cat }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Level Filter -->
                        <div class="col-lg-3">
                            <label class="form-label small text-uppercase fw-bold">Difficulty</label>
                            <select name="level" class="category-select" onchange="this.form.submit()">
                                <option value="All" {{ (request('level', 'All') === 'All') ? 'selected' : '' }}>All Levels
                                </option>
                                <option value="Beginner" {{ (request('level') === 'Beginner') ? 'selected' : '' }}>Beginner
                                </option>
                                <option value="Intermediate" {{ (request('level') === 'Intermediate') ? 'selected' : '' }}>
                                    Intermediate</option>
                                <option value="Advanced" {{ (request('level') === 'Advanced') ? 'selected' : '' }}>Advanced
                                </option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Courses Section -->
    <section class="courses-section py-5">
        <div class="container">
            <!-- Section Header -->
            <div class="row mb-4">
                <div class="col-md-8">
                    <h2 class="fw-bold mb-2">Featured Courses</h2>
                    <p class="text-white">Hands-on courses designed to get you job-ready</p>

                </div>
                <div class="col-md-4 text-md-end">
                    <div class="d-inline-block bg-primary-dark rounded-pill px-3 py-1">
                        <span class="small fw-bold">{{ $products->total() }} courses available</span>
                    </div>
                </div>
            </div>

            <!-- Courses Grid -->
            <div class="row g-4" id="coursesContainer">
                @forelse($products as $product)
                    @php
                        // determine difficulty value (support both 'difficulty' and older 'level' fields)
                        $difficulty = $product->difficulty ?? $product->level ?? 'Beginner';
                        $difficultySlug = strtolower($difficulty);
                    @endphp

                    <div class="col-12 col-sm-6 col-lg-4 col-xl-3 course-card-wrapper" data-aos="fade-up"
                        data-aos-duration="900" data-aos-delay="{{ $loop->index * 100 }}" data-level="{{ $difficultySlug }}"
                        data-category="{{ $product->category ?? '' }}">
                        <div class="course-card h-100">
                            <a href="{{ route('course.description', $product->id) }}" class="text-decoration-none">
                                <!-- Image -->
                                <div class="course-image-container position-relative">
                                    @if($product->image)
                                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                            class="course-image" loading="lazy">
                                    @else
                                        <div class="course-image-placeholder">
                                            <i class="bi bi-laptop display-4"></i>
                                        </div>
                                    @endif

                                    <!-- Category Badge -->
                                    <div class="course-badge">
                                        {{ $product->category ?? 'Development' }}
                                    </div>

                                    <!-- Difficulty Badge (same color as category) -->
                                    <div class="course-level">
                                        {{ $difficulty }}
                                    </div>
                                </div>

                                <!-- Content -->
                                <div class="course-content p-3">
                                    <h5 class="course-title fw-bold mb-2">{{ $product->name }}</h5>
                                    <p class="course-description small mb-3">
                                        {{ Str::limit($product->detail ?? 'Learn essential skills through hands-on projects and expert guidance.', 80) }}
                                    </p>

                                    <!-- Instructor -->
                                    <div class="instructor-info small mb-3">
                                        <i class="bi bi-person me-1"></i>
                                        <span>By {{ $product->instructor ?? 'Industry Expert' }}</span>
                                    </div>

                                    <!-- Meta Info -->
                                    <div class="course-meta">
                                        <span>
                                            <i class="bi bi-clock me-1"></i>
                                            {{ $product->duration }} {{ $product->duration > 1 ? 'months' : 'month' }}
                                        </span>
                                        <span>
                                            <i class="bi bi-bar-chart me-1"></i>
                                            {{ $product->lessons ?? 0 }} lessons
                                        </span>
                                    </div>

                                    <!-- Rating -->
                                    <div class="rating mb-3">
                                        <span class="rating-stars">
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-half"></i>
                                        </span>
                                        <span class="small text-white ms-1">({{ $product->rating ?? '4.5' }})</span>
                                    </div>

                                    <!-- Price & Action -->
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="course-price fw-bold text-accent">
                                            ${{ number_format($product->price, 2) }}
                                        </div>
                                        <div class="enroll-btn">
                                            <span class="btn btn-sm btn-outline-accent">View Course</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="no-courses text-center py-5" data-aos="fade-up">
                            <i class="bi bi-search display-1 text-white mb-3"></i>
                            <h4 class="fw-bold mb-2">No courses found</h4>
                            <p class="text-white">Try adjusting your search filters or browse all categories</p>
                            <a href="{{ route('course') }}" class="btn btn-accent mt-3">Reset Filters</a>
                        </div>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if ($products->hasPages())
                <div class="mt-5 d-flex justify-content-center" data-aos="fade-up">
                    {{ $products->appends(request()->query())->links('vendor.pagination.bootstrap-5') }}
                </div>
            @endif
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section py-5">
        <div class="container">
            <div class="cta-card rounded-4 p-5 text-center" data-aos="fade-up">
                <h2 class="fw-bold mb-3">Ready to Start Your Coding Journey?</h2>
                <p class="lead mb-4">Join thousands of students who have transformed their careers with our courses</p>
                <div class="d-flex gap-3 justify-content-center flex-wrap">
                    <a href="{{ route('about') }}" class="btn btn-lg btn-outline-light">Learn More About Us</a>
                    <a href="{{ route('contact.index') }}" class="btn btn-lg btn-accent">Get Personalized Advice</a>
                </div>
            </div>
        </div>
    </section>

    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true,
            duration: 800,
            offset: 50
        });
    </script>

    <style>
        :root {
            --primary-dark: #0A1A35;
            --primary-medium: #1A3A5F;
            --primary-light: #2A5A8F;
            --accent-blue: #4A90E2;
            --accent-teal: #2EC4B6;
            --text-light: #E8F1F8;
            --text-muted: #ffffff;
        }

        .hero-section {
            background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary-medium) 100%);
            color: var(--text-light);
        }

        .text-accent {
            color: var(--accent-teal) !important;
        }

        .stat-card {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            padding: 20px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .search-section {
            background: var(--primary-dark);
        }

        .search-container {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 30px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .search-box {
            position: relative;
        }

        .search-input {
            width: 100%;
            padding: 15px 20px 15px 50px;
            border-radius: 50px;
            border: 2px solid rgba(255, 255, 255, 0.1);
            background: rgba(255, 255, 255, 0.1);
            color: white;
            font-size: 16px;
            transition: all 0.3s ease;
        }

        .search-input:focus {
            outline: none;
            border-color: var(--accent-teal);
            background: rgba(255, 255, 255, 0.15);
            box-shadow: 0 0 0 3px rgba(46, 196, 182, 0.2);
        }

        .search-input::placeholder {
            color: var(--text-muted);
        }

        .search-icon {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--accent-teal);
            font-size: 20px;
        }

        /* --- Category / Level selects: dark option background --- */
        .category-select {
            padding: 15px 20px;
            border-radius: 50px;
            border: 2px solid rgba(255, 255, 255, 0.1);
            background: var(--primary-dark);
            color: #ffffff;
            font-size: 16px;
            width: 100%;
            cursor: pointer;
            transition: all 0.3s ease;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
        }

        /* Option styling (best-effort; browsers vary) */
        .category-select option {
            background: var(--primary-dark);
            color: #ffffff;
        }

        .category-select:focus {
            outline: none;
            border-color: var(--accent-teal);
            background: rgba(255, 255, 255, 0.03);
            box-shadow: 0 0 0 3px rgba(46, 196, 182, 0.08);
        }

        /* Hide default arrow in some browsers (visual improvement) */
        .category-select::-ms-expand {
            display: none;
        }

        .courses-section {
            background: var(--primary-dark);
            color: var(--text-light);
        }

        .course-card {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.1);
            height: 100%;
        }

        .course-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            border-color: var(--accent-blue);
        }

        .course-image-container {
            height: 200px;
            overflow: hidden;
        }

        .course-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .course-card:hover .course-image {
            transform: scale(1.05);
        }

        .course-image-placeholder {
            height: 100%;
            background: linear-gradient(135deg, var(--primary-medium), var(--accent-blue));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
        }

        /* Category badge (unchanged) */
        .course-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            background: var(--accent-teal);
            color: var(--primary-dark);
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: bold;
        }

        /* Level badge: make it visually like the category badge (user requested) */
        .course-level {
            position: absolute;
            top: 15px;
            left: 15px;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            background: var(--accent-teal);
            color: var(--primary-dark);
        }

        /* Keep legacy level classes harmless — we override them above for consistent look */
        .level-beginner,
        .level-intermediate,
        .level-advanced {
            /* intentionally minimal so the .course-level rule above controls visuals */
            background: transparent !important;
            color: inherit !important;
        }

        .course-content {
            height: calc(100% - 200px);
            display: flex;
            flex-direction: column;
        }

        .course-title {
            color: var(--text-light);
            font-size: 1.1rem;
            line-height: 1.4;
        }

        /* Make description and other in-card texts teal as requested */
        .course-description,
        .instructor-info,
        .course-meta,
        .rating,
        .course-meta span {
            color: var(--accent-teal) !important;
        }

        .course-description {
            flex-grow: 1;
        }

        .course-meta {
            display: flex;
            justify-content: space-between;
            font-size: 14px;
            color: var(--accent-teal);
            margin-bottom: 15px;
        }

        .course-price {
            font-size: 1.25rem;
            color: var(--accent-teal);
        }

        .btn-outline-accent {
            border-color: var(--accent-teal);
            color: var(--accent-teal);
            transition: all 0.3s ease;
        }

        .btn-outline-accent:hover {
            background-color: var(--accent-teal);
            color: var(--primary-dark);
        }

        .btn-accent {
            background: linear-gradient(135deg, var(--accent-blue), var(--accent-teal));
            border: none;
            color: white;
            font-weight: 600;
        }

        .btn-accent:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(74, 144, 226, 0.4);
        }

        .rating-stars {
            color: #FFD700;
        }

        .cta-section {
            background: linear-gradient(135deg, var(--primary-medium) 0%, var(--primary-light) 100%);
        }

        .cta-card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .no-courses {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        /* Pagination Styling */
        .pagination .page-link {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: var(--text-light);
        }

        .pagination .page-item.active .page-link {
            background: var(--accent-teal);
            border-color: var(--accent-teal);
            color: var(--primary-dark);
        }

        .pagination .page-link:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: var(--accent-teal);
        }

        @media (max-width: 768px) {
            .hero-section .display-4 {
                font-size: 2rem;
            }

            .search-container {
                padding: 20px;
            }

            .course-card {
                margin-bottom: 20px;
            }
        }
    </style>
@endsection