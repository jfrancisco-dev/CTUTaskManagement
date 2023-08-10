@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Tasklist</h2>
    <form method="post" action="{{ route('task.update', ['task' => $task->id]) }}">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $task->name }}">
        </div>

        <div class="form-group">
            <label for="desc">Description</label>
            <input type="text" name="desc" id="desc" class="form-control" value="{{ $task->desc }}">
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Save Changes</button>
            <a href="{{ route('task.index') }}" class="btn btn-secondary">Cancel</a>
        </div>
    </form>
</div>
@endsection