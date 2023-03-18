@extends('layouts.app')

@section('title', 'Forgot Password | OpenCourse')

@section('content')

    <section class="container-fluid row p-5">
        @if(session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
        <div class="col-auto mx-auto border shadow px-5 py-4" style="background-color: #fffffe">
            <div class="p-3 m-2">
                <div class="title h4 text-center">Forgot Password?</div>
                <div class="text-center">Enter your email to reset your password</div>
            </div>
            <div>
                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('Email Address') }}</label>
                        <input type="email"
                               class="form-control form-control-lg form-control-custom"
                               id="email" name="email" required/>
                    </div>
                    <div class="d-grid mx-auto mt-4 mb-4">
                        <button class="btn btn-primary btn-lg" type="submit">Reset Password</button>
                    </div>
                </form>
                <div class="text-muted text-center mb-3">Don't have an account?
                    <a href="{{ route('register') }}">Sign Up</a>
                </div>
            </div>
        </div>
    </section>

@endsection
