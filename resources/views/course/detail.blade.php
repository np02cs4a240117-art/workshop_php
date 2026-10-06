@extends('layouts.app')

@section('content')
<div class="card shadow-sm col-md-8 mx-auto">
    <div class="card-header bg-info text-white">
        <h4 class="mb-0">Course Details</h4>
    </div>
    <div class="card-body">
        <p><strong>Code:</strong> {{ $course->code }}</p>
        <p><strong>Name:</strong> {{ $course->name }}</p>
        <p><strong>Credits:</strong> {{ $course->credits }}</p>
        <p><strong>Description:</strong> {{ $course->description ?? 'N/A' }}</p>
        <hr>
        <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-warning">Edit</a>
        <a href="{{ route('courses.index') }}" class="btn btn-secondary">Back to List</a>
    </div>
</div>
@endsection