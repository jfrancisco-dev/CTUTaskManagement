@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Task</h2>
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
                    <a href="{{route('task.view', ['task' => $task])}}"><button>View</button></a>
                    <a href="{{route('task.edit', ['task' => $task])}}"><button>Edit</button></a>
                    <a href="{{route('task.delete', ['task' => $task])}}"><button>Delete</button></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        <a href= "{{route('task.create')}}"><button>Add New Task</button></a>
    </div>
</div>
@endsection