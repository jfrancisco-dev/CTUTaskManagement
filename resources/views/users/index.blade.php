@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>User List</h2>
        <div class="d-flex">
            <div style="display: flex; justify-content: flex-end; margin-top: 10px;">
                <form action="{{ route('user.index') }}" method="GET">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search" style="max-width: 200px;" value="{{ Request::get('search') }}">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-success">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>User's Name</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <a href="{{ route('user.view', ['user' => $user]) }}" class="btn btn-info">View</a>
                    <a href="{{ route('user.edit', ['user' => $user]) }}" class="btn btn-warning">Edit</a>
                    <a href="{{ route('user.delete', ['user' => $user]) }}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <div class="d-flex justify-content-center">
        {{ $users->appends(['search' => Request::get('search')])->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection