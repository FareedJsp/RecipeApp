@extends('layouts.main')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class = 'card-title'>Measurement Unit</h5>
        </div>
        <form action="{{ route('measurement') }}" method="GET" class="card-body">
            <div class="d-flex gap-2">
                <input type="text" name="search" value="{{ request('search') }}" class="form-control mr-2" placeholder="Search">
                <button type="submit" class="btn btn-primary">Search</button>
                <a href = "{{ route('measurement.create') }}"
			    	class = 'btn btn-primary' title = "Add Measurement"><i class = 'bi bi-plus-circle'></i>
                </a>
            </div>
        </form>
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
                    <th class="col-2">Name</th>
                    <th class="col-9">Symbol</th>
                    <th class="col-1 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($measurement as $mes)
                    <tr>
                        <td>{{ $mes->name }}</td>
                        <td>{{ $mes->symbol }}</td>
                        <td class="text-center">
                            <a href = "{{ route('measurement.edit', $mes) }}"><i class = "bi bi-pencil"></i></a>
                            <a onclick = "return confirm('Sure to delete?')" href = "{{ route('measurement.delete', $mes) }}">
		                    	<i class = "bi bi-trash"></i>
							</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $measurement->appends(request()->except('page'))->links() }}
    </div>
@endsection