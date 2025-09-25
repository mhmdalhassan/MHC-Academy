@extends('client.app')

@section('content')
    <!-- Hero Section -->
    <section class="text-center py-5 mb-5" style="background-color: #3B38A0; border-radius: 12px;" data-aos="fade-down">
        <div class="container">
            <h1 class="text-info mb-3">Welcome to Our Blog</h1>
            <p class="text-white lead">
                Explore coding tutorials, tech news, and inspiring stories.
                Stay ahead in your coding journey with our latest updates!
            </p>
        </div>
    </section>

    <div class="container">
        <!-- Blog Loop -->
        @foreach ($blogs as $blog)
            <section class="row align-items-center mb-5 p-5 shadow-lg" style="background-color: #3B38A0; border-radius: 20px;"
                data-aos="fade-up" data-aos-duration="1000">

                <!-- Blog Content -->
                <div class="col-md-7 text-start mb-3 mb-md-0">
                    <h2 class="text-info mb-3">{{ $blog->title }}</h2>

                    <!-- Blog Meta -->
                    <div class="d-flex flex-wrap text-light small mb-3 gap-3">
                        <span><i class="bi bi-person-circle me-1"></i> By {{ $blog->author ?? 'Admin' }}</span>
                        <span><i class="bi bi-calendar-event me-1"></i> {{ $blog->created_at->format('M d, Y') }}</span>
                        <span><i class="bi bi-tags me-1"></i> {{ $blog->category ?? 'Coding' }}</span>
                        <span><i class="bi bi-clock me-1"></i> {{ rand(3, 7) }} min read</span>
                    </div>

                    <!-- Blog Body -->
                    <p class="text-white" style="white-space: pre-line;">{{ $blog->content }}</p>

                    <!-- Tags -->
                    <div class="mt-3">
                        <span class="badge bg-light text-dark me-2"><i class="bi bi-code-slash"></i> Laravel</span>
                        <span class="badge bg-info text-dark me-2"><i class="bi bi-laptop"></i> Web Dev</span>
                        <span class="badge bg-warning text-dark"><i class="bi bi-lightbulb"></i> Tips</span>
                    </div>
                </div>

                <!-- Blog Image -->
                <div class="col-md-5 text-center">
                    @if($blog->image)
                        <img src="{{ asset('storage/' . $blog->image) }}" class="img-fluid rounded shadow" alt="{{ $blog->title }}"
                            style="max-height: 300px; object-fit: cover;" loading="lazy">
                    @else
                        <img src="https://via.placeholder.com/500x300" class="img-fluid rounded shadow" alt="Blog Image"
                            style="max-height: 300px; object-fit: cover;" loading="lazy">
                    @endif
                </div>
            </section>
        @endforeach

        <!-- Featured Highlights -->
        <section class="text-center mb-5 p-5 shadow-lg" style="background-color: #1A2A80; border-radius: 20px;"
            data-aos="zoom-in">
            <h2 class="text-info mb-3">🔥 Featured Highlights</h2>
            <p class="text-white mb-4">Quick reads from our coding academy team:</p>
            <div class="row text-white">
                <div class="col-md-4 mb-3" data-aos="fade-up">
                    <i class="bi bi-terminal display-4 text-info mb-2"></i>
                    <h5>Best Practices</h5>
                    <p>10 tips to write cleaner Laravel code.</p>
                </div>
                <div class="col-md-4 mb-3" data-aos="fade-up" data-aos-delay="200">
                    <i class="bi bi-cpu display-4 text-info mb-2"></i>
                    <h5>AI & Coding</h5>
                    <p>How AI is shaping the future of software development.</p>
                </div>
                <div class="col-md-4 mb-3" data-aos="fade-up" data-aos-delay="400">
                    <i class="bi bi-globe display-4 text-info mb-2"></i>
                    <h5>Career Growth</h5>
                    <p>Building a strong portfolio for remote jobs.</p>
                </div>
            </div>
        </section>

        <!-- Categories & Tags -->
        <section class="row mb-5">
            <div class="col-md-6 mb-3" data-aos="fade-right">
                <div class="p-4 rounded shadow-lg" style="background-color:#3B38A0;">
                    <h4 class="text-info mb-3"><i class="bi bi-folder"></i> Popular Categories</h4>
                    <ul class="list-unstyled text-white">
                        <li>🌐 Web Development</li>
                        <li>📱 Mobile Apps</li>
                        <li>🤖 Artificial Intelligence</li>
                        <li>🛠 DevOps & Tools</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-6 mb-3" data-aos="fade-left">
                <div class="p-4 rounded shadow-lg" style="background-color:#3B38A0;">
                    <h4 class="text-info mb-3"><i class="bi bi-tags"></i> Popular Tags</h4>
                    <div class="d-flex flex-wrap gap-2">
                        <span class="badge bg-light text-dark">#Laravel</span>
                        <span class="badge bg-info text-dark">#React</span>
                        <span class="badge bg-warning text-dark">#AI</span>
                        <span class="badge bg-success">#Flutter</span>
                        <span class="badge bg-danger">#Database</span>
                    </div>
                </div>
            </div>
        </section>

        <!-- Call to Action -->
        <section class="text-center mb-5 p-5 shadow-lg" style="background-color:#113F67; border-radius: 20px;"
            data-aos="fade-up">
            <h2 class="text-info mb-3">🚀 Ready to Start Your Coding Journey?</h2>
            <p class="text-white lead">Join our academy today and unlock your full potential!</p>
            <a href="{{ route('course') }}" class="btn btn-info fw-bold px-4 py-2 mt-3">Explore Courses</a>
        </section>
    </div>
@endsection

@push('styles')
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- AOS Animation CSS -->
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
@endpush

@push('scripts')
    <!-- AOS Animation JS -->
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