@extends('layouts.app')

@section('title', 'Login | OpenCourse')

@section('content')

    <section class="container-fluid row p-5">
        <div class="col-3 mx-auto border shadow px-5 py-4" style="background-color: #fffffe">
            <div class="p-3 m-2">
                <div class="title h4 text-center">Log In To Your Account</div>
                <div class="text-center">Welcome back! Please enter your details</div>
            </div>
            <div>
                <form method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('Email Address') }}</label>
                        <input type="email"
                               class="form-control form-control-lg form-control-custom @error('email') is-invalid @enderror"
                               id="email" name="email" required/>
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
                                   id="password" name="password" required/>
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
                    @if(Route::has('password.request'))
                        <div class="mb-3">
                            <div class="d-flex justify-content-end align-items-center mt-2">
                                <a href="{{ route('password.request') }}">{{ __('Forget Password?') }}</a>
                            </div>
                        </div>
                    @endif
                    <div class="d-grid mx-auto mt-5 mb-4">
                        <button class="btn btn-primary btn-lg" type="submit">Sign In</button>
                    </div>
                </form>
                <div class="text-muted text-center mb-3">Don't have an account?
                    <a href="{{ route('register') }}">Sign Up</a>
                </div>
            </div>
        </div>
    </section>

@endsection
