@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Task</h2>
        <div style="display: flex; justify-content: flex-end; margin-top: 10px;">
            <form action="{{ route('task.index') }}" method="GET">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search" style="max-width: 200px;" value="{{ Request::get('search') }}">
                    <div class="input-group-append">
                        <button type="submit" class="btn btn-success">Search</button>
                    </div>
                </div>
            </form>
        </div> 
    </div>
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Task Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
            <tr>
                <td>{{ $task->id }}</td>
                <td>{{ $task->name }}</td>
                <td>{{ $task->desc }}</td>
                <td>
                    <a href="{{ route('task.view', ['task' => $task]) }}" class="btn btn-info">View</a>
                    <a href="{{ route('task.edit', ['task' => $task]) }}" class="btn btn-warning">Edit</a>
                    <a href="{{ route('task.delete', ['task' => $task]) }}" class="btn btn-danger">Delete</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $tasks->links('pagination::bootstrap-4') }}
    </div>
</div>
@endsection