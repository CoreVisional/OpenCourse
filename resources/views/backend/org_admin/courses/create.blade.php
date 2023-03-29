@extends('layouts.backend.main')

@section('title', 'Create Course | OpenCourse')

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h4 class="fw-bold mb-3 mt-3" style="margin-bottom: 0;">
                <a href="{{ route('org_admin.courses.index') }}">
                    <span class="text-muted fw-light">Courses / </span>
                </a>
                Create Course
            </h4>
        </div>

        {{-- Course Creation Form --}}
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('courses.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 col-sm-5">
                        <label for="course_name" class="form-label">{{ __('Course Name') }}</label>
                        <div class="input-group input-group-merge">
                            <input id="course_name" name="course_name"
                                   class="form-control @error('course_name') is-invalid @enderror" type="text"
                                   required autocomplete="on"/>
                            @error('course_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3 col-sm-5">
                        <label for="course_image" class="form-label">{{ __('Course Thumbnail') }}</label>
                        <div class="input-group input-group-merge">
                            <input id="course_image" name="course_image" class="form-control" type="file"
                                   accept=".png, .jpg, .jpeg"/>
                        </div>
                    </div>
                    <div class="mb-3 col-sm-5">
                        <label for="course_commitment" class="form-label">{{ __('Course Commitment') }}</label>
                        <div class="input-group input-group-merge">
                            <input id="course_commitment" name="course_commitment" class="form-control" type="text"
                                   placeholder="e.g. 3 hours/week" required autocomplete="on"/>
                        </div>
                    </div>
                    <div class="mb-3 col-sm-5">
                        <label for="minimum_grade" class="form-label">{{ __('Minimum Grade') }}</label>
                        <div class="input-group input-group-merge">
                            <input id="minimum_grade" name="minimum_grade" class="form-control" type="number"
                                   min="0" value="0" step=".01" required/>
                        </div>
                    </div>
                    <div class="mb-3 col-sm-5">
                        <label for="instructor_id" class="form-label test">{{ __('Assign Instructor(s)') }}</label>
                        <select class="multi-select d-flex" id="instructor_id" name="instructor_id[]" multiple
                                required>
                            @foreach ($instructors as $instructor)
                                <option value="{{ $instructor->instructor_id }}">{{ $instructor->instructor_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3 col-sm-5">
                        <label for="start_date" class="form-label test">{{ __('Course Start Date') }}</label>
                        <input class="form-control" id="start_date" name="start_date" required autocomplete="off" />
                    </div>
                    <div class="mb-3 col-sm-5">
                        <label for="end_date" class="form-label test">{{ __('Course End Date') }}</label>
                        <input class="form-control" id="end_date" name="end_date" required autocomplete="off" />
                    </div>
                    <div class="mb-4 col-sm-5">
                        <label for="course_description" class="form-label">{{ __('Course Description') }}</label>
                        <textarea class="form-control" id="course_description" name="course_description" rows="3"
                                  required spellcheck="true"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Create Course</button>
                </form>
            </div>
        </div>
        {{-- End of Course Creation Form --}}
    </div>

@endsection
