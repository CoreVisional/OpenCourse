@extends('layouts.backend.main')

@section('title', 'Edit User | OpenCourse')

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h4 class="fw-bold mb-3 mt-3" style="margin-bottom: 0;">
                <a href="{{ route('users.index') }}">
                    <span class="text-muted fw-light">Users / </span>
                </a>
                Edit User
            </h4>
        </div>

        {{-- User Edit Form --}}
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('users.update', $user->user_id) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3 col-sm-5">
                        <label for="name" class="form-label">{{ __('Full Name') }}</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class="fa-regular fa-user"></i></span>
                            <input id="name" name="name" class="form-control" type="text" placeholder="John Smith"
                                   required autocomplete="on" value="{{ $user->name }}"/>
                        </div>
                    </div>
                    <div class="mb-3 col-sm-5">
                        <label for="email" class="form-label">{{ __('Email Address') }}</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                            <input type="email" id="email" name="email" class="form-control"
                                   value="{{ $user->email }}"
                                   required autocomplete="on"/>
                        </div>
                    </div>
                    <div class="mb-4 col-sm-5">
                        <label for="role" class="form-label">{{ __('User Role') }}</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                            <select class="form-select role-select" name="role" id="role" required>
                                <option hidden>Select Role...</option>
                                @foreach ($roles as $role)
                                    <option
                                        value="{{ $role->role_id }}" {{ $role->role_id == $userRole ? 'selected' : '' }}>{{ $role->display_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @if ($userRole === 2)
                        <div class="mb-4 col-sm-5" id="organization">
                            <label for="institution_name" class="form-label">{{ __('Organization Name') }}</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="fa-solid fa-building"></i></span>
                                <select class="form-select" name="institution_name" id="institution_name" required>
                                    <option hidden>Select Institution...</option>
                                    @foreach ($institutions as $institution)
                                        <option
                                            value="{{ $institution->institution_id }}" {{ $institution->institution_id == $userInstitution ? 'selected' : '' }}>{{ $institution->institution_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @else
                        <div class="mb-4 col-sm-5" id="organization" style="display:none;">
                            <label for="institution_name" class="form-label">{{ __('Organization Name') }}</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="fa-solid fa-building"></i></span>
                                <select class="form-select" name="institution_name" id="institution_name" required>
                                    <option hidden>Select Institution...</option>
                                    @foreach ($institutions as $institution)
                                        <option
                                            value="{{ $institution->institution_id }}">{{ $institution->institution_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    @endif
                    <button type="submit" class="btn btn-primary submit-button">Save Changes</button>
                </form>
            </div>
        </div>
        {{-- End of User Edit Form --}}
    </div>

@endsection
