@extends('layouts.main')
@section('content')

<div>
    <form method="post" action="{{ route('user.update', $user) }}" enctype="multipart/form-data" class = 'card w-75 mx-auto'>
        @csrf
        @method('PUT')
        <div class = 'card-header'>
            <h5>Create New User</h5>
        </div>
        <div class = 'card-body'>
            <div class = "row mb-3">
                <label for = "name" id="name" class = 'col-lg-3 col-form-label'>Name *</label>
                <div class = 'col-lg-6'>
                    <input type = "text" placeholder = "Name" class = "form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
            </div>
            <div class = "row mb-3">
                <label for = "email" id="email" class = 'col-lg-3 col-form-label'>Email *</label>
                <div class = 'col-lg-6'>
                    <input type = "email" placeholder = "email" class = "form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->email) }}" autocomplete="email" required>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
            </div>
            <div class = "row mb-3">
                <label for = "role" class = 'col-lg-3 col-form-label'>Roles *</label>
                <div class="col-lg-6">
                    <select id="role" class="form-select @error('role') is-invalid @enderror" name="role" required>
                        <option selected>select --</option>
                        @foreach ($roles as $role)
                            <option value="{{$role->name}}"{{ $roleName == $role->name ? 'selected' : '' }}>{{$role->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <div class = 'card-footer d-flex gap-1'>
            <button type = "submit" class = 'btn btn-primary'>
                <i class = 'bi bi-save pe-2'></i>
                Update Data
            </button>
            <a href = "{{ route('user.show', $user) }}" class = 'btn btn-danger'>
                <i class = 'bi bi-x-circle pe-2'></i>
                Cancel
            </a>
            <button type="button" class='btn btn-warning ms-auto' onclick="showChangePasswordForm()">
                <i class="bi bi-key-fill pe-2"></i>
                Change Password
            </button>
        </div>   
    </form>
    
    <form method="POST" action="{{ route('change.password') }}">
        @csrf 

         @foreach ($errors->all() as $error)
            <p class="text-danger">{{ $error }}</p>
         @endforeach 

        <div id="changePasswordCard" class="card mt-5 w-75 mx-auto" style="display: none;">
            <div class="card-body">
                <div class="form-group row mb-2">
                    <label for="password" class="col-md-3 col-form-label text-md-right">Current Password *</label>
        
                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control" name="current_password" autocomplete="current-password">
                    </div>
                </div>
        
                <div class="form-group row mb-1">
                    <label for="password" class="col-md-3 col-form-label text-md-right">New Password *</label>
        
                    <div class="col-md-6">
                        <input id="new_password" type="password" class="form-control" name="new_password" autocomplete="current-password">
                    </div>
                </div>
        
                <div class="form-group row">
                    <label for="password" class="col-md-3 col-form-label text-md-right">New Confirm Password *</label>
        
                    <div class="col-md-6">
                        <input id="new_confirm_password" type="password" class="form-control" name="new_confirm_password" autocomplete="current-password">
                    </div>
                </div>
            </div>
            <div class = 'card-footer d-flex'>
                <button type = "submit" class = 'btn btn-primary'>
                    <i class = 'bi bi-save pe-2'></i>
                    Update Password
                </button>
                <button type="button" class="btn btn-secondary ms-auto" onclick="hideChangePasswordForm()">
                    <i class="bi bi-door-closed-fill pe-2"></i>
                    Close
                </button>
            </div>   
        </div>
    </form>
</div>
@endsection

@push('javascript')
    <script src="{{ asset('js/changepassword.js') }}"></script>
@endpush