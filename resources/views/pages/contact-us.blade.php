@extends('layouts.app')

@section('title', 'Contact Us | OpenCourse')

@section('content')

    <div class="page-content bg-white">
        {{-- Inner page banner --}}
        <div class="page-banner ovbl-dark" style="background-image:url(/img/banner/contact-us-banner.jpg);">
            <div class="container">
                <div class="page-banner-entry">
                    <h1 class="text-white">CONTACT US</h1>
                </div>
            </div>
        </div>
        {{-- Breadcrumb row --}}
        <div class="breadcrumb-row">
            <div class="container">
                <ul class="list-inline">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Contact Us</li>
                </ul>
            </div>
        </div>
        {{-- Breadcrumb row END --}}

        {{-- Inner page banner --}}
        <div class="page-banner contact-section">
            <div class="container">
                @include('partials._notice')
                <div class="row d-flex">
                    <div class="col-lg-5 d-flex align-items-stretch">
                        <div class="business-info">
                            <div class="business-address">
                                <i class="fa-solid fa-location-dot contact-us__flex"></i>
                                <h4>Location</h4>
                                <p>Jalan Teknologi 5, Taman Teknologi Malaysia, 57000, Kuala Lumpur, Malaysia</p>
                            </div>
                            <div class="business-email">
                                <i class="fa-solid fa-envelope contact-us__flex"></i>
                                <h4>Email</h4>
                                <p>support@opencourse.net</p>
                            </div>
                            <div class="phone-number">
                                <a href="tel:+60 18-280-5327">
                                    <i class="fa-solid fa-phone contact-us__flex"></i>
                                </a>
                                <h4>Phone Number</h4>
                                <p>+60 18-280-5327</p>
                            </div>
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15936.586509784638!2d101.7005614!3d3.0554057!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc4abb795025d9%3A0x1c37182a714ba968!2sAsia%20Pacific%20University%20of%20Technology%20%26%20Innovation%20(APU)!5e0!3m2!1sen!2smy!4v1678296470127!5m2!1sen!2smy"
                                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                    <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
                        <form class="business-email-form" method="POST" action="{{ route('contact.store') }}">
                            @csrf
                            <div class="row contact-us__flex">
                                <div class="form-group col-md-6">
                                    <label for="name" class="mb-2">Your Name</label>
                                    <input type="text" name="name" class="form-control" id="name" required>
                                </div>
                                <div class="form-group col-md-6 mt-md-0">
                                    <label for="email" class="mb-2">Your Email Address</label>
                                    <input type="email" class="form-control" name="email" id="email" required>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                <label for="subject" class="mb-2">Subject</label>
                                <input type="text" class="form-control" id="subject" name="subject" required>
                            </div>
                            <div class="form-group mt-3">
                                <label for="message" class="mb-2">Message</label>
                                <textarea class="form-control" id="message" name="message" rows="10" required spellcheck="true"></textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit">Submit Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
