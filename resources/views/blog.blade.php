@extends('client.app')

@section('content')
    <!-- Hero Section -->
    <section class="text-center py-5 mb-5"
        style="background: linear-gradient(135deg, #3B38A0 0%, #1A2A80 100%); border-radius: 20px;" data-aos="fade-down">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h1 class="text-info mb-3 display-4 fw-bold" data-aos="zoom-in" data-aos-delay="200">
                        <i class="bi bi-journal-text me-3"></i>CodeCraft Blog
                    </h1>
                    <p class="text-white lead fs-5" data-aos="fade-up" data-aos-delay="400">
                        Explore cutting-edge coding tutorials, tech innovations, and inspiring developer stories.
                        Level up your programming skills with our expert insights and latest industry updates!
                    </p>
                    <div class="mt-4" data-aos="fade-up" data-aos-delay="600">
                        <span class="badge bg-info fs-6 me-2 px-3 py-2">🚀 Latest Trends</span>
                        <span class="badge bg-warning fs-6 me-2 px-3 py-2">💡 Pro Tips</span>
                        <span class="badge bg-success fs-6 px-3 py-2">🔧 Tutorials</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <!-- Blog Loop -->
        @foreach ($blogs as $index => $blog)
            <section class="row align-items-center mb-5 p-4 shadow-lg blog-card"
                style="background: linear-gradient(135deg, #3B38A0 0%, #2A2870 100%); border-radius: 20px; border-left: 5px solid #00FFFF;"
                data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">

                <!-- Blog Content -->
                <div class="col-lg-7 col-md-6 text-start mb-4 mb-md-0">
                    <h2 class="text-info mb-3 fw-bold">{{ $blog->title }}</h2>

                    <!-- Blog Meta -->
                    <div class="d-flex flex-wrap text-light small mb-3 gap-3">
                        <span class="d-flex align-items-center">
                            <i class="bi bi-person-circle me-2 text-warning"></i>
                            {{ $blog->author ?? 'MH-Code Team' }}
                        </span>
                        <span class="d-flex align-items-center">
                            <i class="bi bi-calendar-event me-2 text-success"></i>
                            {{ $blog->created_at->format('M d, Y') }}
                        </span>

                        <span class="d-flex align-items-center">
                            <i class="bi bi-clock me-2 text-primary"></i>
                            {{ rand(3, 7) }} min read
                        </span>
                    </div>

                    <!-- Full Blog Content -->
                    <div class="text-white mb-4" style="line-height: 1.8;">
                        {!! $blog->content !!}
                    </div>

                    <!-- Tags -->
                    <div class="mt-3">
                        <span class="badge bg-light text-dark me-2 mb-2 px-3 py-2">
                            <i class="bi bi-code-slash me-1"></i> AI
                        </span>
                        <span class="badge bg-info text-dark me-2 mb-2 px-3 py-2">
                            <i class="bi bi-laptop me-1"></i> Web Dev
                        </span>
                        <span class="badge bg-warning text-dark mb-2 px-3 py-2">
                            <i class="bi bi-lightbulb me-1"></i> Tips
                        </span>
                        <!-- Cybersecurity Badge -->
                        <span class="badge mb-2 px-3 py-2" style="background-color: #FF4D4F; color: #FFFFFF;">
                            <i class="bi bi-shield-lock me-1"></i> Cybersecurity
                        </span>

                        <!-- Mobile Application Badge -->
                        <span class="badge mb-2 px-3 py-2" style="background-color: #1E90FF; color: #FFFFFF;">
                            <i class="bi bi-phone me-1"></i> Mobile Application
                        </span>

                    </div>
                </div>

                <!-- Blog Image -->
                <div class="col-lg-5 col-md-6 text-center">
                    <div class="image-container" data-aos="zoom-in" data-aos-delay="{{ $index * 100 + 200 }}">
                        @if($blog->image)
                            <img src="{{ asset('storage/' . $blog->image) }}" class="img-fluid rounded shadow blog-image"
                                alt="{{ $blog->title }}" loading="lazy" onload="this.style.opacity='1'">
                        @else
                            <img src="https://images.unsplash.com/photo-1555066931-4365d14bab8c?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80"
                                class="img-fluid rounded shadow blog-image" alt="Coding Illustration" loading="lazy"
                                onload="this.style.opacity='1'">
                        @endif
                        <div class="image-overlay"></div>
                    </div>
                </div>
            </section>

        @endforeach

        <!-- Featured Highlights -->
        <section class="text-center mb-5 p-5 shadow-lg"
            style="background: linear-gradient(135deg, #1A2A80 0%, #113F67 100%); border-radius: 20px;" data-aos="zoom-in">
            <h2 class="text-info mb-4 display-5 fw-bold">
                <i class="bi bi-stars me-3"></i>Featured Highlights
            </h2>
            <p class="text-white mb-5 lead">Curated insights from our expert coding academy team</p>

            <div class="row g-4">
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature-card p-4 rounded-3 h-100">
                        <div class="icon-container mb-3">
                            <i class="bi bi-terminal display-4 text-info"></i>
                        </div>
                        <h5 class="text-warning mb-3">Best Practices</h5>
                        <p class="text-light">10 essential tips to write cleaner, more maintainable Laravel code that
                            scales.</p>
                        <span class="badge bg-info">Advanced</span>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="feature-card p-4 rounded-3 h-100">
                        <div class="icon-container mb-3">
                            <i class="bi bi-cpu display-4 text-info"></i>
                        </div>
                        <h5 class="text-warning mb-3">AI & Coding</h5>
                        <p class="text-light">How artificial intelligence is revolutionizing software development workflows.
                        </p>
                        <span class="badge bg-success">Trending</span>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
                    <div class="feature-card p-4 rounded-3 h-100">
                        <div class="icon-container mb-3">
                            <i class="bi bi-globe display-4 text-info"></i>
                        </div>
                        <h5 class="text-warning mb-3">Career Growth</h5>
                        <p class="text-light">Building a standout portfolio that gets you hired for remote developer
                            positions.</p>
                        <span class="badge bg-warning text-dark">Career</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Categories & Tags -->
        <section class="row mb-5 g-4">
            <div class="col-lg-6" data-aos="fade-right">
                <div class="p-4 rounded-3 shadow-lg h-100"
                    style="background: linear-gradient(135deg, #3B38A0 0%, #2A2870 100%);">
                    <h4 class="text-info mb-4">
                        <i class="bi bi-folder2-open me-2"></i>Popular Categories
                    </h4>
                    <div class="row g-3">
                        <div class="col-6">
                            <div class="category-item p-3 rounded-2 text-center">
                                <i class="bi bi-globe2 display-6 text-warning mb-2"></i>
                                <h6 class="text-white">Web Development</h6>
                                <small class="text-info">12 Articles</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="category-item p-3 rounded-2 text-center">
                                <i class="bi bi-phone display-6 text-warning mb-2"></i>
                                <h6 class="text-white">Mobile Apps</h6>
                                <small class="text-info">8 Articles</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="category-item p-3 rounded-2 text-center">
                                <i class="bi bi-robot display-6 text-warning mb-2"></i>
                                <h6 class="text-white">AI & ML</h6>
                                <small class="text-info">15 Articles</small>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="category-item p-3 rounded-2 text-center">
                                <i class="bi bi-tools display-6 text-warning mb-2"></i>
                                <h6 class="text-white">DevOps</h6>
                                <small class="text-info">6 Articles</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6" data-aos="fade-left">
                <div class="p-4 rounded-3 shadow-lg h-100"
                    style="background: linear-gradient(135deg, #3B38A0 0%, #2A2870 100%);">
                    <h4 class="text-info mb-4">
                        <i class="bi bi-tags me-2"></i>Popular Tags
                    </h4>
                    <div class="d-flex flex-wrap gap-2">
                        <span class="badge bg-light text-dark px-3 py-2 fs-6">#Laravel</span>
                        <span class="badge bg-info text-dark px-3 py-2 fs-6">#ReactJS</span>
                        <span class="badge bg-warning text-dark px-3 py-2 fs-6">#AI</span>
                        <span class="badge bg-success px-3 py-2 fs-6">#Flutter</span>
                        <span class="badge bg-danger px-3 py-2 fs-6">#Database</span>
                        <span class="badge bg-primary px-3 py-2 fs-6">#VueJS</span>
                        <span class="badge bg-secondary px-3 py-2 fs-6">#Docker</span>
                        <span class="badge bg-dark px-3 py-2 fs-6">#TypeScript</span>
                        <span class="badge bg-info px-3 py-2 fs-6">#APIs</span>
                        <span class="badge bg-warning px-3 py-2 fs-6">#Cloud</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Newsletter Section -->
        <section class="text-center mb-5 p-5 shadow-lg"
            style="background: linear-gradient(135deg, #113F67 0%, #0A2A4A 100%); border-radius: 20px;" data-aos="fade-up">
            <h2 class="text-info mb-3 display-5 fw-bold">📬 Stay Updated</h2>
            <p class="text-white lead mb-4">Get the latest coding tips and tutorials delivered to your inbox</p>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control form-control-lg" placeholder="Enter your email">
                        <button class="btn btn-info px-4 fw-bold">Subscribe</button>
                    </div>
                    <small class="text-light">No spam ever. Unsubscribe anytime.</small>
                </div>
            </div>
        </section>

        <!-- Call to Action -->
        <section class="text-center mb-5 p-5 shadow-lg"
            style="background: linear-gradient(135deg, #3B38A0 0%, #1A2A80 100%); border-radius: 20px;" data-aos="fade-up">
            <h2 class="text-info mb-3 display-5 fw-bold">🚀 Ready to Level Up Your Skills?</h2>
            <p class="text-white lead mb-4">Join 10,000+ developers in our coding academy and transform your career!</p>
            <div class="d-flex flex-wrap justify-content-center gap-3">
                <a href="{{ route('course') }}" class="btn btn-info fw-bold px-5 py-3 fs-5">
                    <i class="bi bi-rocket-takeoff me-2"></i>Explore Courses
                </a>
                <a href="#" class="btn btn-outline-light fw-bold px-5 py-3 fs-5">
                    <i class="bi bi-journal-code me-2"></i>View Tutorials
                </a>
            </div>
        </section>
    </div>
