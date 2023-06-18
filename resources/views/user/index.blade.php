@extends('layouts.main')

@section('content')
    <div class="card">
        <div class="card-header">
            <h5 class = 'card-title'>User</h5>
        </div>
        <form id="filter-form" action="{{ route('user') }}" method="GET" class="card-body">
            <div class="d-flex gap-2">
                <div class="col-2">
                    <select name="role" class="form-control mr-2" onchange="document.getElementById('filter-form').submit()">
                        <option value="">All Roles</option>
                        @foreach ($roles as $role)
                          <option value="{{ $role->name }}" {{ request('role') === $role->name ? 'selected' : '' }}>{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
                <input type="text" name="search" value="{{ request('search') }}" class="form-control mr-2" placeholder="Search">
                <button type="submit" class="btn btn-primary">Search</button>
                <a href = "{{ route('user.create') }}"
			    	class = 'btn btn-primary' title = "Add User"><i class = 'bi bi-plus-circle'></i>
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
                    <th class="col-7">Email</th>
                    <th class="col-2">Role</th>
                    <th class="col-1 text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->roles->pluck('name')[0] ?? '' }}</td>
                        <td class="text-center">
                            <a href = "{{ route('user.edit', $user) }}"><i class = "bi bi-pencil"></i></a>
                            <a onclick = "return confirm('Sure to delete?')" href = "{{ route('user.delete', $user) }}">
		                    	<i class = "bi bi-trash"></i>
							</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $users->appends(request()->except('page'))->links() }}
    </div>
@endsection