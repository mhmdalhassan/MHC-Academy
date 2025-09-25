@extends('client.app')

@section('content')
    <!-- Intro Section -->
    <section class="text-center py-5 mb-5" style="background-color: #3B38A0; border-radius: 12px;" data-aos="fade-up"
        data-aos-duration="900">
        <div class="container">
            <h1 class="text-info mb-3">About Our Coding Academy</h1>
            <p class="text-white lead">
                Welcome to our academy! We are dedicated to empowering students with the skills
                and knowledge needed to succeed in the world of coding and technology.
            </p>
        </div>
    </section>

    <div class="container">
        <!-- Mission Section -->
        <section class="row align-items-center mb-5 p-5" style="background-color: #3B38A0; border-radius: 20px;"
            data-aos="fade-up" data-aos-duration="900">
            <div class="col-md-6 text-start mb-3 mb-md-0">
                <h2 class="text-info mb-3">Our Mission</h2>
                <p class="text-white">
                    Our mission is to provide high-quality coding education that is accessible to everyone.
                    We focus on hands-on learning, modern technologies, and building real-world projects
                    to prepare our students for the tech industry.
                </p>
            </div>
            <div class="col-md-6 text-center">
                <img src="{{ asset('images/blog-leadership.jpg') }}" class="img-fluid rounded" alt="Our Mission"
                    loading="lazy">
            </div>
        </section>

        <!-- Vision Section -->
        <section class="row align-items-center mb-5 p-5" style="background-color: #3B38A0; border-radius: 20px;"
            data-aos="fade-up" data-aos-duration="900">
            <div class="col-md-6 order-md-2 text-start mb-3 mb-md-0">
                <h2 class="text-info mb-3">Our Vision</h2>
                <p class="text-white">
                    To become a leading coding academy recognized for transforming beginners into skilled
                    developers and inspiring a new generation of innovators.
                </p>
            </div>
            <div class="col-md-6 order-md-1 text-center">
                <img src="{{ asset('images/our-vision.webp') }}" class="img-fluid rounded" alt="Our Vision" loading="lazy">
            </div>
        </section>

        <!-- Values Section -->
        <section class="row text-center mb-5 p-5" style="background-color: #3B38A0; border-radius: 20px;" data-aos="fade-up"
            data-aos-duration="900">
            <div class="col-12 mb-4">
                <h2 class="text-info">Our Core Values</h2>
            </div>
            <div class="col-md-4 text-white mb-3">
                <h5>🚀 Innovation</h5>
                <p>We always push boundaries by using modern technologies and creative teaching methods.</p>
            </div>
            <div class="col-md-4 text-white mb-3">
                <h5>🤝 Community</h5>
                <p>We believe in teamwork, mentorship, and peer-to-peer collaboration.</p>
            </div>
            <div class="col-md-4 text-white mb-3">
                <h5>🎯 Excellence</h5>
                <p>We aim for quality in every project, ensuring students are industry-ready.</p>
            </div>
        </section>

        <!-- Methodology Section -->
        <section class="row align-items-center mb-5 p-5" style="background-color: #3B38A0; border-radius: 20px;"
            data-aos="fade-up" data-aos-duration="900">
            <div class="col-md-6 text-start mb-3 mb-md-0">
                <h2 class="text-info mb-3">Our Teaching Method</h2>
                <p class="text-white">
                    We follow a project-based learning approach that allows students to apply their skills
                    in real-world scenarios. Our courses include:
                    - Web Development (HTML, CSS, JavaScript, Laravel, React)
                    - Mobile App Development (Flutter, React Native)
                    - Database & Backend (MySQL, PostgreSQL, API development)
                    - Soft skills and coding best practices
                </p>
            </div>
            <div class="col-md-6 text-center">
                <img src="{{ asset('images/coding-team.jpg') }}" class="img-fluid rounded" alt="Methodology" loading="lazy">
            </div>
        </section>

        <!-- Team Section -->
        <section class="row mb-5" data-aos="fade-up" data-aos-duration="900">
            <div class="col-12 text-center mb-4">
                <h2 class="text-info">Meet Our Team</h2>
                <p class="text-white">Our dedicated instructors and mentors are here to guide you on your coding journey.
                </p>
            </div>
            <div class="col-md-4 text-center mb-4">
                <img src="{{ asset('images/teacher1.jpg') }}" class="rounded-circle mb-2"
                    style="width: 180px; height: 180px; object-fit: cover;" loading="lazy">
                <h5 class="text-info">John Doe</h5>
                <p class="text-white">Senior Web Developer & Instructor</p>
            </div>
            <div class="col-md-4 text-center mb-4">
                <img src="{{ asset('images/teacher3.jpg') }}" class="rounded-circle mb-2"
                    style="width: 180px; height: 180px; object-fit: cover;" loading="lazy">
                <h5 class="text-info">Jane Smith</h5>
                <p class="text-white">Full Stack Developer & Mentor</p>
            </div>
            <div class="col-md-4 text-center mb-4">
                <img src="{{ asset('images/teacher2.jpg') }}" class="rounded-circle mb-2"
                    style="width: 180px; height: 180px; object-fit: cover;" loading="lazy">
                <h5 class="text-info">Alice Brown</h5>
                <p class="text-white">Backend Developer & Instructor</p>
            </div>
        </section>

        <!-- Students Reviews Section -->
        <section class="row mb-5" data-aos="fade-up" data-aos-duration="900">
            <div class="col-12 text-center mb-4">
                <h2 class="text-info">Students Reviews</h2>
                <p class="text-white">Hear from our students who transformed their skills with us.</p>
            </div>

            <div class="col-md-4 mb-4 text-center">
                <img src="{{ asset('images/student4.jpg') }}" class="rounded-circle mb-2"
                    style="width: 150px; height: 150px; object-fit: cover;" loading="lazy">
                <h5 class="text-info">Emily Johnson</h5>
                <p class="text-white fst-italic">
                    "The academy helped me transition from zero coding knowledge to building my first web app. Amazing
                    mentors!"
                </p>
            </div>

            <div class="col-md-4 mb-4 text-center">
                <img src="{{ asset('images/student2.jpg') }}" class="rounded-circle mb-2"
                    style="width: 150px; height: 150px; object-fit: cover;" loading="lazy">
                <h5 class="text-info">Michael Lee</h5>
                <p class="text-white fst-italic">
                    "The project-based learning approach really made a difference. I feel confident entering the tech
                    industry."
                </p>
            </div>

            <div class="col-md-4 mb-4 text-center">
                <img src="{{ asset('images/student3.jpg') }}" class="rounded-circle mb-2"
                    style="width: 150px; height: 150px; object-fit: cover;" loading="lazy">
                <h5 class="text-info">Sophia Martinez</h5>
                <p class="text-white fst-italic">
                    "Hands-on projects, supportive mentors, and an amazing community! I highly recommend this academy."
                </p>
            </div>
        </section>

        <!-- Achievements Section -->
        <section class="text-center mb-5 p-5" style="background-color: #3B38A0; border-radius: 20px;" data-aos="fade-up"
            data-aos-duration="900">
            <h2 class="text-info mb-3">Our Achievements</h2>
            <p class="text-white">In just a few years, we’ve built a strong community and track record:</p>
            <ul class="list-unstyled text-white">
                <li>🏆 Trained over 1,500 students worldwide</li>
                <li>💼 80% of graduates landed jobs in tech companies</li>
                <li>🌍 Partnerships with leading tech hubs and startups</li>
            </ul>
        </section>
    </div>
@endsection

@push('styles')
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
@endpush

@push('scripts')
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({ once: true, duration: 800 });
    </script>
@endpush