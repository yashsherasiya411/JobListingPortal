@extends('layouts.app')
@section('title', $job->title)

@section('content')
<div class="card shadow-sm">
    <div class="card-body">
        <span class="badge bg-secondary mb-2">{{ $job->job_type }}</span>
        <h2>{{ $job->title }}</h2>
        <p class="fs-5 mb-1">{{ $job->company }}</p>
        <p class="text-muted">{{ $job->location }}@if ($job->salary) &bull; {{ $job->salary }}@endif</p>
        <hr>
        <p style="white-space: pre-line">{{ $job->description }}</p>
        <p class="text-muted small mb-0">Posted by {{ $job->user->name }} on {{ $job->created_at->format('d M Y') }}</p>
    </div>
    <div class="card-footer bg-white d-flex gap-2">
        <a href="{{ route('jobs.index') }}" class="btn btn-outline-secondary">Back</a>
        @auth
            @if (auth()->id() === $job->user_id)
                <a href="{{ route('jobs.edit', $job) }}" class="btn btn-primary">Edit</a>
                <form method="POST" action="{{ route('jobs.destroy', $job) }}" onsubmit="return confirm('Delete this job post?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            @endif
        @endauth
    </div>
</div>
@endsection
