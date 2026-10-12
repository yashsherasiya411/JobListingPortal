@extends('layouts.app')
@section('title', 'Edit Job')

@section('content')
<h2>Edit Job</h2>
<form method="POST" action="{{ route('jobs.update', $job) }}" class="col-lg-7">
    @csrf
    @method('PUT')
    @include('jobs._form')
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('jobs.show', $job) }}" class="btn btn-link">Cancel</a>
</form>
@endsection
