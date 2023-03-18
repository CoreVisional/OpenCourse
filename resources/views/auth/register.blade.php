@extends('layouts.app')

@section('title', 'Registration | OpenCourse')

@section('content')

    <section class="container-fluid row p-5">
        <div class="col-3 mx-auto border shadow px-5 py-4" style="background-color: #fffffe">
            <div class="p-3 m-2">
                <div class="title h4 text-center">Create an Account</div>
                <div class="text-center">Enter the following details to create an account</div>
            </div>
            <div>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">{{ __('Full Name') }}</label>
                        <input type="text"
                               class="form-control form-control-lg form-control-custom @error('name') is-invalid @enderror"
                               id="name" name="name" value="{{ old('name') }}" required/>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('Email Address') }}</label>
                        <input type="email"
                               class="form-control form-control-lg form-control-custom @error('email') is-invalid @enderror"
                               id="email" name="email"
                               placeholder="example@gmail.com" value="{{ old('email') }}" required/>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('Password') }}</label>
                        <div class="input-group">
                            <input type="password"
                                   class="form-control form-control-lg form-control-custom @error('password') is-invalid @enderror"
                                   id="password" name="password" required />
                            <span class="input-group-text togglePassword" id="togglePassword">
                                <i class="fa-solid fa-eye-slash" style="cursor: pointer"></i>
                            </span>
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-4">
                        <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                        <input type="password" class="form-control form-control-lg form-control-custom"
                               id="password_confirmation" name="password_confirmation" required />
                    </div>
                    <div class="d-grid mx-auto mt-5 mb-4">
                        <button class="btn btn-primary btn-lg" type="submit">Create Account</button>
                    </div>
                </form>
                <div class="text-muted text-center mb-3">Already have an account?
                    <a href="{{ route('login') }}">Log in</a>
                </div>
            </div>
        </div>
    </section>

@endsection
