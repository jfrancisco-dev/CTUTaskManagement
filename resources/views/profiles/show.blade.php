@extends('layouts.app')

@section('content')
<div class="container">
    <h2>User Profile</h2>
    <div class= "border p-4 mb-2">
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name }}" disabled>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" disabled>
        </div>
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Back</a>
    </div>
</div>
@endsection