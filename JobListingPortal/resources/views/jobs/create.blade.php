@extends('layouts.app')
@section('title', 'Post a Job')

@section('content')
<h2>Post a Job</h2>
<form method="POST" action="{{ route('jobs.store') }}" class="col-lg-7">
    @csrf
    @include('jobs._form', ['job' => new \App\Models\JobListing()])
    <button type="submit" class="btn btn-primary">Publish</button>
    <a href="{{ route('jobs.index') }}" class="btn btn-link">Cancel</a>
</form>
@endsection
