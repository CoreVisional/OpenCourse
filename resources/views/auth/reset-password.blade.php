@extends('layouts.app')

@section('title', 'Reset Password | OpenCourse')

@section('content')

    <section class="container-fluid row p-5">
        <div class="col-3 mx-auto border shadow px-5 py-4" style="background-color: #fffffe">
            <div class="p-3 m-2">
                <div class="title h4 text-center">Reset Password</div>
                <div class="text-center">Enter your new password below</div>
            </div>
            <div>
                <form method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $request->route('token') }}" />
                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('Email Address') }}</label>
                        <input type="email"
                               class="form-control form-control-lg form-control-custom @error('email') is-invalid @enderror"
                               id="email" name="email"
                               value="{{ $request->email }}" readonly required/>
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
                        <button class="btn btn-primary btn-lg" type="submit">Reset Password</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection
