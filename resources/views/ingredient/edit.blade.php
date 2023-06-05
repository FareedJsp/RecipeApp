@extends('layouts.main')
@section('content')

<div>
    <form method="post" action="{{ route('ingredient.update', $ingredient) }}" enctype="multipart/form-data" class = 'card w-75 mx-auto'>
        @csrf
        @method('PUT')
        <div class = 'card-header'>
            <h5>Update Ingredient</h5>
        </div>
        <div class = 'card-body'>
            <div class = "row mb-2">
                <label for = "name" class = 'col-lg-3 col-form-label'>Name *</label>
                <div class = 'col-lg-6'>
                    <input type = "text" placeholder = "Name" class = "form-control" name="name" value="{{ old('name', $ingredient->name) }}" required/>
                </div>
            </div>
        </div>
        <div class = 'card-footer'>
            <button type = "submit" class = 'btn btn-primary'>
                <i class = 'bi bi-save'></i>
                Update Ingredient
            </button>
            <a th:href = "{{ route('ingredient') }}" class = 'btn btn-danger'>
                <i class = 'bi bi-x-circle'></i>
                Cancel
            </a>
        </div>   
    </form>
</div>

@endsection