@extends('layouts.main')
@section('content')

<div>
    <form method="post" action="{{ route('user.store') }}" enctype="multipart/form-data" class = 'card w-75 mx-auto'>
        @csrf
        <div class = 'card-header'>
            <h5>Create New User</h5>
        </div>
        <div class = 'card-body'>
            <div class = "row mb-3">
                <label for = "name" id="name" class = 'col-lg-3 col-form-label'>Name *</label>
                <div class = 'col-lg-6'>
                    <input type = "text" placeholder = "Name" class = "form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
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
                    <input type = "email" placeholder = "email" class = "form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" required>
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
                            <option value="{{$role->name}}">{{$role->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class = "row mb-3">
                <label for = "password" id="password" class = 'col-lg-3 col-form-label'>Password *</label>
                <div class = 'col-lg-6'>
                    <input type = "password" placeholder = "password" class = "form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="new-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>
            </div>
            <div class = "row mb-3">
                <label for = "password" id="password" class = 'col-lg-3 col-form-label'>Password Confirmation *</label>
                <div class = 'col-lg-6'>
                    <input type="password" id="password-confirm" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>
        </div>
        <div class = 'card-footer'>
            <button type = "submit" class = 'btn btn-primary'>
                <i class = 'bi bi-save'></i>
                Add User
            </button>
            <a href = "{{ route('user') }}" class = 'btn btn-danger'>
                <i class = 'bi bi-x-circle'></i>
                Cancel
            </a>
        </div>   
    </form>
</div>

@endsection