@extends('layouts.backend.main')

@section('title', 'User Information | OpenCourse')

@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h4 class="fw-bold mb-3 mt-3" style="margin-bottom: 0;">
                <a href="{{ route('users.index') }}">
                    <span class="text-muted fw-light">Users / </span>
                </a>
                Details
            </h4>
            <button class="btn btn-danger" data-bs-toggle="modal"
                    data-bs-target="#confirmDelete{{ $user->user_id }}" {{ $user->is_admin ? 'disabled' : '' }}>
                <i class="fa-sharp fa-solid fa-trash me-2"></i> DELETE
            </button>
            <div class="modal fade" id="confirmDelete{{ $user->user_id }}" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmDelete{{ $user->user_id }}">
                                Confirm Delete</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to perform this operation? All records linking
                            to this user will be deleted.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">CANCEL
                            </button>
                            <form method="POST"
                                  action="{{ route('users.destroy', $user->user_id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">DELETE</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- User Details List --}}
        <div class="card">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-sm-3 fw-bold">Username:</div>
                    <div class="col-sm-9">{{ $user->name }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3 fw-bold">Email:</div>
                    <div class="col-sm-9">{{ $user->email }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3 fw-bold">Role:</div>
                    <div class="col-sm-9">{{ $user->display_name }}</div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3 fw-bold">Status:</div>
                    <div class="col-sm-9">
                        @if ($user->is_disabled)
                            <span>Disabled</span>
                        @else
                            <span>Active</span>
                        @endif
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-sm-3 fw-bold">Account Created On</div>
                    <div class="col-sm-9">{{ $user->created_at }}</div>
                </div>
                <div class="row">
                    <div class="col-sm-3 fw-bold">Last Login</div>
                    <div class="col-sm-9">{{ $user->last_login ?? 'Never logged in' }}</div>
                </div>
            </div>
        </div>
        {{-- End of User Details List --}}
    </div>

@endsection
