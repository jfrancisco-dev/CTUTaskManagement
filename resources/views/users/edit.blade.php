@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit User</h2>
    <form method="post" action="{{ route('user.update', ['user' => $user->id]) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">{{ __('Name') }}</label>
            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $user->name }}" required autocomplete="name" autofocus>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ $user->email }}" required autocomplete="email">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="d-flex justify-content-start">
            <button type="submit" class="btn btn-primary">{{ __('Save Changes') }}</button>
            <a href="{{ route('user.index') }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
        </div>
    </form>
</div>
@endsection