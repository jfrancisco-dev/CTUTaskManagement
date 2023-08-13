@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Task</h2>
    <form method="post" action="{{ route('task.update', ['task' => $task->id]) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $task->name) }}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="desc" class="form-label">Description</label>
            <textarea name="desc" id="desc" class="form-control @error('desc') is-invalid @enderror">{{ old('desc', $task->desc) }}</textarea>
            @error('desc')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-0">
            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="{{ route('task.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection