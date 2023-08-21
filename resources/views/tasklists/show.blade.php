@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tasklist Details</h2>
    <div class="border p-4 mb-2">
        <div class="form-group">
            <label for="id">ID:</label>
            <input type="text" class="form-control" id="id" name="id" value="{{ $tasklist->id }}" disabled>
        </div>
        <div class="form-group">
            <label for="name">Tasklist's Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $tasklist->name }}" disabled>
        </div>
        <div class="form-group">
            <label for="desc">Description:</label>
            <input type="text" class="form-control" id="desc" name="desc" value="{{ $tasklist->desc }}" disabled>
        </div>
        <a href="{{ route('tasklist.index') }}" class="btn btn-secondary">Back</a>
    </div>
</div>
@endsection