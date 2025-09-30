@extends('client.app')

@section('content')
    <!-- Course Hero Section -->
    <section class="course-hero py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <!-- Course Content -->
                <div class="col-lg-7" data-aos="fade-right" data-aos-duration="800">
                    <!-- Breadcrumb -->
                    <nav aria-label="breadcrumb" class="mb-4">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('course') }}" class="text-accent">Courses</a></li>
                            <li class="breadcrumb-item"><a href="#"
                                    class="text-accent">{{ $product->category ?? 'Development' }}</a></li>
                            <li class="breadcrumb-item active">{{ $product->name }}</li>
                        </ol>
                    </nav>

                    <!-- Course Header -->
                    <div class="course-header mb-4">
                        <span
                            class="badge bg-accent text-dark fw-bold mb-2">{{ $product->category ?? 'Premium Course' }}</span>
                        <h1 class="display-5 fw-bold mb-3">{{ $product->name }}</h1>
                        <p class="lead text-white">
                            {{ $product->tagline ?? 'Master in-demand skills with hands-on projects' }}
                        </p>
                    </div>

                    <!-- Course Stats -->
                    <div class="course-stats row g-3 mb-4">
                        <div class="col-auto">
                            <div class="stat-item d-flex align-items-center">
                                <i class="bi bi-clock-fill text-accent me-2"></i>
                                <span class="fw-bold">{{ $product->duration }}
                                    {{ $product->duration > 1 ? 'months' : 'month' }}</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="stat-item d-flex align-items-center">
                                <i class="bi bi-bar-chart-fill text-accent me-2"></i>
                                <span class="fw-bold">{{ $product->difficulty ?? 'Beginner' }} Level</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="stat-item d-flex align-items-center">
                                <i class="bi bi-play-circle-fill text-accent me-2"></i>
                                <span class="fw-bold">{{ $product->lessons ?? '24' }} Lessons</span>
                            </div>
                        </div>
                        <div class="col-auto">
                            <div class="stat-item d-flex align-items-center">
                                <i class="bi bi-person-fill text-accent me-2"></i>
                                <span class="fw-bold">{{ $product->enrolled_count ?? '1,200' }}+ Enrolled</span>
                            </div>
                        </div>
                    </div>

                    <!-- Rating -->
                    <div class="rating-section mb-4">
                        <div class="d-flex align-items-center mb-2">
                            @php
                                $rating = $product->rating ?? 4.7; // default if no rating
                                $fullStars = floor($rating);
                                $halfStar = ($rating - $fullStars) >= 0.5 ? 1 : 0;
                                $emptyStars = 5 - $fullStars - $halfStar;
                            @endphp

                            <div class="d-flex align-items-center">
                                <div class="rating-stars me-2">
                                    @for ($i = 0; $i < $fullStars; $i++)
                                        <i class="bi bi-star-fill"></i>
                                    @endfor
                                    @if ($halfStar)
                                        <i class="bi bi-star-half"></i>
                                    @endif
                                    @for ($i = 0; $i < $emptyStars; $i++)
                                        <i class="bi bi-star"></i>
                                    @endfor
                                </div>
                                <span class="fw-bold me-2">{{ number_format($rating, 1) }}</span>
                            </div>

                            <span class="text-white">({{ $product->enrolled_count ?? '356' }} reviews)</span>
                        </div>
                        <div class="progress mb-1" style="height: 6px;">
                            <div class="progress-bar bg-accent" style="width: 85%"></div>
                        </div>
                        @php
                            $enrolled = $product->enrolled_count ?? 100; // default to 100 if null
                            $recommended = round($enrolled * 0.75);
                        @endphp

                        <small class="text-white">{{ $recommended }} of students recommend this course</small>

                    </div>

                    <!-- Price & CTA -->
                    <div class="pricing-section mb-4">
                        <div class="d-flex align-items-center mb-3">
                            <span class="h2 fw-bold text-accent me-3">${{ number_format($product->price, 2) }}</span>
                            @if($product->original_price && $product->original_price > $product->price)
                                <span
                                    class="text-muted text-decoration-line-through me-2">${{ number_format($product->original_price, 2) }}</span>
                                <span class="badge bg-danger">Save
                                    {{ number_format(($product->original_price - $product->price) / $product->original_price * 100) }}%</span>
                            @endif
                        </div>

                        <div class="d-flex flex-wrap gap-3">
                            <a href="{{ route('contact.index') }}" class="btn btn-accent btn-lg px-4">
                                <i class="bi bi-cart-plus me-2"></i>Enroll Now
                            </a>
                            <a href="{{ route('course') }}" class="btn btn-outline-light btn-lg px-4">
                                <i class="bi bi-arrow-left me-2"></i>Back to Courses
                            </a>
                        </div>

                        <div class="mt-3">
                            <small class="text-white">
                                <i class="bi bi-shield-check me-1"></i>
                                30-day money-back guarantee • Lifetime access
                            </small>
                        </div>
                    </div>
                </div>

                <!-- Course Image -->
                <div class="col-lg-5" data-aos="fade-left" data-aos-duration="800">
                    <div class="course-image-container">
                        @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                class="course-image rounded-4 shadow-lg" loading="lazy">
                        @else
                            <div class="course-image-placeholder rounded-4 d-flex align-items-center justify-content-center">
                                <div class="text-center">
                                    <i class="bi bi-laptop display-1 text-accent mb-3"></i>
                                    <h4 class="fw-bold">{{ $product->name }}</h4>
                                    <p class="text-muted">Course Preview</p>
                                </div>
                            </div>
                        @endif

                        <!-- Preview Badge -->
                        <div class="preview-badge" style="cursor: pointer;"
                            onclick="window.open('{{ $product->overview_video_url }}', '_blank')">
                            <i class="bi bi-play-circle me-1"></i>
                            <span>Watch Course Preview</span>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Course Details Tabs -->
    <section class="course-details py-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <!-- Tabs Navigation -->
                    <ul class="nav nav-tabs course-tabs mb-4" id="courseTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="overview-tab" data-bs-toggle="tab"
                                data-bs-target="#overview" type="button" role="tab">
                                <i class="bi bi-info-circle me-2"></i>Overview
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="curriculum-tab" data-bs-toggle="tab" data-bs-target="#curriculum"
                                type="button" role="tab">
                                <i class="bi bi-journals me-2"></i>Curriculum
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="instructor-tab" data-bs-toggle="tab" data-bs-target="#instructor"
                                type="button" role="tab">
                                <i class="bi bi-person me-2"></i>Instructor
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews"
                                type="button" role="tab">
                                <i class="bi bi-star me-2"></i>Reviews
                            </button>
                        </li>
                    </ul>

                    <!-- Tabs Content -->
                    <div class="tab-content" id="courseTabContent">
                        <!-- Overview Tab -->
                        <div class="tab-pane fade show active" id="overview" role="tabpanel">
                            <div class="course-overview">
                                <h3 class="fw-bold mb-4">About This Course</h3>
                                <div class="course-description">
                                    <p class="lead mb-4">{!! nl2br(e($product->detail ?? 'No description available.')) !!}
                                    </p>

                                    <div class="row g-4 mb-4">
                                        <div class="col-md-6">
                                            <h5 class="fw-bold mb-3">What You'll Learn</h5>
                                            <ul class="learn-list">
                                                <li><i class="bi bi-check-circle-fill text-accent me-2"></i>Build real-world
                                                    projects</li>
                                                <li><i class="bi bi-check-circle-fill text-accent me-2"></i>Master industry
                                                    best practices</li>
                                                <li><i class="bi bi-check-circle-fill text-accent me-2"></i>Get job-ready
                                                    skills</li>
                                                <li><i class="bi bi-check-circle-fill text-accent me-2"></i>Receive expert
                                                    code reviews</li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6">
                                            <h5 class="fw-bold mb-3">Course Includes</h5>
                                            <ul class="includes-list">
                                                <li><i
                                                        class="bi bi-play-circle-fill text-accent me-2"></i>{{ $product->lessons ?? '24' }}
                                                    hours video</li>
                                                <li><i class="bi bi-file-text-fill text-accent me-2"></i>12 articles &
                                                    resources</li>
                                                <li><i class="bi bi-download text-accent me-2"></i>Downloadable code</li>
                                                <li><i class="bi bi-infinity text-accent me-2"></i>Full lifetime access</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Curriculum Tab -->
                        <div class="tab-pane fade" id="curriculum" role="tabpanel">
                            <div class="course-curriculum">
                                <h3 class="fw-bold mb-4">Course Curriculum</h3>
                                <div class="accordion" id="curriculumAccordion">
                                    <!-- Module 1: Introduction -->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#module1">
                                                Module 1: Introduction to {{ $product->category ?? 'Development' }}
                                            </button>
                                        </h2>
                                        <div id="module1" class="accordion-collapse collapse show"
                                            data-bs-parent="#curriculumAccordion">
                                            <div class="accordion-body">
                                                @if(!empty($product->welcome_video_url))
                                                    <a href="{{ $product->welcome_video_url }}" target="_blank"
                                                        class="text-decoration-none">
                                                        <div
                                                            class="lesson-item d-flex justify-content-between align-items-center py-2">
                                                            <span><i class="bi bi-play-circle me-2"></i>Welcome to the
                                                                Course</span>

                                                        </div>
                                                    </a>
                                                @endif
                                                @if(!empty($product->overview_video_url))
                                                    <a href="{{ $product->overview_video_url }}" target="_blank"
                                                        class="text-decoration-none">
                                                        <div
                                                            class="lesson-item d-flex justify-content-between align-items-center py-2">
                                                            <span><i class="bi bi-play-circle me-2"></i>Course Overview</span>

                                                        </div>
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Module 2: Core Concepts -->
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                            <button class="accordion-button collapsed bg-transparent text-white"
                                                type="button" data-bs-toggle="collapse" data-bs-target="#module2">
                                                Module 2: Core Concepts
                                            </button>
                                        </h2>
                                        <div id="module2" class="accordion-collapse collapse"
                                            data-bs-parent="#curriculumAccordion">
                                            <div class="accordion-body text-white px-3 py-2">
                                                @if(!empty($product->core_concepts))
                                                    <ul class="list-unstyled mb-0">
                                                        @foreach($product->core_concepts as $concept)
                                                            <li class="d-flex align-items-start mb-2">
                                                                <i class="bi bi-check-circle text-success me-2 mt-1"></i>
                                                                <span class="me-2">{{ $concept }}</span>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @else
                                                    <p class="mb-0">No core concepts added yet.</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>


                        <!-- Instructor Tab -->
                        <div class="tab-pane fade" id="instructor" role="tabpanel">
                            <div class="course-instructor">
                                <h3 class="fw-bold mb-4">Meet Your Instructor</h3>
                                <div class="instructor-card">
                                    <div class="row g-4 align-items-center">
                                        <div class="col-md-3 text-center">
                                            <img src="https://via.placeholder.com/150" alt="Instructor"
                                                class="instructor-avatar rounded-circle mb-3">
                                            <div class="instructor-rating">
                                                <div class="rating-stars">
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                    <i class="bi bi-star-fill"></i>
                                                </div>
                                                <small class="text-muted">4.9/5.0 rating</small>
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <h4 class="fw-bold">John Doe</h4>
                                            <p class="text-accent fw-bold">Senior Developer at Tech Company</p>
                                            <p class="mb-3">With over 10 years of experience in software development and
                                                mentoring,
                                                John has helped thousands of students launch their tech careers.</p>
                                            <div class="instructor-stats row g-3">
                                                <div class="col-auto">
                                                    <span class="fw-bold">15,000+</span>
                                                    <small class="d-block text-muted">Students</small>
                                                </div>
                                                <div class="col-auto">
                                                    <span class="fw-bold">8</span>
                                                    <small class="d-block text-muted">Courses</small>
                                                </div>
                                                <div class="col-auto">
                                                    <span class="fw-bold">4.9</span>
                                                    <small class="d-block text-muted">Average Rating</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Reviews Tab -->
                        <div class="tab-pane fade" id="reviews" role="tabpanel">
                            <div class="course-reviews">
                                <h3 class="fw-bold mb-4">Student Reviews</h3>
                                <!-- Reviews content would go here -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="col-lg-4">
                    <div class="course-sidebar">
                        <!-- Course Features -->
                        <div class="sidebar-card mb-4">
                            <h5 class="fw-bold mb-3">Course Features</h5>
                            <ul class="feature-list">
                                <li class="d-flex justify-content-between py-2">
                                    <span><i class="bi bi-clock text-accent me-2"></i>Duration</span>
                                    <span class="fw-bold">{{ $product->duration }} months</span>
                                </li>
                                <li class="d-flex justify-content-between py-2">
                                    <span><i class="bi bi-bar-chart text-accent me-2"></i>Level</span>
                                    <span class="fw-bold">{{ $product->difficulty ?? 'Beginner' }}</span>
                                </li>
                                <li class="d-flex justify-content-between py-2">
                                    <span><i class="bi bi-play-circle text-accent me-2"></i>Lessons</span>
                                    <span class="fw-bold">{{ $product->lessons ?? '24' }}</span>
                                </li>
                                <li class="d-flex justify-content-between py-2">
                                    <span><i class="bi bi-person text-accent me-2"></i>Enrolled</span>
                                    <span class="fw-bold">{{ $product->enrolled_count ?? '1,200' }}+</span>
                                </li>

                                <li class="d-flex justify-content-between py-2">
                                    <span><i class="bi bi-star text-accent me-2"></i>Rating</span>
                                    <span class="fw-bold">
                                        {{ number_format($product->rating ?? 4.7, 1) }}/5.0
                                    </span>
                                </li>

                            </ul>
                        </div>

                        <!-- Support Card -->
                        <div class="sidebar-card mb-4">
                            <h5 class="fw-bold mb-3">Need Help?</h5>
                            <p class="small mb-3">Our support team is here to help you succeed</p>
                            <a href="{{ route('contact.index') }}" class="btn btn-outline-accent w-100">
                                <i class="bi bi-question-circle me-2"></i>Contact Support
                            </a>
                        </div>

                        <!-- Related Courses -->
                        <div class="sidebar-card">
                            <h5 class="fw-bold mb-3">Related Courses</h5>
                            <!-- Sample related courses -->
                            <div class="related-course mb-3">
                                <h6 class="fw-bold mb-1">Advanced {{ $product->category ?? 'Development' }}</h6>
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="text-accent fw-bold">$99.00</span>
                                    <small class="text-muted">12 hours</small>
                                </div>
                            </div>
                            <a href="{{ route('course') }}" class="btn btn-sm btn-outline-light w-100">
                                View All Courses
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section py-5">
        <div class="container text-center">
            <h2 class="fw-bold mb-3">Ready to Start Learning?</h2>
            <p class="lead mb-4">Join thousands of students who have transformed their careers</p>
            <a href="{{ route('contact.index') }}" class="btn btn-accent btn-lg px-5">
                <i class="bi bi-cart-plus me-2"></i>Enroll Now - ${{ number_format($product->price, 2) }}
            </a>
        </div>
    </section>

    <style>
        :root {
            --primary-dark: #0A1A35;
            --primary-medium: #1A3A5F;
            --primary-light: #2A5A8F;
            --accent-blue: #4A90E2;
            --accent-teal: #2EC4B6;
            --text-light: #E8F1F8;
            --text-muted: #A8C6E0;
        }

        .course-hero {
            background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary-medium) 100%);
            color: var(--text-light);
        }

        .text-accent {
            color: var(--accent-teal) !important;
        }

        .bg-accent {
            background-color: var(--accent-teal) !important;
        }

        .breadcrumb {
            background: transparent;
            padding: 0;
        }

        .breadcrumb-item a {
            color: var(--accent-teal);
            text-decoration: none;
        }

        .breadcrumb-item.active {
            color: var(--text-muted);
        }

        .course-stats .stat-item {
            background: rgba(255, 255, 255, 0.05);
            padding: 8px 15px;
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .rating-stars {
            color: #FFD700;
        }

        .btn-accent {
            background: linear-gradient(135deg, var(--accent-blue), var(--accent-teal));
            border: none;
            color: white;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-accent:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(74, 144, 226, 0.4);
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

        .course-image-container {
            position: relative;
        }

        .course-image {
            width: 100%;
            height: 400px;
            object-fit: cover;
        }

        .course-image-placeholder {
            height: 400px;
            background: linear-gradient(135deg, var(--primary-medium), var(--accent-blue));
            color: white;
        }

        .preview-badge {
            position: absolute;
            bottom: 20px;
            right: 20px;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 10px 15px;
            border-radius: 25px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .preview-badge:hover {
            background: var(--accent-teal);
            color: var(--primary-dark);
        }

        .course-details {
            background: var(--primary-dark);
        }

        .course-tabs .nav-link {
            color: var(--text-muted);
            border: none;
            padding: 15px 20px;
            transition: all 0.3s ease;
        }

        .course-tabs .nav-link.active {
            color: var(--accent-teal);
            background: transparent;
            border-bottom: 3px solid var(--accent-teal);
        }

        .course-tabs .nav-link:hover {
            color: var(--accent-teal);
        }

        .learn-list li,
        .includes-list li {
            margin-bottom: 10px;
        }

        .accordion-item {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            margin-bottom: 10px;
            border-radius: 10px;
        }

        .accordion-button {
            background: transparent;
            color: var(--text-light);
            font-weight: 600;
        }

        .accordion-button:not(.collapsed) {
            background: rgba(255, 255, 255, 0.05);
            color: var(--accent-teal);
        }

        .accordion-body {
            background: transparent;
            color: var(--text-light);
        }

        .lesson-item {
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .lesson-item:last-child {
            border-bottom: none;
        }

        .instructor-card {
            background: rgba(255, 255, 255, 0.05);
            padding: 25px;
            border-radius: 15px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .instructor-avatar {
            width: 100px;
            height: 100px;
            object-fit: cover;
        }

        .course-sidebar {
            position: sticky;
            top: 100px;
        }

        .sidebar-card {
            background: rgba(255, 255, 255, 0.05);
            padding: 25px;
            border-radius: 15px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .feature-list li {
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .feature-list li:last-child {
            border-bottom: none;
        }

        .related-course {
            padding: 15px;
            background: rgba(255, 255, 255, 0.03);
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .related-course:hover {
            background: rgba(255, 255, 255, 0.08);
        }

        .cta-section {
            background: linear-gradient(135deg, var(--primary-medium) 0%, var(--primary-light) 100%);
        }

        @media (max-width: 768px) {
            .course-hero .display-5 {
                font-size: 2rem;
            }

            .course-stats .col-auto {
                margin-bottom: 10px;
            }

            .course-image {
                height: 300px;
            }
        }
    </style>

    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            once: true,
            duration: 800,
            offset: 50
        });
    </script>
@endsection