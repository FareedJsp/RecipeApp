@extends('layouts.main')
@section('content')

<div>
    <form method="post" action="{{ route('ingredient.store') }}" enctype="multipart/form-data" class = 'card w-75 mx-auto'>
        @csrf
        <div class = 'card-header'>
            <h5>Create New Ingredient</h5>
        </div>
        <div class = 'card-body'>
            <div class = "row mb-2">
                <label for = "name" class = 'col-lg-3 col-form-label'>Name *</label>
                <div class = 'col-lg-6'>
                    <input type = "text" placeholder = "Name" class = "form-control" name="name" required/>
                </div>
            </div>
            <div class = "row mb-2">
                <label for = "ingredientType" class = 'col-lg-3 col-form-label'>Ingredient Type *</label>
                <div class="col-lg-6">
                    <select class="form-select" name="ingredient_type_id">
                        <option selected>select --</option>
                        @foreach ($ingredientType as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-2">
                <label for = "measurement" class = 'col-lg-3 col-form-label'>Measurement *</label>
                @foreach ($measurement as $mes)
                <div class="form-group">
                    <input class="form-check-input" type="checkbox" value="{{ $mes->id }}" name="measurement[]">
                    <label class="form-check-label">
                        {{ $mes->name }}
                    </label>
                    <div class="clearfix"></div>
                </div>
                @endforeach
            </div>
            
            {{-- <div class="row mb-2">
                <label for = "measurement_id" class = 'col-lg-3 col-form-label'>Measurement *</label>
                @foreach ($measurement as $mes)
                <div class="form-group">
                    <label>
                    <input type="checkbox" name="measurement_id" value="{{ $mes->id }}">
                    {{ $mes->name }}
                    </label>
                    <div class="clearfix"></div>
                </div>
                @endforeach
            </div> --}}
            
        </div>
        <div class = 'card-footer'>
            <button type = "submit" class = 'btn btn-primary'>
                <i class = 'bi bi-save'></i>
                Add Ingredient
            </button>
            <a href = "{{ route('ingredient') }}" class = 'btn btn-danger'>
                <i class = 'bi bi-x-circle'></i>
                Cancel
            </a>
        </div>   
    </form>
</div>

@endsection