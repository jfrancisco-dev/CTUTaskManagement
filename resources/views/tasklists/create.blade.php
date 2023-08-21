@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add New Tasklist</h2>
    <div class="border p-4 mb-2">
        <form method="POST" action="{{ route('tasklist.store') }}">
            @csrf

            <div class="form-group">
                <label for="name">Name:</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="desc">Description:</label>
                <textarea id="desc" class="form-control @error('desc') is-invalid @enderror" name="desc" required autocomplete="desc" autofocus>{{ old('desc') }}</textarea>
                @error('desc')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-0">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{ route('tasklist.index') }}" class="btn btn-secondary">Back</a>
            </div>
        </form>
    </div>
</div>
@endsection