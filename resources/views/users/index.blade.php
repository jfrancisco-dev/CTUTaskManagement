@extends('layouts.app')

@section('content')
<div class="container">
    <h2>User List</h2>
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
                    <a href="{{route('user.view', ['user' => $user])}}"><button>View</button></a>
                    <a href="{{route('user.edit', ['user' => $user])}}"><button>Edit</button></a>
                    <a href="{{route('user.delete', ['user' => $user])}}"><button>Delete</button></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
        <a href= "{{route('user.create')}}"><button>Add New User</button></a>
    </div>
</div>
@endsection