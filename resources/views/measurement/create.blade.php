@extends('layouts.main')
@section('content')

<div>
    <form method="post" action="{{ route('measurement.store') }}" enctype="multipart/form-data" class = 'card w-75 mx-auto'>
        @csrf
        <div class = 'card-header'>
            <h5>Create New Measurement</h5>
        </div>
        <div class = 'card-body'>
            <div class = "row mb-2">
                <label for = "name" class = 'col-lg-3 col-form-label'>Name *</label>
                <div class = 'col-lg-6'>
                    <input type = "text" placeholder = "name" class = "form-control" name="name" required/>
                </div>
            </div>
            <div class = "row mb-2">
                <label for = "symbol" class = 'col-lg-3 col-form-label'>Symbol *</label>
                <div class = 'col-lg-6'>
                    <input type = "text" placeholder = "symbol" class = "form-control" name="symbol" required/>
                </div>
            </div>
        </div>
        <div class = 'card-footer'>
            <button type = "submit" class = 'btn btn-primary'>
                <i class = 'bi bi-save'></i>
                Add Measurement
            </button>
            <a href = "{{ route('measurement') }}" class = 'btn btn-danger'>
                <i class = 'bi bi-x-circle'></i>
                Cancel
            </a>
        </div>   
    </form>
</div>

@endsection