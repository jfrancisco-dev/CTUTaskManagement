@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit User</h2>
    <form method="post" action="{{ route('user.update', ['user' => $user->id]) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $user->email }}">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="{{ route('user.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection