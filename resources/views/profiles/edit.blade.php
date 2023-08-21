@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Update Profile</h2>
    <form method="post" action="{{ route('profile.update', ['user' => Auth::user()->id]) }}">
        @csrf
        @method('PUT')
        <div class="border p-4 mb-4"> <!-- Added margin to the container -->
            <div class="mb-3">
                <label for="name" class="form-label">{{ __('Name') }}</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ Auth::user()->name }}" required autocomplete="name" autofocus>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">{{ __('Email') }}</label>
                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ Auth::user()->email }}" required autocomplete="email">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="d-flex justify-content-start mb-3">
                <button type="submit" class="btn btn-primary mr-1">{{ __('Update') }}</button>
                <a href="{{ url()->previous() }}" class="btn btn-secondary">{{ __('Cancel') }}</a>
            </div>
        </div>
    </form>
</div>
@endsection