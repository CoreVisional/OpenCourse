@extends('layouts.app')

@section('title', 'Registration | OpenCourse')

@section('content')

    <div class="container mt-5 mb-5">
        @if (session('status') == 'verification-link-sent')
            <div class="alert alert-success mt-3" role="alert">
                A new verification link has been sent to your email address.
            </div>
        @endif

        <h1 class="fw-bold">Verify Your Email Address</h1>
        <p class="lead">You must verify your email address to access this page.</p>

        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="btn btn-primary mt-3">Resend Verification Email</button>
        </form>
    </div>

@endsection
