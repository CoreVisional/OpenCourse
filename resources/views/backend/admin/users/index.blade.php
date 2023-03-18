@extends('layouts.backend.main')

@section('title', 'Users | OpenCourse')

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h4 class="fw-bold mb-3 mt-3" style="margin-bottom: 0;">Users</h4>
            <a href="{{ route('users.create') }}" class="btn btn-primary">
                <i class="fa-solid fa-user-plus me-2"></i>Create User
            </a>
        </div>

        @include('partials._notice')
        {{-- User Table --}}
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-show-dt mb-4">
                        <thead>
                            <tr>
                                <th>{{ __('Full Name') }}</th>
                                <th>{{ __('Email') }}</th>
                                <th>{{ __('Role') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Last Login') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->display_name }}</td>
                                    <td>
                                        @if ($user->is_disabled)
                                            <span class="badge bg-label-danger">Disabled</span>
                                        @else
                                            <span class="badge bg-label-success">Active</span>
                                        @endif
                                    </td>
                                    <td>{{ $user->last_login ?? 'Never logged in' }}</td>
                                    <td>
                                        <a href="{{ route('users.show', $user->user_id) }}"
                                           class="btn btn-sm btn-info me-1">
                                            <i class="fa-solid fa-circle-info me-2"></i>Details
                                        </a>
                                        <a href="{{ route('users.edit', $user->user_id) }}"
                                           class="btn btn-sm btn-warning me-1">
                                            <i class="fa-solid fa-pen-to-square me-2"></i>Edit
                                        </a>
                                        @if ($user->is_disabled)
                                            <form method="POST" action="{{ route('users.enable', $user->user_id) }}"
                                                  class="d-inline-block">
                                                @csrf
                                                @method('PUT')
                                                <button class="btn btn-sm btn-success me-1">
                                                    <i class="fa-sharp fa-solid fa-circle-check me-2"></i>Re-activate
                                                </button>
                                            </form>
                                        @else
                                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#confirmDeactivate{{ $user->user_id }}" {{ $user->is_admin ? 'disabled' : '' }}>
                                                <i class="fa-sharp fa-solid fa-ban me-2"></i>Deactivate
                                            </button>
                                            <div class="modal fade" id="confirmDeactivate{{ $user->user_id }}"
                                                 role="dialog">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="confirmDeactivate{{ $user->user_id }}">
                                                                Confirm Deactivate</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                    aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure you want to deactivate this account?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Cancel
                                                            </button>
                                                            <form method="POST"
                                                                  action="{{ route('users.disable', $user->user_id) }}">
                                                                @csrf
                                                                @method('PUT')
                                                                <button type="submit" class="btn btn-danger">Yes</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        {{-- End of User Table --}}
    </div>

@endsection
