@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Course List</h2>
    <a href="{{ route('courses.create') }}" class="btn btn-primary">Add New Course</a>
</div>

<table class="table table-bordered bg-white shadow-sm">
    <thead class="table-dark">
        <tr>
            <th>Code</th>
            <th>Name</th>
            <th>Credits</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($courses as $course)
            <tr>
                <td>{{ $course->code }}</td>
                <td>{{ $course->name }}</td>
                <td>{{ $course->credits }}</td>
                <td>
                    <a href="{{ route('courses.show', $course->id) }}" class="btn btn-sm btn-info text-white">View</a>
                    <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('courses.destroy', $course->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this course?')">Delete</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center">No courses found.</td>
            </tr>
        @endforelse
    </tbody>
</table>
@endsection