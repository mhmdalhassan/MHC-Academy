@extends('client.app')

@section('content')
    <!-- Hero Section -->
    <section class="text-center py-5 mb-5"
        style="background: linear-gradient(135deg, #3B38A0 0%, #1A2A80 100%); border-radius: 20px;" data-aos="fade-down">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h1 class="text-info mb-3 display-4 fw-bold" data-aos="zoom-in">
                        <i class="bi bi-building me-3"></i>About Our Academy
                    </h1>
                    <p class="text-white lead fs-5" data-aos="fade-up" data-aos-delay="200">
                        Empowering the next generation of developers with cutting-edge coding education
                        and real-world project experience since 2018.
                    </p>
                    <div class="mt-4" data-aos="fade-up" data-aos-delay="400">
                        <span class="badge bg-info fs-6 me-2 px-3 py-2">🎓 1500+ Students</span>
                        <span class="badge bg-warning text-dark fs-6 me-2 px-3 py-2">💼 80% Hire Rate</span>
                        <span class="badge bg-success fs-6 px-3 py-2">🌍 Global Community</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <!-- Mission & Vision -->
        <div class="row mb-5 g-4">
            <!-- Mission -->
            <div class="col-lg-6" data-aos="fade-right">
                <div class="p-4 rounded-3 shadow-lg h-100 mission-card">
                    <div class="icon-container mb-4">
                        <i class="bi bi-bullseye display-4 text-info"></i>
                    </div>
                    <h2 class="text-info mb-3 fw-bold">Our Mission</h2>
                    <p class="text-white fs-6 lh-lg">
                        To democratize coding education by providing accessible, high-quality training that transforms
                        beginners into job-ready developers. We focus on practical skills, modern technologies, and
                        real-world project experience.
                    </p>
                    <ul class="text-white list-unstyled">
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Hands-on learning approach
                        </li>
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Industry-relevant
                            curriculum</li>
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i>Career-focused training
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Vision -->
            <div class="col-lg-6" data-aos="fade-left">
                <div class="p-4 rounded-3 shadow-lg h-100 vision-card">
                    <div class="icon-container mb-4">
                        <i class="bi bi-eye display-4 text-info"></i>
                    </div>
                    <h2 class="text-info mb-3 fw-bold">Our Vision</h2>
                    <p class="text-white fs-6 lh-lg">
                        To become the world's most trusted coding academy, recognized for producing exceptional
                        developers who drive innovation and shape the future of technology across all industries.
                    </p>
                    <div class="achievement-stats mt-4">
                        <div class="row text-center">
                            <div class="col-4">
                                <h4 class="text-warning mb-1">5+</h4>
                                <small class="text-light">Years Experience</small>
                            </div>
                            <div class="col-4">
                                <h4 class="text-warning mb-1">1.5K+</h4>
                                <small class="text-light">Students Trained</small>
                            </div>
                            <div class="col-4">
                                <h4 class="text-warning mb-1">50+</h4>
                                <small class="text-light">Countries</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Values Section -->
        <section class="text-center mb-5 p-5 rounded-3 shadow-lg values-section" data-aos="zoom-in">
            <h2 class="text-info mb-4 display-5 fw-bold">
                <i class="bi bi-heart-fill me-3"></i>Our Core Values
            </h2>
            <p class="text-white lead mb-5">The principles that guide everything we do</p>

            <div class="row g-4">
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="value-card p-4 rounded-3 h-100">
                        <div class="value-icon mb-3">
                            <i class="bi bi-lightning-charge-fill display-4 text-warning"></i>
                        </div>
                        <h5 class="text-info mb-3">Innovation</h5>
                        <p class="text-light small">Embracing cutting-edge technologies and teaching methodologies</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="value-card p-4 rounded-3 h-100">
                        <div class="value-icon mb-3">
                            <i class="bi bi-people-fill display-4 text-warning"></i>
                        </div>
                        <h5 class="text-info mb-3">Community</h5>
                        <p class="text-light small">Fostering collaboration, mentorship, and peer support</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="value-card p-4 rounded-3 h-100">
                        <div class="value-icon mb-3">
                            <i class="bi bi-award-fill display-4 text-warning"></i>
                        </div>
                        <h5 class="text-info mb-3">Excellence</h5>
                        <p class="text-light small">Striving for the highest quality in education and outcomes</p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="value-card p-4 rounded-3 h-100">
                        <div class="value-icon mb-3">
                            <i class="bi bi-shield-check display-4 text-warning"></i>
                        </div>
                        <h5 class="text-info mb-3">Integrity</h5>
                        <p class="text-light small">Maintaining transparency and ethical standards</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Methodology -->
        <section class="row align-items-center mb-5 p-4 rounded-3 shadow-lg methodology-section" data-aos="fade-up">
            <div class="col-lg-6 mb-4 mb-lg-0">
                <h2 class="text-info mb-3 fw-bold">Our Learning Methodology</h2>
                <p class="text-white mb-4">
                    We've developed a proven approach that combines theory with extensive hands-on practice:
                </p>
                <div class="learning-steps">
                    <div class="step-item d-flex align-items-center mb-3" data-aos="fade-right" data-aos-delay="100">
                        <div
                            class="step-number bg-info text-white rounded-circle d-flex align-items-center justify-content-center me-3">
                            1
                        </div>
                        <div>
                            <h6 class="text-warning mb-1">Learn Fundamentals</h6>
                            <p class="text-light small mb-0">Master core programming concepts</p>
                        </div>
                    </div>
                    <div class="step-item d-flex align-items-center mb-3" data-aos="fade-right" data-aos-delay="200">
                        <div
                            class="step-number bg-info text-white rounded-circle d-flex align-items-center justify-content-center me-3">
                            2
                        </div>
                        <div>
                            <h6 class="text-warning mb-1">Build Projects</h6>
                            <p class="text-light small mb-0">Apply skills to real-world applications</p>
                        </div>
                    </div>
                    <div class="step-item d-flex align-items-center mb-3" data-aos="fade-right" data-aos-delay="300">
                        <div
                            class="step-number bg-info text-white rounded-circle d-flex align-items-center justify-content-center me-3">
                            3
                        </div>
                        <div>
                            <h6 class="text-warning mb-1">Get Feedback</h6>
                            <p class="text-light small mb-0">Expert reviews and peer code reviews</p>
                        </div>
                    </div>
                    <div class="step-item d-flex align-items-center" data-aos="fade-right" data-aos-delay="400">
                        <div
                            class="step-number bg-info text-white rounded-circle d-flex align-items-center justify-content-center me-3">
                            4
                        </div>
                        <div>
                            <h6 class="text-warning mb-1">Career Ready</h6>
                            <p class="text-light small mb-0">Portfolio development and interview prep</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 text-center" data-aos="zoom-in" data-aos-delay="500">
                <div class="image-container">
                    <img src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
                        class="img-fluid rounded-3 methodology-image" alt="Learning Methodology" loading="lazy">
                    <div class="image-overlay"></div>
                </div>
            </div>
        </section>

        <!-- Team Section -->
        <section class="text-center mb-5" data-aos="fade-up">
            <h2 class="text-info mb-4 display-5 fw-bold">
                <i class="bi bi-people-fill me-3"></i>Meet Our Team
            </h2>
            <p class="text-white lead mb-5">Experienced instructors passionate about your success</p>

            <div class="row g-4">
                @php
                    $teamMembers = [
                        ['name' => 'John Doe', 'role' => 'Senior Web Developer & Instructor', 'image' => 'https://i.pravatar.cc/300?img=1'],
                        ['name' => 'Jane Smith', 'role' => 'Full Stack Developer & Mentor', 'image' => 'https://i.pravatar.cc/300?img=2'],
                        ['name' => 'Alice Brown', 'role' => 'Backend Developer & Instructor', 'image' => 'https://i.pravatar.cc/300?img=3'],
                    ];
                @endphp

                @foreach($teamMembers as $index => $member)
                    <div class="col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="{{ $index * 100 }}">
                        <div class="team-card p-4 rounded-3 h-100">
                            <div class="team-image-container mb-3">
                                <img src="{{ $member['image'] }}" class="team-image rounded-circle" alt="{{ $member['name'] }}"
                                    loading="lazy">
                                <div class="image-overlay"></div>
                            </div>
                            <h5 class="text-info mb-2">{{ $member['name'] }}</h5>
                            <p class="text-light small mb-3">{{ $member['role'] }}</p>
                            <div class="social-links">
                                <a href="#" class="text-info me-2"><i class="bi bi-linkedin"></i></a>
                                <a href="#" class="text-info me-2"><i class="bi bi-github"></i></a>
                                <a href="#" class="text-info"><i class="bi bi-twitter"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Student Success -->
        <section class="text-center mb-5 p-5 rounded-3 shadow-lg success-section" data-aos="fade-up">
            <h2 class="text-info mb-4 display-5 fw-bold">Student Success Stories</h2>
            <p class="text-white lead mb-5">Join thousands of students who transformed their careers</p>

            <div class="row g-4">
                @php
                    $successStories = [
                        ['name' => 'Emily Johnson', 'role' => 'Frontend Developer @ TechCorp', 'image' => 'https://i.pravatar.cc/300?img=4', 'story' => 'From zero coding knowledge to building my first web app in 6 months!'],
                        ['name' => 'Michael Lee', 'role' => 'Full Stack Developer @ Startup', 'image' => 'https://i.pravatar.cc/300?img=5', 'story' => 'The project-based approach gave me the confidence to excel in interviews.'],
                        ['name' => 'Sophia Martinez', 'role' => 'Software Engineer @ GlobalTech', 'image' => 'https://i.pravatar.cc/300?img=6', 'story' => 'Amazing community and mentors who supported me every step of the way.'],
                    ];
                @endphp

                @foreach($successStories as $index => $story)
                    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                        <div class="success-card p-4 rounded-3 h-100">
                            <img src="{{ $story['image'] }}" class="success-image rounded-circle mb-3"
                                alt="{{ $story['name'] }}" loading="lazy">
                            <h6 class="text-warning mb-2">{{ $story['name'] }}</h6>
                            <small class="text-info d-block mb-3">{{ $story['role'] }}</small>
                            <p class="text-light small fst-italic">"{{ $story['story'] }}"</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>
    </div>
