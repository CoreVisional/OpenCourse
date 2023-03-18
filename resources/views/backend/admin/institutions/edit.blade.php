@extends('layouts.backend.main')

@section('title', 'Edit Institution | OpenCourse')

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h4 class="fw-bold mb-3 mt-3" style="margin-bottom: 0;">
                <a href="{{ route('institutions.index') }}">
                    <span class="text-muted fw-light">Institutions / </span>
                </a>
                Edit User
            </h4>
        </div>

        {{-- Institution Edit Form --}}
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('institutions.update', $institution->institution_id) }}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3 col-sm-5">
                        <div class="mb-3">
                            <label for="institution_name" class="form-label">{{ __('Institution Name') }}</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="fa-solid fa-building"></i></span>
                                <input type="text" id="institution_name" name="institution_name"
                                       class="form-control @error('institution_name') is-invalid @enderror"
                                       value="{{ $institution->institution_name }}" required/>
                                @error('institution_name')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="institution_abbreviation"
                                   class="form-label">{{ __('Institution Abbreviation') }}</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="fa-solid fa-arrow-down-short-wide"></i></span>
                                <input type="text" id="institution_abbreviation" name="institution_abbreviation"
                                       class="form-control @error('institution_abbreviation') is-invalid @enderror"
                                       value="{{ $institution->institution_abbreviation }}" required/>
                                @error('institution_abbreviation')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="institution_website"
                                   class="form-label">{{ __('Institution Website Link') }}</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="fa-solid fa-link"></i></span>
                                <input type="text" id="institution_website" name="institution_website"
                                       class="form-control @error('institution_website') is-invalid @enderror"
                                       value="{{ $institution->institution_website }}" required/>
                                @error('institution_website')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="institution_email"
                                   class="form-label">{{ __('Institution Email Address') }}</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                                <input type="email" id="institution_email" name="institution_email"
                                       class="form-control @error('institution_email') is-invalid @enderror"
                                       value="{{ $institution->institution_email }}" required/>
                                @error('institution_email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="institution_phone"
                                   class="form-label">{{ __('Institution Phone Number') }}</label>
                            <div class="mb-2">
                                <p>
                                    <input type="tel" id="institution_phone" name="institution_phone"
                                           class="form-control institution-phone"
                                           data-phone-number="{{ $institution->institution_phone }}"
                                           data-dial-code="{{ $institution->dial_code }}"
                                           required/>
                                    <span class="ms-2 valid-phone-msg" hidden>✓ Valid</span>
                                    <span class="ms-2 invalid-phone-msg" hidden></span>
                                </p>
                            </div>
                        </div>
                        <div class="mb-5">
                            <label for="institution_address"
                                   class="form-label">{{ __('Institution Address') }}</label>
                            <div class="input-group input-group-merge">
                                <span class="input-group-text"><i class="fa-solid fa-location-dot"></i></span>
                                <textarea id="institution_address" name="institution_address" rows="3"
                                          class="form-control"
                                          required>{{ $institution->institution_address }}
                                </textarea>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="institutionId" data-id="{{ $institution->institution_id }}"/>
                    <button type="submit" id="submit-btn" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
        {{-- End of Institution Edit Form --}}
    </div>

@endsection
