@extends('layouts.backend.main')

@section('title', 'Institutions List | OpenCourse')

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h4 class="fw-bold mb-3 mt-3" style="margin-bottom: 0;">Institutions</h4>
            <a href="{{ route('institutions.create') }}" class="btn btn-primary">
                <i class="fa-solid fa-plus me-2"></i>Add Institution
            </a>
        </div>

        @include('partials._notice')
        {{-- Institutions Table --}}
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-show-dt mb-4">
                        <thead>
                        <tr>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Website') }}</th>
                            <th>{{ __('Email') }}</th>
                            <th>{{ __('Status') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($institutions as $institution)
                            <tr>
                                <td>{{ $institution->institution_name }}</td>
                                <td>{{ $institution->institution_website }}</td>
                                <td>{{ $institution->institution_email }}</td>
                                <td>
                                    @if ($institution->is_disabled)
                                        <span class="badge bg-label-danger">Disabled</span>
                                    @else
                                        <span class="badge bg-label-success">Enabled</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('institutions.show', $institution->institution_id) }}"
                                       class="btn btn-sm btn-info me-1">
                                        <i class="fa-solid fa-circle-info me-2"></i>Details
                                    </a>
                                    <a href="{{ route('institutions.edit', $institution->institution_id) }}"
                                       class="btn btn-sm btn-warning me-1">
                                        <i class="fa-solid fa-pen-to-square me-2"></i>Edit
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{-- End of Institutions Table --}}
    </div>

@endsection
