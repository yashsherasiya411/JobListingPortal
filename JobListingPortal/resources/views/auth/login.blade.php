@extends('layouts.app')
@section('title', 'Login')

@section('content')
<div class="col-md-6 col-lg-4 mx-auto">
    <h2>Login</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
            <label class="form-label" for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}"
                   class="form-control @error('email') is-invalid @enderror" required>
            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control" required>
        </div>
        <div class="form-check mb-3">
            <input type="checkbox" id="remember" name="remember" class="form-check-input">
            <label class="form-check-label" for="remember">Remember me</label>
        </div>
        <button type="submit" class="btn btn-primary w-100">Login</button>
    </form>
    <p class="mt-3 small text-muted">Demo account after seeding: demo@example.com / password123</p>
</div>
@endsection