@endsection

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <style>
        .mission-card,
        .vision-card,
        .values-section,
        .methodology-section,
        .success-section {
            background: linear-gradient(135deg, #3B38A0 0%, #2A2870 100%);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .value-card,
        .team-card,
        .success-card {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: transform 0.3s ease;
        }

        .value-card:hover,
        .team-card:hover,
        .success-card:hover {
            transform: translateY(-5px);
            background: rgba(255, 255, 255, 0.15);
        }

        .icon-container,
        .value-icon {
            width: 80px;
            height: 80px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
        }

        .step-number {
            width: 40px;
            height: 40px;
            font-weight: bold;
        }

        .image-container {
            position: relative;
            overflow: hidden;
            border-radius: 15px;
        }

        .methodology-image,
        .team-image,
        .success-image {
            width: 100%;
            height: 300px;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .team-image,
        .success-image {
            width: 150px;
            height: 150px;
        }

        .image-container:hover .methodology-image {
            transform: scale(1.05);
        }

        .image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, rgba(59, 56, 160, 0.3), rgba(26, 42, 128, 0.3));
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .image-container:hover .image-overlay {
            opacity: 1;
        }

        .team-image-container {
            position: relative;
            display: inline-block;
        }

        .social-links a {
            transition: color 0.3s ease;
        }

        .social-links a:hover {
            color: #FFD700 !important;
        }

        .learning-steps .step-item {
            transition: transform 0.3s ease;
        }

        .learning-steps .step-item:hover {
            transform: translateX(10px);
        }

        @media (max-width: 768px) {
            .display-4 {
                font-size: 2.5rem;
            }

            .display-5 {
                font-size: 2rem;
            }

            section {
                padding: 2rem 1rem !important;
            }
        }
    </style>
@endpush

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            AOS.init({
                duration: 1000,
                once: true,
                easing: 'ease-in-out'
            });
        });
    </script>
@endpush