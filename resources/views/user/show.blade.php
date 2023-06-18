@extends('layouts.main')
@section('content')

<div>
    <div class = 'card-header'>
        <h5>Create New User</h5>
    </div>
    <div class="card-body">

    </div>
    <div class = 'card-footer'>
        <button type = "submit" class = 'btn btn-primary'>
            <i class = 'bi bi-save'></i>
            Edit Profile
        </button>
        <a href = "{{ route('user') }}" class = 'btn btn-danger'>
            <i class = 'bi bi-x-circle'></i>
            Dashboard
        </a>
    </div>   
</div>

@endsection