
@extends('layouts.app')

@section('content')
<div class="container">
    <h2>User Details</h2>
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>User's Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
            </tr>
        </tbody>
    </table>
    <a href= "{{route('user.index')}}"><button>Back</button></a>
</div>
@endsection