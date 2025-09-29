@extends('client.app')

@section('content')
    <!-- Hero Section -->
    <section class="text-center py-5 mb-5"
             style="background: linear-gradient(135deg, #3B38A0 0%, #1A2A80 100%); border-radius: 20px;"
             data-aos="fade-down">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h1 class="text-info mb-3 display-4 fw-bold" data-aos="zoom-in">
                        <i class="bi bi-envelope-fill me-3"></i>Get In Touch
                    </h1>
                    <p class="text-white lead fs-5" data-aos="fade-up" data-aos-delay="200">
                        Have questions about our courses? Ready to start your coding journey?
                        We're here to help you every step of the way.
                    </p>
                    <div class="mt-4" data-aos="fade-up" data-aos-delay="400">
                        <span class="badge bg-info fs-6 me-2 px-3 py-2">📧 Fast Response</span>
                        <span class="badge bg-warning text-dark fs-6 me-2 px-3 py-2">💬 Expert Advice</span>
                        <span class="badge bg-success fs-6 px-3 py-2">🆓 Free Consultation</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="container">
        <div class="row g-5 mb-5">
            <!-- Contact Form -->
            <div class="col-lg-7" data-aos="fade-right">
                <div class="p-4 rounded-3 shadow-lg contact-form-wrapper">
                    <h2 class="text-info mb-4 fw-bold">
                        <i class="bi bi-chat-dots me-2"></i>Send us a Message
                    </h2>

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="bi bi-check-circle-fill me-2"></i>{{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-triangle-fill me-2"></i>
                            <ul class="mb-0">
                                @foreach($errors->all() as $err)
                                    <li>{{ $err }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('contact.store') }}" class="needs-validation" novalidate>
                        @csrf

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label text-white fw-bold">Full Name *</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-info border-info">
                                        <i class="bi bi-person-fill text-white"></i>
                                    </span>
                                    <input type="text" name="name" value="{{ old('name') }}"
                                           class="form-control" placeholder="Your Name" required>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label text-white fw-bold">Email Address *</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-info border-info">
                                        <i class="bi bi-envelope-fill text-white"></i>
                                    </span>
                                    <input type="email" name="email" value="{{ old('email') }}"
                                           class="form-control" placeholder="your@email.com" required>
                                </div>
                            </div>

                            <div class="col-12">
                                <label class="form-label text-white fw-bold">Phone Number</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-info border-info">
                                        <i class="bi bi-phone-fill text-white"></i>
                                    </span>
                                    <input type="tel" name="phone" value="{{ old('phone') }}"
                                           class="form-control" placeholder="+1 (555) 123-4567">
                                </div>
                            </div>

                            <div class="col-12">
                                <label class="form-label text-white fw-bold">Subject *</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-info border-info">
                                        <i class="bi bi-chat-square-text-fill text-white"></i>
                                    </span>
                                    <select name="subject" class="form-select" required>
                                        <option value="">Select a subject...</option>
                                        @foreach ($products as $id => $name)
                                            <option value="{{ $name }}" {{ old('subject') == $name ? 'selected' : '' }}>
                                                {{ $name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-12">
                                <label class="form-label text-white fw-bold">Message *</label>
                                <div class="input-group">
                                    <span class="input-group-text bg-info border-info align-items-start">
                                        <i class="bi bi-pencil-fill text-white mt-1"></i>
                                    </span>
                                    <textarea name="description" class="form-control" rows="5"
                                              placeholder="Tell us about your inquiry..." required>{{ old('description') }}</textarea>
                                </div>
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn btn-info w-100 py-3 fw-bold fs-5">
                                    <i class="bi bi-send-fill me-2"></i>Send Message
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Contact Info & Team -->
            <div class="col-lg-5" data-aos="fade-left">
                <!-- Contact Information -->
                <div class="p-4 rounded-3 shadow-lg mb-4 contact-info-card">
                    <h3 class="text-info mb-4 fw-bold">
                        <i class="bi bi-info-circle me-2"></i>Contact Information
                    </h3>

                    <div class="contact-item d-flex align-items-center mb-4">
                        <div class="contact-icon bg-info rounded-circle d-flex align-items-center justify-content-center me-3">
                            <i class="bi bi-geo-alt-fill text-white"></i>
                        </div>
                        <div>
                            <h6 class="text-warning mb-1">Our Location</h6>
                            <p class="text-light small mb-0">lebanon, saida City<br>Digital Hub, DV 12345</p>
                        </div>
                    </div>

                    <div class="contact-item d-flex align-items-center mb-4">
                        <div class="contact-icon bg-info rounded-circle d-flex align-items-center justify-content-center me-3">
                            <i class="bi bi-telephone-fill text-white"></i>
                        </div>
                        <div>
                            <h6 class="text-warning mb-1">Phone Number</h6>
                            <p class="text-light small mb-0">+961 78 910 585<br>Mon-Fri, 9:00 AM - 6:00 PM</p>
                        </div>
                    </div>

                    <div class="contact-item d-flex align-items-center mb-4">
                        <div class="contact-icon bg-info rounded-circle d-flex align-items-center justify-content-center me-3">
                            <i class="bi bi-envelope-fill text-white"></i>
                        </div>
                        <div>
                            <h6 class="text-warning mb-1">Email Address</h6>
                            <p class="text-light small mb-0">mhcodeacademy@gmail.com<br>codeacademy@gmail.com</p>
                        </div>
                    </div>

                    <div class="contact-item d-flex align-items-center">
                        <div class="contact-icon bg-info rounded-circle d-flex align-items-center justify-content-center me-3">
                            <i class="bi bi-clock-fill text-white"></i>
                        </div>
                        <div>
                            <h6 class="text-warning mb-1">Response Time</h6>
                            <p class="text-light small mb-0">Within 24 hours<br>Emergency: 2-4 hours</p>
                        </div>
                    </div>
                </div>

                <!-- Instructors -->
                <div class="p-4 rounded-3 shadow-lg instructors-card">
                    <h3 class="text-info mb-4 fw-bold">
                        <i class="bi bi-people-fill me-2"></i>Meet Your Instructors
                    </h3>

                    @php
                        $instructors = [
                            ['name' => 'John Doe', 'role' => 'Web Development Expert', 'image' => 'https://i.pravatar.cc/150?img=1'],
                            ['name' => 'Jane Smith', 'role' => 'AI & Machine Learning', 'image' => 'https://i.pravatar.cc/150?img=2'],
                            ['name' => 'Michael Brown', 'role' => 'UI/UX Design Specialist', 'image' => 'https://i.pravatar.cc/150?img=3'],
                        ];
                    @endphp

                    @foreach($instructors as $index => $inst)
                    <div class="instructor-card p-3 rounded-2 mb-3" data-aos="zoom-in" data-aos-delay="{{ $index * 100 }}">
                        <div class="d-flex align-items-center">
                            <img src="{{ $inst['image'] }}"
                                 class="instructor-image rounded-circle me-3"
                                 alt="{{ $inst['name'] }}"
                                 loading="lazy">
                            <div>
                                <h6 class="text-warning mb-1">{{ $inst['name'] }}</h6>
                                <p class="text-light small mb-0">{{ $inst['role'] }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Testimonials Section -->
        <section class="text-center mb-5 p-5 rounded-3 shadow-lg testimonials-section" data-aos="fade-up">
            <h2 class="text-info mb-4 display-5 fw-bold">What Our Students Say</h2>
            <p class="text-white lead mb-5">Join thousands of satisfied students who transformed their careers</p>

            <div class="row g-4">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="testimonial-card p-4 rounded-3 h-100">
                        <div class="testimonial-icon mb-3">
                            <i class="bi bi-chat-quote-fill display-4 text-info"></i>
                        </div>
                        <p class="text-light fst-italic mb-3">
                            "The support team was incredibly helpful! They guided me through the enrollment process and answered all my questions."
                        </p>
                        <h6 class="text-warning mb-1">Sarah Johnson</h6>
                        <small class="text-info">Web Development Student</small>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="testimonial-card p-4 rounded-3 h-100">
                        <div class="testimonial-icon mb-3">
                            <i class="bi bi-chat-quote-fill display-4 text-info"></i>
                        </div>
                        <p class="text-light fst-italic mb-3">
                            "Professional instructors and excellent support! The career guidance helped me land my dream job."
                        </p>
                        <h6 class="text-warning mb-1">Ahmed Khan</h6>
                        <small class="text-info">Data Science Graduate</small>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="testimonial-card p-4 rounded-3 h-100">
                        <div class="testimonial-icon mb-3">
                            <i class="bi bi-chat-quote-fill display-4 text-info"></i>
                        </div>
                        <p class="text-light fst-italic mb-3">
                            "Quick responses and genuine care for student success. This academy truly stands out!"
                        </p>
                        <h6 class="text-warning mb-1">Maria Rodriguez</h6>
                        <small class="text-info">Mobile App Developer</small>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <style>
        .contact-form-wrapper, .contact-info-card, .instructors-card, .testimonials-section {
            background: linear-gradient(135deg, #3B38A0 0%, #2A2870 100%);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .instructor-card, .testimonial-card {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: transform 0.3s ease;
        }

        .instructor-card:hover, .testimonial-card:hover {
            transform: translateY(-3px);
            background: rgba(255, 255, 255, 0.15);
        }

        .contact-icon {
            width: 50px;
            height: 50px;
            flex-shrink: 0;
        }

        .instructor-image {
            width: 60px;
            height: 60px;
            object-fit: cover;
        }

        .testimonial-icon {
            width: 80px;
            height: 80px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
        }

        .form-control, .form-select {
            border: none;
            border-radius: 10px;
            padding: 12px 15px;
            transition: all 0.3s ease;
        }

        .form-control:focus, .form-select:focus {
            box-shadow: 0 0 0 3px rgba(0, 255, 255, 0.2);
        }

        .input-group-text {
            border-radius: 10px 0 0 10px;
        }

        .btn {
            border-radius: 10px;
            transition: all 0.3s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        .alert {
            border-radius: 10px;
            border: none;
        }

        @media (max-width: 768px) {
            .display-4 { font-size: 2.5rem; }
            .display-5 { font-size: 2rem; }
            section { padding: 2rem 1rem !important; }
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

            // Form validation
            const forms = document.querySelectorAll('.needs-validation');
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        });
    </script>
@endpush
