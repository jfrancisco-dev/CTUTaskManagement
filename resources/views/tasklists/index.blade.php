@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tasklist</h2>
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
                    <a href="{{route('tasklist.view', ['tasklist' => $tasklist])}}"><button>View</button></a>
                    <a href="{{route('tasklist.edit', ['tasklist' => $tasklist])}}"><button>Edit</button></a>
                    <a href="{{route('tasklist.delete', ['tasklist' => $tasklist])}}"><button>Delete</button></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        <a href= "{{route('tasklist.create')}}"><button>Add New Tasklist</button></a>
    </div>
</div>
@endsection