@extends('layouts.app')
@section('title', 'Register')

@section('content')
<div class="col-md-6 col-lg-4 mx-auto">
    <h2>Create account</h2>
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label" for="name">Name</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}"
                   class="form-control @error('name') is-invalid @enderror" required>
            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}"
                   class="form-control @error('email') is-invalid @enderror" required>
            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="password">Password (min 8 characters)</label>
            <input type="password" id="password" name="password"
                   class="form-control @error('password') is-invalid @enderror" required>
            @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="password_confirmation">Confirm password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Register</button>
    </form>
</div>
@endsection
