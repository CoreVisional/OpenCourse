@extends('layouts.backend.main')

@section('title', 'Find User | OpenCourse')

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h4 class="fw-bold mb-3 mt-3" style="margin-bottom: 0;">
                <a href="{{ route('instructors.index') }}">
                    <span class="text-muted fw-light">Instructors / </span>
                </a>
                Find User
            </h4>
        </div>

        @include('partials._notice')
        {{-- Find User Form --}}
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('instructors.findUser') }}">
                    @csrf
                    <div class="mb-3 col-sm-5">
                        <label for="email" class="form-label">{{ __('OpenCourse Email') }}</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                            <input type="email" id="email" name="email" class="form-control" required autocomplete="on" />
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary submit-button">Search User</button>
                </form>
            </div>
        </div>
        {{-- End of Find User Form --}}
    </div>

@endsection
