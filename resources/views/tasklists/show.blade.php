
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tasklist Details</h2>
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tasklist's Name</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $tasklist->id }}</td>
                <td>{{ $tasklist->name }}</td>
                <td>{{ $tasklist->desc }}</td>
            </tr>
        </tbody>
    </table>
    <a href= "{{route('tasklist.index')}}"><button>Back</button></a>
</div>
@endsection