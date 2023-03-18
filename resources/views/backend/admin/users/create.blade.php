@extends('layouts.backend.main')

@section('title', 'Create User | OpenCourse')

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h4 class="fw-bold mb-3 mt-3" style="margin-bottom: 0;">
                <a href="{{ route('users.index') }}">
                    <span class="text-muted fw-light">Users / </span>
                </a>
                Create User
            </h4>
        </div>

        {{-- User Form Creation --}}
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('users.store') }}">
                    @csrf
                    <div class="mb-3 col-sm-5">
                        <label for="name" class="form-label">{{ __('Full Name') }}</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class="fa-regular fa-user"></i></span>
                            <input id="name" name="name" class="form-control" type="text" placeholder="John Smith"
                                   required autocomplete="on" />
                        </div>
                    </div>
                    <div class="mb-4 col-sm-5">
                        <label for="email" class="form-label">{{ __('Email Address') }}</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                            <input type="email" id="email" name="email" class="form-control" placeholder="john.smith@example.com"
                                   required autocomplete="on" />
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary submit-button">Create User</button>
                </form>
            </div>
        </div>
        {{-- End of User Form Creation --}}
    </div>

@endsection
