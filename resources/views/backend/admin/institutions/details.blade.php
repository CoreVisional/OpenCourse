@extends('layouts.backend.main')

@section('title', 'Institution Details | OpenCourse')

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h4 class="fw-bold mb-3 mt-3" style="margin-bottom: 0;">
                <a href="{{ route('institutions.index') }}">
                    <span class="text-muted fw-light">Institutions / </span>
                </a>
                Details
            </h4>
        </div>

        {{-- Institution Details --}}
        <div class="card">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-sm-3 fw-bold">Institution Name:</div>
                    <div class="col-sm-9">{{ $institution->institution_name }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3 fw-bold">Abbreviation:</div>
                    <div class="col-sm-9">{{ $institution->institution_abbreviation }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3 fw-bold">Website:</div>
                    <div class="col-sm-9">{{ $institution->institution_website }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3 fw-bold">Phone Number:</div>
                    <div class="col-sm-9">{{ $institution->institution_phone }}</div>
                </div>
                <div class="row">
                    <div class="col-sm-3 fw-bold">Address:</div>
                    <div class="col-sm-9">{{ $institution->institution_address }}</div>
                </div>
            </div>
        </div>
        {{-- End of Institution Details --}}
    </div>

@endsection
