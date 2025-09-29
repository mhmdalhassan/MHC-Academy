@extends('client.app')

@section('content')

{{-- ================== SECTION 1 ================== --}}
 <section class="d-flex align-items-center hero-section py-4">
        <div class="container">
            <div class="row align-items-center">
                <!-- LEFT TEXT -->
                <div class="col-lg-6 col-md-12 text-center text-lg-start mb-4 mb-lg-0">
                    <h1 class="display-4 fw-bold mb-3">
                        Welcome to <span class="text-info">MH-Code Academy</span>
                    </h1>
                    <p class="lead mb-4">
                        We help students build their careers with practical training, expert mentorship, and modern
                        technology.
                    </p>

                    <!-- Animated lines -->
                    <div id="animated-lines" class="mt-3">
                        <div
                            class="animated-line d-flex align-items-center justify-content-center justify-content-lg-start mb-3">
                            <i class="bi bi-lightning-charge-fill text-info me-2"></i>
                            <span class="content text-white" data-index="0"></span>
                        </div>
                        <div
                            class="animated-line d-flex align-items-center justify-content-center justify-content-lg-start mb-3">
                            <i class="bi bi-lightning-charge-fill text-info me-2"></i>
                            <span class="content text-white" data-index="0"></span>
                        </div>
                        <div
                            class="animated-line d-flex align-items-center justify-content-center justify-content-lg-start">
                            <i class="bi bi-lightning-charge-fill text-info me-2"></i>
                            <span class="content text-white" data-index="0"></span>
                        </div>
                    </div>

                    <!-- Buttons -->
                    <div class="mt-4">
                    <a href="{{ route('course') }}" class="btn btn-info btn-lg me-2 mb-2">Courses</a>
                    <a href="{{ route('about') }}" class="btn btn-info btn-lg me-2 mb-2">About Us</a>

                    </div>
                </div>

                <!-- RIGHT: NEW TECH SVG -->
                <div class="col-lg-6 col-md-12 text-center svg-container">
                    <svg viewBox="0 0 500 400" xmlns="http://www.w3.org/2000/svg"
                        aria-label="Technology Coding Illustration">
                        <defs>
                            <linearGradient id="grad-tech" x1="0" x2="1">
                                <stop offset="0%" stop-color="#06b6d4" />
                                <stop offset="100%" stop-color="#3b82f6" />
                            </linearGradient>
                            <filter id="glow" x="-50%" y="-50%" width="200%" height="200%">
                                <feGaussianBlur in="SourceGraphic" stdDeviation="5" result="blur" />
                                <feMerge>
                                    <feMergeNode in="blur" />
                                    <feMergeNode in="SourceGraphic" />
                                </feMerge>
                            </filter>
                        </defs>

                        <!-- Background elements -->
                        <rect x="50" y="50" width="400" height="300" fill="rgba(255,255,255,0.03)" rx="20" />

                        <!-- Central monitor -->
                        <g transform="translate(250, 200)">
                            <!-- Monitor base -->
                            <rect x="-120" y="-80" width="240" height="160" fill="#071233" rx="10" />
                            <rect x="-120" y="-80" width="240" height="25" fill="#050c24" rx="10" />

                            <!-- Monitor buttons -->
                            <circle cx="-105" cy="-67" r="4" fill="#ff5f56" />
                            <circle cx="-90" cy="-67" r="4" fill="#ffbd2e" />
                            <circle cx="-75" cy="-67" r="4" fill="#27c93f" />

                            <!-- Code display -->
                            <g class="code-display">
                                <text x="-110" y="-45" class="typing code-line" style="animation-delay: 0.5s;">&gt; npm
                                    start</text>
                                <text x="-110" y="-30" class="typing code-line" style="animation-delay: 1s;">Starting
                                    development server...</text>
                                <text x="-110" y="-15" class="typing code-line" style="animation-delay: 1.5s;">Compiled
                                    successfully!</text>
                                <text x="-110" y="0" class="typing code-line" style="animation-delay: 2s;">You can now view
                                    app in browser.</text>
                                <text x="-110" y="15" class="typing code-line" style="animation-delay: 2.5s;">Local:
                                    http://localhost:3000</text>
                                <text x="-110" y="30" class="typing code-line" style="animation-delay: 3s;">&gt; _</text>
                                <rect x="20" y="30" width="8" height="14" class="caret" />
                            </g>
                        </g>

                        <!-- Floating code elements -->
                        <g>
                            <rect x="80" y="80" width="60" height="40" fill="rgba(6, 182, 212, 0.1)" rx="5" />
                            <text x="90" y="105" class="typing" font-size="10">HTML</text>

                            <rect x="360" y="100" width="70" height="40" fill="rgba(59, 130, 246, 0.1)" rx="5" />
                            <text x="370" y="125" class="typing" font-size="10">CSS</text>

                            <rect x="100" y="300" width="80" height="40" fill="rgba(6, 182, 212, 0.1)" rx="5" />
                            <text x="110" y="325" class="typing" font-size="10">JS</text>

                            <rect x="320" y="280" width="90" height="40" fill="rgba(59, 130, 246, 0.1)" rx="5" />
                            <text x="330" y="305" class="typing" font-size="10">React</text>
                        </g>

                        <!-- Connection lines -->
                        <path d="M150 100 C180 120, 220 130, 250 150" class="trace" fill="none" />
                        <path d="M350 120 C320 140, 280 160, 250 180" class="trace" fill="none" />
                        <path d="M180 320 C220 280, 260 240, 250 220" class="trace" fill="none" />
                        <path d="M320 300 C280 260, 240 220, 250 200" class="trace" fill="none" />

                        <!-- Animated dots -->
                        <circle cx="150" cy="100" r="6" fill="#06b6d4" class="pulse" filter="url(#glow)" />
                        <circle cx="350" cy="120" r="6" fill="#3b82f6" class="pulse" filter="url(#glow)" />
                        <circle cx="180" cy="320" r="6" fill="#06b6d4" class="pulse" filter="url(#glow)" />
                        <circle cx="320" cy="300" r="6" fill="#3b82f6" class="pulse" filter="url(#glow)" />
                    </svg>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Text animation for the animated lines
        const texts = [
            "Hands-on coding projects",
            "Industry expert mentors",
            "Career support"
        ];

        const animatedLines = document.querySelectorAll('.animated-line .content');

        animatedLines.forEach((line, index) => {
            const text = texts[index];
            let charIndex = 0;

            function typeText() {
                if (charIndex < text.length) {
                    line.textContent += text.charAt(charIndex);
                    charIndex++;
                    setTimeout(typeText, 50);
                }
            }

            // Start typing after a delay based on index
            setTimeout(typeText, index * 500);
        });
    </script>



    {{-- ================== SECTION 2 ================== --}}
    <section class="mh-section about-section">
        <div class="p-4 p-md-5">
            <div class="row align-items-center">
                <!-- LEFT: Text -->
                <div class="col-lg-6 mb-4 mb-lg-0" data-aos="fade-right" data-aos-duration="1200">
                    <h2 class="fw-bold mb-3">About Us</h2>
                    <p class="lead">
                        At <span class="text-info fw-bold">MH-Code Academy</span>, we aim to provide high-quality courses,
                        hands-on training, and career guidance. Our mission is to prepare students
                        for a successful journey in the world of technology.
                    </p>
                    <ul class="list-unstyled mt-3">
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-info me-2"></i> Career-focused learning
                            paths</li>
                        <li class="mb-2"><i class="bi bi-check-circle-fill text-info me-2"></i> Project-based courses</li>
                        <li><i class="bi bi-check-circle-fill text-info me-2"></i> Mentorship and community support</li>
                    </ul>
                </div>

                <!-- RIGHT: Image -->
                <div class="col-lg-6 text-center" data-aos="fade-left" data-aos-duration="1200">
                    <img src="{{ asset('images/homePage.jpg') }}" alt="Coding Education"
                        class="img-fluid rounded-4 shadow-lg" loading="lazy"
                        style="max-height: 400px; width: 100%; object-fit: cover;">
                </div>
            </div>
        </div>
    </section>



    <!-- AOS Library (for scroll animations) -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>


    {{-- ================== SECTION 3 ================== --}}
    <section class="mh-section services-section">
        <div class="p-4 p-md-5">
            <div class="text-center mb-5" data-aos="fade-down" data-aos-duration="1200">
                <h2 class="fw-bold">Our Services / Programs</h2>
                <p class="lead">Explore the programs and services we provide at <span class="text-info fw-bold">MH-Code
                        Academy</span></p>
            </div>

            <div class="row g-4">
                <!-- Card 1 -->
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-duration="1000">
                    <div class="card h-100 text-center shadow border-0 service-card">
                        <div class="card-body p-4">
                            <i class="bi bi-journal-code display-4 mb-3"></i>
                            <h5 class="card-title fw-bold">Tutoring</h5>
                            <p class="card-text">One-to-one tutoring sessions to support your learning journey.</p>
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-duration="1200">
                    <div class="card h-100 text-center shadow border-0 service-card">
                        <div class="card-body p-4">
                            <i class="bi bi-laptop display-4 mb-3"></i>
                            <h5 class="card-title fw-bold">Coding Bootcamps</h5>
                            <p class="card-text">Intensive coding bootcamps to level up your skills quickly.</p>
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-duration="1400">
                    <div class="card h-100 text-center shadow border-0 service-card">
                        <div class="card-body p-4">
                            <i class="bi bi-diagram-3 display-4 mb-3"></i>
                            <h5 class="card-title fw-bold">Project Help</h5>
                            <p class="card-text">Guidance and support for your coding projects and assignments.</p>
                        </div>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-duration="1600">
                    <div class="card h-100 text-center shadow border-0 service-card">
                        <div class="card-body p-4">
                            <i class="bi bi-briefcase display-4 mb-3"></i>
                            <h5 class="card-title fw-bold">Career Guidance</h5>
                            <p class="card-text">Helping you plan your career path and land your dream job.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- ================== SECTION 4 ================== --}}
    <section class="mh-section features-section">
        <div class="p-4 p-md-5">
            <div class="text-center mb-5" data-aos="fade-down" data-aos-duration="1200">
                <h2 class="fw-bold">Why Choose Us / Features</h2>
                <p class="lead">Discover the advantages that make <span class="text-info fw-bold">MH-Code Academy</span>
                    unique</p>
            </div>

            <div class="row g-4">
                <!-- Feature 1 -->
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-duration="1000">
                    <div class="card h-100 text-center feature-card border-0">
                        <div class="card-body p-4">
                            <i class="bi bi-people-fill display-4 mb-3"></i>
                            <h5 class="card-title fw-bold">Mentorship</h5>
                            <p class="card-text">Get guidance from experienced mentors to grow your skills.</p>
                        </div>
                    </div>
                </div>

                <!-- Feature 2 -->
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-duration="1200">
                    <div class="card h-100 text-center feature-card border-0">
                        <div class="card-body p-4">
                            <i class="bi bi-clock-fill display-4 mb-3"></i>
                            <h5 class="card-title fw-bold">Flexible Timing</h5>
                            <p class="card-text">Learn at your own pace with our flexible course schedules.</p>
                        </div>
                    </div>
                </div>

                <!-- Feature 3 -->
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-duration="1400">
                    <div class="card h-100 text-center feature-card border-0">
                        <div class="card-body p-4">
                            <i class="bi bi-kanban-fill display-4 mb-3"></i>
                            <h5 class="card-title fw-bold">Real Projects</h5>
                            <p class="card-text">Work on real-life projects to gain hands-on experience.</p>
                        </div>
                    </div>
                </div>

                <!-- Feature 4 -->
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-duration="1600">
                    <div class="card h-100 text-center feature-card border-0">
                        <div class="card-body p-4">
                            <i class="bi bi-laptop-fill display-4 mb-3"></i>
                            <h5 class="card-title fw-bold">Modern Tools</h5>
                            <p class="card-text">Learn using the latest software and technologies in the industry.</p>
                        </div>
                    </div>
                </div>

                <!-- Feature 5 -->
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-duration="1800">
                    <div class="card h-100 text-center feature-card border-0">
                        <div class="card-body p-4">
                            <i class="bi bi-award-fill display-4 mb-3"></i>
                            <h5 class="card-title fw-bold">Certification</h5>
                            <p class="card-text">Receive recognized certificates to boost your career opportunities.</p>
                        </div>
                    </div>
                </div>

                <!-- Feature 6 -->
                <div class="col-md-6 col-lg-4" data-aos="fade-up" data-aos-duration="2000">
                    <div class="card h-100 text-center feature-card border-0">
                        <div class="card-body p-4">
                            <i class="bi bi-people-fill display-4 mb-3"></i>
                            <h5 class="card-title fw-bold">Community</h5>
                            <p class="card-text">Join a supportive tech community to learn and grow together.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    {{-- ================== SECTION 5 ================== --}}
    <section class="mh-section banner-section">
        <div class="position-relative">
            <!-- Image with lazy loading -->
            <img src="{{ asset('images/bannerHome.jpg') }}" alt="Motivational Banner" class="img-fluid w-100 rounded-4"
                loading="lazy" style="object-fit: cover; max-height: 500px;">

            <!-- Overlay with blue color #3d5cb8 and transparency -->
            <div class="position-absolute top-0 start-0 w-100 h-100 rounded-4"
                style="background-color: rgba(61, 92, 184, 0.6);"></div>

            <!-- Text on image -->
            <div class="position-absolute top-50 start-50 translate-middle text-center text-white px-3" data-aos="fade-up"
                data-aos-duration="1200">
                <h2 class="fw-bold display-4 banner-text">Dream • Learn • Achieve</h2>
                <p class="lead banner-text-small mt-2">Push your limits and build your future with MH-Code Academy</p>
            </div>
        </div>
    </section>


    {{-- ================== SECTION 6: Courses / Tracks ================== --}}
    <section class="mh-section mt-2" style="overflow:hidden;">
        <div class=" rounded-5 p-4" style="background: linear-gradient(135deg, #0b254d 55%, #082033 100%); color:#fff;">
            <!-- Intro -->
            <div class="text-center mb-5" data-aos="fade-down" data-aos-duration="1000">
                <h3 class="fw-bold">Courses / Tracks</h3>
                <p class="lead mb-0">Choose a track and start building real skills — each track includes hands-on projects
                    and mentorship.</p>
            </div>

            <!-- Cards grid -->
            <div class="row g-4 mt-4">
                <!-- Card template (repeat) -->
                <!-- 1) Web Development -->
                <div class="col-12 col-md-6 col-lg-4" data-aos="fade-up" data-aos-duration="1000">
                    <div class="track-card position-relative overflow-hidden rounded-4 h-100">
                        <!-- default content: image + title -->
                        <div class="card-front text-center p-4">
                            <img src="{{ asset('images/webDeveloper.jpg') }}" alt="Web Development"
                                class="img-fluid rounded-3 mb-3" loading="lazy" style="max-height:200px; object-fit:cover;">
                            <h5 class="track-title fw-bold mb-0">Web Development</h5>
                        </div>

                        <!-- hover overlay: shown on hover, hides front -->
                        <div class="card-back p-4 d-flex flex-column justify-content-center align-items-center text-center">
                            <!-- SVG (HTML/CSS/JS stack icon) -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="92" height="92" viewBox="0 0 24 24" fill="none"
                                class="mb-3">
                                <path d="M3 3h18v18H3z" fill="#0b254d" opacity="0.03" />
                                <path d="M4 4h16v16H4z" stroke="#ff8c00" stroke-width="1.2" fill="none" />
                                <path d="M7 7h3v10H7z" fill="#ff8c00" />
                                <path d="M11 7h6v1h-6z" fill="#ff8c00" />
                                <path d="M11 9h6v1h-6z" fill="#ff8c00" opacity="0.8" />
                                <path d="M11 11h6v1h-6z" fill="#ff8c00" opacity="0.6" />
                            </svg>

                            <h5 class="fw-bold mb-2" style="color:#ffb36b;">Web Development</h5>
                            <p class="mb-0">HTML • CSS • JavaScript • Build responsive websites & SPAs.</p>
                        </div>
                    </div>
                </div>

                <!-- 2) Cybersecurity -->
                <div class="col-12 col-md-6 col-lg-4" data-aos="fade-up" data-aos-duration="1100">
                    <div class="track-card position-relative overflow-hidden rounded-4 h-100">
                        <div class="card-front text-center p-4">
                            <img src="{{ asset('images/cyberSecurity.jpg') }}" alt="Cybersecurity"
                                class="img-fluid rounded-3 mb-3" loading="lazy" style="max-height:200px; object-fit:cover;">
                            <h5 class="track-title fw-bold mb-0">Cybersecurity</h5>
                        </div>

                        <div class="card-back p-4 d-flex flex-column justify-content-center align-items-center text-center">
                            <!-- SVG shield -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="92" height="92" viewBox="0 0 24 24" fill="none"
                                class="mb-3">
                                <path d="M12 2l7 4v6c0 5-4 9-7 10-3-1-7-5-7-10V6l7-4z" stroke="#ff8c00" stroke-width="1.2"
                                    fill="none" />
                                <path d="M9 12l2 2 4-4" stroke="#ff8c00" stroke-width="1.6" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round" />
                            </svg>

                            <h5 class="fw-bold mb-2" style="color:#ffb36b;">Cybersecurity</h5>
                            <p class="mb-0">Network hardening, penetration testing, and secure coding practices.</p>
                        </div>
                    </div>
                </div>

                <!-- 3) Computer Engineering -->
                <div class="col-12 col-md-6 col-lg-4" data-aos="fade-up" data-aos-duration="1200">
                    <div class="track-card position-relative overflow-hidden rounded-4 h-100">
                        <div class="card-front text-center p-4">
                            <img src="{{ asset('images/Enginee.jpg') }}" alt="Computer Engineering"
                                class="img-fluid rounded-3 mb-3" loading="lazy" style="max-height:200px; object-fit:cover;">
                            <h5 class="track-title fw-bold mb-0">Computer Engineering</h5>
                        </div>

                        <div class="card-back p-4 d-flex flex-column justify-content-center align-items-center text-center">
                            <!-- SVG chip -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="92" height="92" viewBox="0 0 24 24" fill="none"
                                class="mb-3">
                                <rect x="6" y="6" width="12" height="12" stroke="#ff8c00" stroke-width="1.2" fill="none" />
                                <path d="M12 8v8" stroke="#ff8c00" stroke-width="1.6" stroke-linecap="round" />
                            </svg>

                            <h5 class="fw-bold mb-2" style="color:#ffb36b;">Computer Engineering</h5>
                            <p class="mb-0">Digital systems, embedded programming and hardware design.</p>
                        </div>
                    </div>
                </div>

                <!-- 4) Data Analysis -->
                <div class="col-12 col-md-6 col-lg-4" data-aos="fade-up" data-aos-duration="1300">
                    <div class="track-card position-relative overflow-hidden rounded-4 h-100">
                        <div class="card-front text-center p-4">
                            <img src="{{ asset('images/dataAnalysis.jpg') }}" alt="Data Analysis"
                                class="img-fluid rounded-3 mb-3" loading="lazy" style="max-height:200px; object-fit:cover;">
                            <h5 class="track-title fw-bold mb-0">Data Analysis</h5>
                        </div>

                        <div class="card-back p-4 d-flex flex-column justify-content-center align-items-center text-center">
                            <!-- SVG chart -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="92" height="92" viewBox="0 0 24 24" fill="none"
                                class="mb-3">
                                <path d="M4 20h16" stroke="#ff8c00" stroke-width="1.2" />
                                <path d="M7 16v-6" stroke="#ff8c00" stroke-width="1.6" />
                                <path d="M12 16v-10" stroke="#ff8c00" stroke-width="1.6" />
                                <path d="M17 16v-4" stroke="#ff8c00" stroke-width="1.6" />
                            </svg>

                            <h5 class="fw-bold mb-2" style="color:#ffb36b;">Data Analysis</h5>
                            <p class="mb-0">Python, Pandas, SQL and data visualization for real projects.</p>
                        </div>
                    </div>
                </div>

                <!-- 5) Mobile Application -->
                <div class="col-12 col-md-6 col-lg-4" data-aos="fade-up" data-aos-duration="1400">
                    <div class="track-card position-relative overflow-hidden rounded-4 h-100">
                        <div class="card-front text-center p-4">
                            <img src="{{ asset('images/appDeveloper.jpg') }}" alt="Mobile Application"
                                class="img-fluid rounded-3 mb-3" loading="lazy" style="max-height:200px; object-fit:cover;">
                            <h5 class="track-title fw-bold mb-0">Mobile Application</h5>
                        </div>

                        <div class="card-back p-4 d-flex flex-column justify-content-center align-items-center text-center">
                            <!-- SVG mobile -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="92" height="92" viewBox="0 0 24 24" fill="none"
                                class="mb-3">
                                <rect x="7" y="3" width="10" height="18" stroke="#ff8c00" stroke-width="1.2" rx="2"
                                    fill="none" />
                                <circle cx="12" cy="18" r="1" fill="#ff8c00" />
                            </svg>

                            <h5 class="fw-bold mb-2" style="color:#ffb36b;">Mobile Application</h5>
                            <p class="mb-0">Build native & cross-platform apps with Flutter / React Native.</p>
                        </div>
                    </div>
                </div>

                <!-- 6) AI -->
                <div class="col-12 col-md-6 col-lg-4" data-aos="fade-up" data-aos-duration="1500">
                    <div class="track-card position-relative overflow-hidden rounded-4 h-100">
                        <div class="card-front text-center p-4">
                            <img src="{{ asset('images/ai.jpg') }}" alt="AI" class="img-fluid rounded-3 mb-3" loading="lazy"
                                style="max-height:200px; object-fit:cover;">
                            <h5 class="track-title fw-bold mb-0">AI & Machine Learning</h5>
                        </div>

                        <div class="card-back p-4 d-flex flex-column justify-content-center align-items-center text-center">
                            <!-- SVG brain -->
                            <svg xmlns="http://www.w3.org/2000/svg" width="92" height="92" viewBox="0 0 24 24" fill="none"
                                class="mb-3">
                                <path d="M12 3c3 0 5 2 5 5v8c0 3-2 5-5 5s-5-2-5-5V8c0-3 2-5 5-5z" stroke="#ff8c00"
                                    stroke-width="1.4" fill="none" />
                                <path d="M9 12h6" stroke="#ff8c00" stroke-width="1.4" stroke-linecap="round" />
                            </svg>

                            <h5 class="fw-bold mb-2" style="color:#ffb36b;">AI & Machine Learning</h5>
                            <p class="mb-0">Intro to ML, neural nets, and practical AI projects.</p>
                        </div>
                    </div>
                </div>

            </div> {{-- /.row --}}
        </div> {{-- /.container --}}
    </section>

    <!-- ====== Styles (add to your CSS file or inside a <style> block) ====== -->



    {{-- ================== SECTION 7: Statistics ================== --}}
            <section class="mh-section mt-2 " style="overflow:hidden;">
        <div class=" rounded-5 p-5 shadow-lg"
            style="background: linear-gradient(135deg, #2c3e91 0%, #3d5cb8 100%); color:#fff;">

            <!-- Intro -->
            <div class="text-center mb-5" data-aos="fade-down" data-aos-duration="1000">
                <h3 class="fw-bold mb-2">Our Statistics</h3>
                <p class="lead">Numbers that showcase our journey, impact, and growth 🚀</p>
            </div>

            <!-- Stats grid -->
            <div class="row g-4 text-center">
                <!-- Students -->
                <div class="col-12 col-md-4" data-aos="fade-up" data-aos-duration="1000">
                    <div class="stat-card rounded-4 p-4 shadow h-100">
                        <h2 class="counter fw-bold mb-2" data-target="100">0</h2>
                        <p class="fw-semibold text-warning">Students</p>
                        <p class="small fade-text">Over 100 learners trusted us to guide their career path.</p>
                    </div>
                </div>
                <!-- Courses -->
                <div class="col-12 col-md-4" data-aos="fade-up" data-aos-duration="1200">
                    <div class="stat-card rounded-4 p-4 shadow h-100">
                        <h2 class="counter fw-bold mb-2" data-target="30">0</h2>
                        <p class="fw-semibold text-warning">Courses</p>
                        <p class="small fade-text">We designed courses that match the real-world tech industry.</p>
                    </div>
                </div>
                <!-- Projects -->
                <div class="col-12 col-md-4" data-aos="fade-up" data-aos-duration="1400">
                    <div class="stat-card rounded-4 p-4 shadow h-100">
                        <h2 class="counter fw-bold mb-2" data-target="50">0</h2>
                        <p class="fw-semibold text-warning">Projects</p>
                        <p class="small fade-text">Practical projects delivered with teamwork & mentorship.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ====== Styles ====== -->
    <!-- <style>
                            body {
                                overflow-x: hidden;
                            }

                            .hero-section {
                                min-height: 100vh;
                                background: linear-gradient(135deg, #07103a 0%, #0b254d 55%, #082033 100%);
                                color: #fff;
                                border-radius: 40px;
                                overflow-x: hidden;
                                margin: 20px;
                                position: relative;
                            }

                            .hero-section::before {
                                content: '';
                                position: absolute;
                                top: 0;
                                left: 0;
                                right: 0;
                                bottom: 0;
                                border-radius: 40px;
                                padding: 2px;
                                background: linear-gradient(135deg, #06b6d4, #3b82f6);
                                -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
                                -webkit-mask-composite: xor;
                                mask-composite: exclude;
                                pointer-events: none;
                            }

                            .svg-container {
                                max-width: 100%;
                                height: auto;
                            }

                            .typing {
                                font-family: monospace;
                                fill: #9ad6ff;
                                font-size: 12px;
                            }

                            .caret {
                                fill: #9ad6ff;
                                animation: blink 1s steps(2, end) infinite;
                            }

                            @keyframes blink {
                                50% {
                                    opacity: 0;
                                }
                            }

                            .pulse {
                                animation: pulse 2s infinite;
                            }

                            @keyframes pulse {
                                0% {
                                    r: 4;
                                    opacity: 1;
                                }

                                50% {
                                    r: 9;
                                    opacity: 0.3;
                                }

                                100% {
                                    r: 4;
                                    opacity: 1;
                                }
                            }

                            .trace {
                                stroke: url(#grad-tech);
                                stroke-width: 2.5;
                                stroke-linecap: round;
                                stroke-dasharray: 6 10;
                                animation: dash 3s linear infinite;
                            }

                            @keyframes dash {
                                to {
                                    stroke-dashoffset: -20;
                                }
                            }

                            .code-line {
                                opacity: 0;
                                animation: fadeIn 0.5s forwards;
                            }

                            @keyframes fadeIn {
                                to {
                                    opacity: 1;
                                }
                            }

                            /* Responsive adjustments */
                            @media (max-width: 768px) {
                                .hero-section {
                                    margin: 10px;
                                    border-radius: 20px;
                                }

                                .hero-section::before {
                                    border-radius: 20px;
                                }

                                .display-4 {
                                    font-size: 2.5rem;
                                }
                            }
















                            .stat-card {
                                background: rgba(255, 255, 255, 0.05);
                                transition: transform .3s ease, box-shadow .3s ease;
                                cursor: default;
                            }

                            .stat-card:hover {
                                transform: scale(1.05);
                                box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
                            }

                            .stat-card h2 {
                                color: #ffb347;
                                /* orange accent for numbers */
                                font-size: 2.8rem;
                            }

                            .fade-text {
                                opacity: 0;
                                transform: translateY(10px);
                                transition: all 0.8s ease;
                            }

                            .fade-text.show {
                                opacity: 1;
                                transform: translateY(0);
                            }

                            @media (max-width: 576px) {
                                .stat-card h2 {
                                    font-size: 2rem;
                                }
                            }
                        </style> -->

    <style>
        /* ====== GLOBAL STYLES ====== */
        body {
            overflow-x: hidden;
        }

        .mh-section {
            margin: 10px 0;
            border-radius: 30px;
            overflow: hidden;
        }

        /* Hero Section */
        .hero-section {
            min-height: 100vh;
            background: linear-gradient(135deg, #07103a 0%, #0b254d 55%, #082033 100%);
            color: #fff;
            border-radius: 30px;
            overflow-x: hidden;
            position: relative;
            margin: 10px;
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            border-radius: 30px;
            padding: 2px;
            background: linear-gradient(135deg, #06b6d4, #3b82f6);
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            pointer-events: none;
        }

        .svg-container {
            max-width: 100%;
            height: auto;
        }

        .typing {
            font-family: monospace;
            fill: #9ad6ff;
            font-size: 12px;
        }

        .caret {
            fill: #9ad6ff;
            animation: blink 1s steps(2, end) infinite;
        }

        @keyframes blink {
            50% {
                opacity: 0;
            }
        }

        .pulse {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% {
                r: 4;
                opacity: 1;
            }

            50% {
                r: 9;
                opacity: 0.3;
            }

            100% {
                r: 4;
                opacity: 1;
            }
        }

        .trace {
            stroke: url(#grad-tech);
            stroke-width: 2.5;
            stroke-linecap: round;
            stroke-dasharray: 6 10;
            animation: dash 3s linear infinite;
        }

        @keyframes dash {
            to {
                stroke-dashoffset: -20;
            }
        }

        .code-line {
            opacity: 0;
            animation: fadeIn 0.5s forwards;
        }

        @keyframes fadeIn {
            to {
                opacity: 1;
            }
        }

        /* About Section */
        .about-section {
            background: linear-gradient(135deg, #1a2c5f 0%, #2a458a 100%);
            color: #fff;
            border-radius: 30px;
            overflow: hidden;
        }

        /* Services Section */
        .services-section {
            background: linear-gradient(135deg, #0b254d 0%, #1a3a7a 100%);
            color: #fff;
            border-radius: 30px;
            overflow: hidden;
        }

        .service-card {
            background: rgba(255, 255, 255, 0.05);
            color: #fff;
            border-radius: 1rem;
            transition: all 0.4s ease;
            height: 100%;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .service-card i {
            transition: color 0.4s ease, transform 0.4s ease;
            color: #06b6d4;
        }

        .service-card:hover {
            transform: translateY(-10px);
            background: rgba(6, 182, 212, 0.1);
            box-shadow: 0 10px 25px rgba(6, 182, 212, 0.2);
        }

        .service-card:hover i {
            color: #3b82f6;
            transform: scale(1.2);
        }

        /* Features Section */
        .features-section {
            background: linear-gradient(135deg, #2c3e91 0%, #3d5cb8 100%);
            color: #fff;
            border-radius: 30px;
            overflow: hidden;
        }

        .feature-card {
            background: rgba(255, 255, 255, 0.05);
            color: #fff;
            border-radius: 1rem;
            transition: all 0.4s ease;
            height: 100%;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .feature-card i {
            transition: color 0.4s ease, transform 0.4s ease;
            color: #ff8c00;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            background: rgba(255, 140, 0, 0.1);
            box-shadow: 0 10px 25px rgba(255, 140, 0, 0.2);
        }

        .feature-card:hover i {
            color: #ffb347;
            transform: scale(1.2);
        }

        /* Banner Section */
        .banner-section {
            border-radius: 30px;
            overflow: hidden;
        }

        /* Tracks Section */
        .tracks-section {
            background: linear-gradient(135deg, #0b254d 0%, #1a3a7a 100%);
            color: #fff;
            border-radius: 30px;
            overflow: hidden;
        }

        .track-card {
            background: rgba(255, 255, 255, 0.02);
            transition: transform .35s ease, box-shadow .35s ease;
            box-shadow: 0 10px 30px rgba(47, 79, 163, 0.12);
            cursor: pointer;
            min-height: 320px;
            height: 100%;
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            overflow: hidden;
        }

        .track-card .card-front,
        .track-card .card-back {
            width: 100%;
            height: 100%;
            position: relative;
            transition: opacity .28s ease, transform .28s ease, visibility .28s ease;
        }

        .track-card .card-front {
            z-index: 2;
        }

        .track-card .card-back {
            position: absolute;
            top: 0;
            left: 0;
            z-index: 1;
            opacity: 0;
            visibility: hidden;
            background: rgba(0, 0, 0, 0.8);
        }

        .track-card:hover {
            transform: scale(1.05);
            box-shadow: 0 18px 40px rgba(47, 79, 163, 0.26);
        }

        .track-card:hover .card-front {
            opacity: 0;
            visibility: hidden;
            transform: scale(0.98);
        }

        .track-card:hover .card-back {
            opacity: 1;
            visibility: visible;
            z-index: 3;
            transform: none;
        }

        .track-card .track-title {
            color: #fff;
        }

        .track-card .card-back h5 {
            margin-bottom: 6px;
            color: #ffb347;
        }

        .track-card .card-back p {
            font-size: 0.95rem;
            color: #ffe8cc;
        }

        /* Statistics Section */
        .stats-section {
            background: linear-gradient(135deg, #2c3e91 0%, #3d5cb8 100%);
            color: #fff;
            border-radius: 30px;
            overflow: hidden;
        }

        .stat-card {
            background: rgba(255, 255, 255, 0.05);
            transition: transform .3s ease, box-shadow .3s ease;
            cursor: default;
            border-radius: 15px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            height: 100%;
        }

        .stat-card:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
            background: rgba(255, 255, 255, 0.08);
        }

        .stat-card h2 {
            color: #ffb347;
            font-size: 2.8rem;
        }

        .fade-text {
            opacity: 0;
            transform: translateY(10px);
            transition: all 0.8s ease;
        }

        .fade-text.show {
            opacity: 1;
            transform: translateY(0);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .hero-section {
                margin: 5px;
                border-radius: 20px;
            }

            .hero-section::before {
                border-radius: 20px;
            }

            .mh-section {
                margin: 5px 0;
                border-radius: 20px;
            }

            .display-4 {
                font-size: 2.2rem;
            }

            .stat-card h2 {
                font-size: 2rem;
            }

            .track-card {
                min-height: 260px;
            }

            .banner-text {
                font-size: 1.8rem;
            }

            .banner-text-small {
                font-size: 1rem;
            }
        }

        @media (max-width: 576px) {
            .track-card {
                min-height: 240px;
            }

            .banner-text {
                font-size: 1.5rem;
            }

            .banner-text-small {
                font-size: 0.9rem;
            }

            .stat-card h2 {
                font-size: 1.8rem;
            }
        }
    </style>


    <!-- ====== Counter & Text Animation Script ====== -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const counters = document.querySelectorAll(".counter");
            const fadeTexts = document.querySelectorAll(".fade-text");

            const animateCounters = (entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const counter = entry.target.querySelector(".counter");
                        const fadeText = entry.target.querySelector(".fade-text");

                        let target = +counter.getAttribute("data-target");
                        let count = 0;
                        let step = Math.ceil(target / 100);

                        const updateCount = () => {
                            if (count < target) {
                                count += step;
                                counter.innerText = count;
                                setTimeout(updateCount, 30);
                            } else {
                                counter.innerText = target + "+";
                                fadeText.classList.add("show"); // Show extra text with animation
                            }
                        };
                        updateCount();

                        observer.unobserve(entry.target); // run once
                    }
                });
            };

            const observer = new IntersectionObserver(animateCounters, { threshold: 0.4 });
            document.querySelectorAll(".stat-card").forEach(card => observer.observe(card));
        });
    </script>





    <!-- {{-- ================== STYLES ================== --}}
                        <style>
                            /* track-card base */
                            .track-card {
                                background: rgba(255, 255, 255, 0.02);
                                transition: transform .35s ease, box-shadow .35s ease;
                                box-shadow: 0 10px 30px rgba(47, 79, 163, 0.12);
                                /* shadow base with #2f4fa3 hue */
                                cursor: pointer;
                                min-height: 320px;
                            }

                            .track-card .card-front,
                            .track-card .card-back {
                                width: 100%;
                                height: 100%;
                                position: relative;
                                transition: opacity .28s ease, transform .28s ease, visibility .28s ease;
                            }

                            /* front shows by default */
                            .track-card .card-front {
                                z-index: 2;
                            }

                            .track-card .card-back {
                                position: absolute;
                                top: 0;
                                left: 0;
                                z-index: 1;
                                opacity: 0;
                                visibility: hidden;
                                background: rgba(0, 0, 0, 0.6);
                            }

                            /* hover: scale + swap views */
                            .track-card:hover {
                                transform: scale(1.1);
                                box-shadow: 0 18px 40px rgba(47, 79, 163, 0.26);
                            }

                            .track-card:hover .card-front {
                                opacity: 0;
                                visibility: hidden;
                                transform: scale(0.98);
                            }

                            .track-card:hover .card-back {
                                opacity: 1;
                                visibility: visible;
                                z-index: 3;
                                transform: none;
                            }

                            /* titles on front */
                            .track-card .track-title {
                                color: #fff;
                            }

                            /* back content */
                            .track-card .card-back h5 {
                                margin-bottom: 6px;
                            }

                            .track-card .card-back p {
                                font-size: 0.95rem;
                                color: #ffe8cc;
                            }

                            /* responsive tweaks */
                            @media (max-width: 576px) {
                                .track-card {
                                    min-height: 260px;
                                }

                                .track-card img {
                                    max-height: 140px;
                                }
                            }



                            @media (max-width: 576px) {

                                /* phones */
                                .banner-text {
                                    font-size: 1.5rem;
                                    /* أصغر من display-4 */
                                }

                                .banner-text-small {
                                    font-size: 1rem;
                                    /* أصغر من lead */
                                }
                            }


                            .hero-section {
                                overflow-x: hidden;
                                padding-left: 0;
                                padding-right: 0;
                            }


                            .feature-card {
                                background: rgba(255, 255, 255, 0.05);
                                color: #fff;
                                border-radius: 1rem;
                                transition: all 0.4s ease;
                                box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
                            }

                            .feature-card i {
                                transition: color 0.4s ease, transform 0.4s ease;
                            }

                            .feature-card:hover {
                                transform: scale(1.05);
                                background: #000;
                                color: #ff8c00 !important;
                            }

                            .feature-card:hover i {
                                color: #ff8c00 !important;
                                transform: rotate(-10deg) scale(1.2);
                            }



                            .service-card {
                                background: rgba(255, 255, 255, 0.05);
                                color: #fff;
                                border-radius: 1rem;
                                transition: all 0.4s ease;
                            }

                            .service-card i {
                                transition: color 0.4s ease, transform 0.4s ease;
                            }

                            .service-card:hover {
                                transform: scale(1.1);
                                background: #000;
                                color: #ff8c00 !important;
                                /* نصوص برتقالي */
                            }

                            .service-card:hover i {
                                color: #ff8c00 !important;
                                transform: rotate(-10deg) scale(1.2);
                            }

                            .svg-tech {
                                max-width: 100%;
                                height: auto;
                            }

                            .trace {
                                stroke-dasharray: 200;
                                stroke-dashoffset: 200;
                                animation: draw 2s ease forwards;
                            }

                            @keyframes draw {
                                to {
                                    stroke-dashoffset: 0;
                                }
                            }

                            .pulse {
                                animation: pulse 2s ease-in-out infinite;
                            }

                            .pulse.delay1 {
                                animation-delay: .4s;
                            }

                            .pulse.delay2 {
                                animation-delay: .8s;
                            }

                            .pulse.delay3 {
                                animation-delay: 1.2s;
                            }

                            @keyframes pulse {

                                0%,
                                100% {
                                    transform: scale(1);
                                    opacity: .9;
                                }

                                50% {
                                    transform: scale(1.3);
                                    opacity: .5;
                                }
                            }

                            .ring {
                                transform-origin: center;
                                animation: spin 10s linear infinite;
                            }

                            @keyframes spin {
                                to {
                                    transform: rotate(360deg);
                                }
                            }

                            .animated-line .content {
                                transition: all .35s ease;
                                font-size: 1.1rem;
                                font-weight: 500;
                            }

                            .animated-line .content.fade-out {
                                opacity: 0;
                                transform: translateY(-8px);
                            }

                            /* Scroll animations */
                            [data-animate] {
                                opacity: 0;
                                transform: translateY(40px);
                                transition: all 1s ease;
                            }

                            [data-animate].visible {
                                opacity: 1;
                                transform: translateY(0);
                            }

                            [data-animate="fade-right"] {
                                transform: translateX(-40px);
                            }

                            [data-animate="fade-left"] {
                                transform: translateX(40px);
                            }

                            </> {
                                    {
                                    --==================SCRIPTS==================--
                                }
                            } -->

    <script> // Animated text lines

        document.addEventListener('DOMContentLoaded', function () {
            const lines = [['Learn from industry experts', 'Hands-on projects', 'Get certified'],
            ['Career coaching', 'Resume & interviews', 'Job placement support'],
            ['Flexible schedules', 'Affordable pricing', 'Community & mentorship']];
            const lineContainers = document.querySelectorAll('#animated-lines .content');

            lineContainers.forEach((el, idx) => {
                el.textContent = lines[idx][0];
                el.dataset.index = 0;
            });

            lineContainers.forEach((el, idx) => {
                setInterval(() => {
                    const arr = lines[idx];
                    let i = parseInt(el.dataset.index, 10);
                    el.classList.add('fade-out');

                    setTimeout(() => {
                        i = (i + 1) % arr.length;
                        el.textContent = arr[i];
                        el.dataset.index = i;
                        el.classList.remove('fade-out');
                    }

                        , 350);
                }

                    , 2600 + idx * 300);
            });
        });

        // Scroll animation
        window.addEventListener('scroll', () => {
            document.querySelectorAll('[data-animate]').forEach(el => {
                const rect = el.getBoundingClientRect();

                if (rect.top < window.innerHeight - 100) {
                    el.classList.add('visible');
                }
            });
        });
</script>@endsection