@extends('layouts.app')

@section('content')
<div class="container">
    <div style="display: flex; justify-content: flex-end; margin-top: 10px;">
        <form action="{{ route('tasklist.index') }}" method="GET">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search" style="max-width: 200px;" value="{{ Request::get('search') }}">
                <div class="input-group-append">
                    <button type="submit" class="btn btn-success">Search</button>
                </div>
            </div>
        </form>
    </div>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Tasklist</h2>
        <a href="{{ route('tasklist.create') }}" class="btn btn-primary">Add New Tasklist</a>
    </div>
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tasklist Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasklists as $tasklist)
            <tr>
                <td>{{ $tasklist->id }}</td>
                <td>{{ $tasklist->name }}</td>
                <td>{{ $tasklist->desc }}</td>
                <td>
                    <a href="{{ route('tasklist.view', ['tasklist' => $tasklist->id]) }}" class="btn btn-info">View</a>
                    <a href="{{ route('tasklist.edit', ['tasklist' => $tasklist->id]) }}" class="btn btn-warning">Edit</a>
                    <a href="{{ route('tasklist.delete', ['tasklist' => $tasklist->id]) }}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $tasklists->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection