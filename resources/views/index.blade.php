@extends('layouts.app')

@section('title', 'OpenCourse | Online Free Courses Platform')

@section('content')

    <div>
        <img src="{{ asset('img/home/woman-writing.jpg') }}"
             style="width: 100%; transform: scaleX(-1); position: relative" alt="Woman Concentrated on Writing">
        <div style="width: 40%; position: absolute; top: 0; margin: 350px 0 0 100px;">
            <h3>Empower Your Future with Free and Recognized Courses</h3>
            <p>Take control of your career growth with access to top-notch and industry-recognized courses - all
                available for free on OpenCourse</p>
            <a href="{{ route('public.courses.index') }}" class="btn btn-outline-dark">Start Learning Now</a>
        </div>
    </div>

@endsection
