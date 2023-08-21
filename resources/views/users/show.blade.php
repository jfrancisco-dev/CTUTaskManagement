@extends('layouts.app')

@section('content')
<div class="container">
    <h2>User Details</h2>
    <div class="border p-4 mb-2">
        <div class="form-group">
            <label for="id">ID:</label>
            <input type="text" class="form-control" id="id" name="id" value="{{ $user->id }}" disabled>
        </div>
        <div class="form-group">
            <label for="name">User's Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" disabled>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" disabled>
        </div>
        <a href="{{ route('user.index') }}" class="btn btn-secondary">Back</a>
    </div>
</div>
@endsection