@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Task</h2>
        <a href="{{ route('task.create') }}" class="btn btn-primary">Add New Task</a>
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