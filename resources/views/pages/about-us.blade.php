@extends('layouts.app')

@section('title', 'About Us | OpenCourse')

@section('content')

    <div class="page-content bg-white">
        {{-- Inner page banner --}}
        <div class="page-banner ovbl-dark" style="background-image:url(/img/banner/about-us-banner.jpg);">
            <div class="container">
                <div class="page-banner-entry">
                    <h1 class="text-white">ABOUT US</h1>
                </div>
            </div>
        </div>
        {{-- Breadcrumb row --}}
        <div class="breadcrumb-row">
            <div class="container">
                <ul class="list-inline">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>About Us</li>
                </ul>
            </div>
        </div>
        {{-- Breadcrumb row END --}}

        {{-- About us page content --}}
        <div class="page-banner about-us-section">
            <div class="container">
                <h3 class="container-fluid center-block p-5" style="text-align: center;">
                    What OpenCourse Offers
                </h3>

                <div class="row row-cols-1 row-cols-md-3 g-4 px-5 pb-5">
                    <div class="col">
                        <div class="card h-100">
                            <img src="{{ asset('img/about-us/courses.jpeg') }}" class="card-img-top"
                                 alt="Book Flipping">
                            <div class="card-body">
                                <h5 class="card-title">Reputable Courses</h5>
                                <p class="card-text">
                                    Our courses are carefully curated to ensure that they meet the highest standards of
                                    quality and relevance.
                                </p>
                                <p class="card-text">
                                    We collaborate with leading institutions and universities around the world to bring
                                    you courses that are recognized and respected in the industry.
                                </p>
                                <p class="card-text">
                                    Whether you are looking to advance your career or simply want to learn something
                                    new, we have a course for you.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <img src="{{ asset('img/about-us/certificate.jpg') }}" class="card-img-top"
                                 alt="Certificate Rolled Up" style="height: 307px;">
                            <div class="card-body">
                                <h5 class="card-title">Certifications</h5>
                                <p class="card-text">We offer free certifications upon completion of courses.
                                </p>
                                <p class="card-text">
                                    These certifications are a testament to your knowledge and skills and can boost your
                                    resume and career prospects.
                                </p>
                                <p class="card-text">
                                    Our certifications are recognized by employers worldwide and can give you a
                                    competitive edge in the job market
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card h-100">
                            <img src="{{ asset('img/about-us/instructor.jpg') }}" class="card-img-top"
                                 alt="Instructor teaching students" style="height: 306px;">
                            <div class="card-body">
                                <h5 class="card-title">Partners</h5>
                                <p class="card-text">We are proud to partner with reputable universities and
                                    institutions to bring you courses that are taught by experienced and knowledgeable
                                    instructors.</p>
                                <p class="card-text">
                                    Our instructors are experts in their fields, with years of practical experience and
                                    academic credentials from top universities.
                                </p>
                                <p class="card-text">
                                    They are passionate about sharing their knowledge and expertise with learners around
                                    the world and are committed to providing a high-quality learning experience.
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- End of About us page content --}}
    </div>

@endsection
