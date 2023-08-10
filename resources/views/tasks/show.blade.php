
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Task Details</h2>
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Task Name</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $task->id }}</td>
                <td>{{ $task->name }}</td>
                <td>{{ $task->desc }}</td>
            </tr>
        </tbody>
    </table>
    <a href= "{{route('task.index')}}"><button>Back</button></a>
</div>
@endsection