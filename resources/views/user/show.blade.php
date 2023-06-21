@extends('layouts.main')
@section('content')

<div>
    <div class = 'card w-50 mx-auto'>
        <div class="card-header">
            <h5>Profile</h5>
        </div>
        <div class="card-body">
            <div class="input-group mb-3">
                <span class="input-group-text col-2">Name</span>
                <input type="text" class="form-control" value="{{ $user->name }}" disabled>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text col-2">Email</span>
                <input type="text" class="form-control" value="{{ $user->email }}" disabled>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text col-2">Role</span>
                <input type="text" class="form-control" value="{{ $user->roles->pluck('name')[0] ?? '' }}" disabled>
            </div>
        </div>
        <div class = 'card-footer'>
            <a href = "{{ route('user.edit', $user) }}" class = 'btn btn-danger'>
                <i class="bi bi-pencil-square pe-2"></i>
                Edit Profile
            </a>
            <a href = "{{ route('dashboard') }}" class = 'btn btn-primary'>
                <i class="bi bi-speedometer pe-2"></i>
                Dashboard
            </a>
        </div>
    </div>
</div>

@endsection