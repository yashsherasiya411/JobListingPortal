@extends('layouts.app')
@section('title', 'Browse Jobs')

@section('content')
<h2 class="mb-3">Browse Jobs</h2>

<form method="GET" action="{{ route('jobs.index') }}" class="row g-2 mb-4">
    <div class="col-12 col-md-4">
        <input type="text" name="q" value="{{ request('q') }}" class="form-control" placeholder="Job title or company">
    </div>
    <div class="col-6 col-md-3">
        <input type="text" name="location" value="{{ request('location') }}" class="form-control" placeholder="Location">
    </div>
    <div class="col-6 col-md-3">
        <select name="job_type" class="form-select">
            <option value="">All types</option>
            @foreach ($types as $type)
                <option value="{{ $type }}" @selected(request('job_type') === $type)>{{ $type }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-12 col-md-2 d-grid">
        <button class="btn btn-primary" type="submit">Search</button>
    </div>
</form>

<div class="row g-3">
    @forelse ($jobs as $job)
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card h-100 shadow-sm">
                <div class="card-body">
                    <span class="badge bg-secondary mb-2">{{ $job->job_type }}</span>
                    <h5 class="card-title">{{ $job->title }}</h5>
                    <p class="mb-1 fw-semibold">{{ $job->company }}</p>
                    <p class="text-muted mb-2">{{ $job->location }}</p>
                    <p class="card-text small">{{ \Illuminate\Support\Str::limit($job->description, 90) }}</p>
                </div>
                <div class="card-footer bg-white">
                    <a href="{{ route('jobs.show', $job) }}" class="btn btn-sm btn-outline-primary">View details</a>
                </div>
            </div>
        </div>
    @empty
        <p class="text-muted">No jobs found.</p>
    @endforelse
</div>

<div class="mt-4">
    {{ $jobs->links('pagination::bootstrap-5') }}
</div>
@endsection
