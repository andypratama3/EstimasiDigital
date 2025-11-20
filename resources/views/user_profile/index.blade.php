@extends('layouts.dashboard')

@section('title', 'Profile')

@section('content')

{{-- ALERT SUCCESS --}}
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

{{-- ALERT ERROR --}}
@if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show">
        <ul class="mb-0">
            @foreach($errors->all() as $err)
                <li>{{ $err }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif


<div class="row">

    {{-- PROFILE HEADER --}}
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body d-flex align-items-center justify-content-between">

                <div class="d-flex align-items-center">
                    <img src="{{ $user->profile_photo_url }}"
                         alt="{{ $user->name }}"
                         class="rounded-circle"
                         width="100" height="100">

                    <div class="ml-3 ms-4">
                        <h3 class="mb-1">{{ $user->name }}</h3>
                        <p class="mb-2 text-muted">{{ $user->email }}</p>

                        @if($user->is_active)
                            <span class="badge bg-success">Active</span>
                        @else
                            <span class="badge bg-secondary">Inactive</span>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- ACCOUNT INFORMATION --}}
    <div class="col-lg-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="mb-4 card-title">Account Information</h4>

                <div class="mb-3 row">
                    <div class="col-sm-6">
                        <strong>Full Name:</strong>
                        <p>{{ $user->name }}</p>
                    </div>

                    <div class="col-sm-6">
                        <strong>Email Address:</strong>
                        <p>{{ $user->email }}</p>
                    </div>

                    <div class="col-sm-6">
                        <strong>Member Since:</strong>
                        <p>{{ $user->created_at->format('F d, Y') }}</p>
                    </div>

                    <div class="col-sm-6">
                        <strong>Last Updated:</strong>
                        <p>{{ $user->updated_at->format('F d, Y H:i') }}</p>
                    </div>

                    <div class="col-sm-6">
                        <strong>Email Verification:</strong>
                        <p>
                            @if($user->email_verified_at)
                                <span class="badge bg-success">
                                    Verified ({{ $user->email_verified_at->format('F d, Y') }})
                                </span>
                            @else
                                <span class="badge bg-warning text-dark">Not Verified</span>
                            @endif
                        </p>
                    </div>

                    <div class="col-sm-6">
                        <strong>Account Status:</strong>
                        <p>
                            @if($user->is_active)
                                <span class="badge bg-success">Active</span>
                            @else
                                <span class="badge bg-danger">Inactive</span>
                            @endif
                        </p>
                    </div>

                </div>

                <hr>

                <h4 class="mb-3 card-title">Roles & Permissions</h4>

                @if($user->roles->count())
                    <div class="mb-3">
                        <strong>Roles:</strong>
                        <div class="mt-2">
                            @foreach($user->roles as $role)
                                <span class="badge bg-info me-1">{{ $role->name }}</span>
                            @endforeach
                        </div>
                    </div>
                @else
                    <p class="text-muted">No roles assigned.</p>
                @endif

                @if($user->permissions->count())
                    <div class="mt-4">
                        <strong>Direct Permissions:</strong>
                        <div class="mt-2">
                            @foreach($user->permissions as $permission)
                                <span class="text-white badge bg-purple me-1">
                                    {{ $permission->name }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>

    {{-- SIDEBAR RIGHT --}}
    <div class="col-lg-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Activity</h4>

                <div class="mb-4">
                    <strong>Access Logs:</strong>
                    <p class="fs-4 fw-bold text-primary">
                        {{ $user->accessLogs->count() }}
                    </p>
                </div>

                <hr>

                <h4 class="mt-3 card-title">Security</h4>
                <p class="text-muted">Manage account security from profile update section.</p>
            </div>
        </div>
    </div>


    {{-- EDIT PROFILE --}}
    <div class="mt-4 col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">

                <h4 class="mb-4 card-title">Edit Profile</h4>

                <form action="{{ route('profile.update.custom') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">

                        {{-- Name --}}
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="name" class="form-control"
                                   value="{{ old('name', $user->name) }}" required>
                        </div>

                        {{-- Email --}}
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Email Address</label>
                            <input type="email" name="email" class="form-control"
                                   value="{{ old('email', $user->email) }}" required>
                        </div>

                        {{-- Account Status --}}
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Account Status</label>
                            <select name="is_active" class="form-select form-control">
                                <option value="1" @selected($user->is_active == 1)>Active</option>
                                <option value="0" @selected($user->is_active == 0)>Inactive</option>
                            </select>
                        </div>

                        {{-- Profile Photo --}}
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Profile Photo</label>
                            <input type="file" name="profile_photo" class="form-control">
                            <small class="text-muted">
                                Leave empty if you don't want to change the photo.
                            </small>
                        </div>

                        {{-- Password --}}
                        <div class="mb-3 col-md-6">
                            <label class="form-label">New Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Optional">
                        </div>

                        {{-- Confirm Password --}}
                        <div class="mb-3 col-md-6">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control" placeholder="Optional">
                        </div>

                    </div>

                    <div class="mt-4">
                        <button class="btn btn-success me-2" type="submit">
                            <i class="mdi mdi-content-save"></i> Update Profile
                        </button>

                        <a href="{{ url()->current() }}" class="btn btn-light">
                            Cancel
                        </a>
                    </div>

                </form>

            </div>
        </div>
    </div>

</div>

@endsection
