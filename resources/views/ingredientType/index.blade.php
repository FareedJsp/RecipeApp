@extends('layouts.main')

@section('content')
    <div class="card">
        <div class="card-header d-flex gap-2">
            <h5 class = 'card-title'>Ingredient Type</h5>
            <a href = "{{ route('ingredientType.create') }}"
			    class = 'btn btn-primary ms-auto' title = "Add Ingredient Type"><i class = 'bi bi-plus-circle'></i>
            </a>
        </div>
    </div>

    <div class="card card-body mt-3">
        @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
        @endif
        <table class="table">
            <thead>
                <tr>
                    <th class="col-1">#</th>
                    <th class="col-2">Name</th>
                    <th class="col-7">Description</th>
                    <th class="col-2 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($ingredientType as $index => $ingType)
                    <tr>
                        <td> {{ $index + 1}} </td>
                        <td>{{ $ingType->name }}</td>
                        <td>{{ $ingType->description }}</td>
                        <td class="text-center">
                            <a href = "{{ route('ingredientType.edit', $ingType) }}"><i class = "bi bi-pencil"></i></a>
                            <a onclick = "return confirm('Sure to delete?')" href = "{{ route('ingredientType.delete', $ingType) }}">
		                    	<i class = "bi bi-trash"></i>
							</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection