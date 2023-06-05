@extends('layouts.main')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class = 'card-title'>Ingredient</h5>
        </div>
        <form action="{{ route('ingredient') }}" method="GET" class="card-body">
            <div class="d-flex gap-2">
                <input type="text" name="search" value="{{ request('search') }}" class="form-control mr-2" placeholder="Search">
                <button type="submit" class="btn btn-primary">Search</button>
                <a href = "{{ route('ingredient.create') }}"
			    	class = 'btn btn-primary' title = "Add Ingredient"><i class = 'bi bi-plus-circle'></i>
                </a>
            </div>
        </form>
    </div>

    <div class="card card-body mt-3">
        <table class="table">
            <thead>
                <tr>
                    <th class="col-2">Code</th>
                    <th class="col-2">Name</th>
                    <th class="col-7">Unit Measurement</th>
                    <th class="col-1 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($ingredient as $ing)
                    <tr>
                        <td>Will be Updated Later</td>
                        <td>{{ $ing->name }}</td>
                        <td>Later</td>
                        <td class="text-center">
                            <a href = "{{ route('ingredient.edit', $ing) }}"><i class = "bi bi-pencil"></i></a>
                            <a onclick = "return confirm('Sure to delete?')" href = "{{ route('ingredient.delete', $ing) }}">
		                    	<i class = "bi bi-trash"></i>
							</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $ingredient->appends(request()->except('page'))->links() }}
    </div>
@endsection