@endsection

@push('styles')
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- AOS Animation CSS -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <style>
        .blog-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .blog-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3) !important;
        }

        .image-container {
            position: relative;
            overflow: hidden;
            border-radius: 15px;
        }

        .blog-image {
            width: 100%;
            height: 300px;
            object-fit: cover;
            transition: transform 0.5s ease;
            opacity: 0;
            transition: opacity 0.5s ease;
        }

        .image-container:hover .blog-image {
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

        .feature-card {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: transform 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-5px);
            background: rgba(255, 255, 255, 0.15);
        }

        .icon-container {
            width: 80px;
            height: 80px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .category-item {
            background: rgba(255, 255, 255, 0.1);
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .category-item:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: scale(1.05);
        }

        .btn {
            transition: all 0.3s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .display-4 {
                font-size: 2.5rem;
            }

            .display-5 {
                font-size: 2rem;
            }

            .lead {
                font-size: 1.1rem;
            }

            section {
                padding: 2rem 1rem !important;
            }
        }
    </style>
@endpush

@push('scripts')
    <!-- AOS Animation JS -->
    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            AOS.init({
                duration: 1000,
                once: true,
                easing: 'ease-in-out',
                offset: 100
            });

            // Lazy loading enhancement
            const images = document.querySelectorAll('img[loading="lazy"]');

            const imageObserver = new IntersectionObserver((entries, observer) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.src;
                        imageObserver.unobserve(img);
                    }
                });
            });

            images.forEach(img => imageObserver.observe(img));
        });
    </script>
@endpush