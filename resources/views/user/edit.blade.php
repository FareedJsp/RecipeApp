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
        <div class = 'card-footer'>
            <button type = "submit" class = 'btn btn-primary'>
                <i class = 'bi bi-save'></i>
                Update Data
            </button>
            <a href = "{{ route('user') }}" class = 'btn btn-danger'>
                <i class = 'bi bi-x-circle'></i>
                Cancel
            </a>
        </div>   
    </form>
</div>

@endsection