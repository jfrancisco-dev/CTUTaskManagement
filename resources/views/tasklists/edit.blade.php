@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Tasklist</h2>
    <div class="border p-4 mb-2">
        <form method="post" action="{{ route('tasklist.update', ['tasklist' => $tasklist->id]) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $tasklist->name) }}">
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="desc">Description:</label>
                <textarea name="desc" id="desc" class="form-control @error('desc') is-invalid @enderror">{{ old('desc', $tasklist->desc) }}</textarea>
                @error('desc')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-0">
                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('tasklist.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection