@extends('layouts.backend.main')

@section('title', 'Invite User | OpenCourse')

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h4 class="fw-bold mb-3 mt-3" style="margin-bottom: 0;">
                <a href="{{ route('instructors.index') }}">
                    <span class="text-muted fw-light">Instructors / </span>
                </a>
                Invite As Instructor
            </h4>
        </div>

        <h5 class="mb-4 mt-3" style="margin-bottom: 0;">
            <span>You Are Inviting "{{ request('name') }}" ({{ request('email') }}) To Become an Instructor of Your Organization</span>
        </h5>

        {{-- Instructor Details Form --}}
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('instructors.store') }}">
                    @csrf
                    <div class="mb-3 col-sm-5">
                        <label for="instructor_name" class="form-label">{{ __('Full Name') }}</label>
                        <input id="instructor_name" name="instructor_name"
                               class="form-control" type="text" autocomplete="on" value="{{ old('instructor_name') }}"/>
                    </div>
                    <div class="mb-3 col-sm-5">
                        <label for="instructor_title" class="form-label">{{ __('Title') }}</label>
                        <input id="instructor_title" name="instructor_title"
                               class="form-control @error('instructor_title') is-invalid @enderror" type="text"
                               required autocomplete="on"/>
                        @error('instructor_title')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-3 col-sm-5">
                        <label for="instructor_department" class="form-label">{{ __('Department') }}</label>
                        <input id="instructor_department" name="instructor_department"
                               class="form-control @error('instructor_department') is-invalid @enderror" type="text"
                               required autocomplete="on"/>
                        @error('instructor_department')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-4 col-sm-5">
                        <label for="institution" class="form-label">{{ __('Institution') }}</label>
                        <input id="institution" name="institution" class="form-control" type="text" required
                               autocomplete="on" value="{{ request('institution_name') }}" disabled
                               style="cursor: not-allowed;"/>
                    </div>
                    <button type="submit" class="btn btn-primary">Invite</button>
                </form>
            </div>
        </div>
        {{-- End of Instructor Details Form --}}
    </div>

@endsection
