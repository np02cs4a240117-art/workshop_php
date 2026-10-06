@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-info text-white">
                <h4 class="mb-0">Student Details</h4>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <strong>ID:</strong> {{ $student->id }}
                </div>
                <hr>
                <div class="mb-3">
                    <strong>Full Name:</strong> {{ $student->name }}
                </div>
                <hr>
                <div class="mb-3">
                    <strong>Email:</strong> {{ $student->email }}
                </div>
                <hr>
                <div class="mb-3">
                    <strong>Phone:</strong> {{ $student->phone }}
                </div>
                <hr>
                <div class="mb-3">
                    <strong>Address:</strong> {{ $student->address ?? 'N/A' }}
                </div>
                <hr>
                <div class="mb-3">
                    <strong>Date of Birth:</strong> 
                    {{ $student->dob ? \Carbon\Carbon::parse($student->dob)->format('Y-m-d') : 'N/A' }}
                </div>
                <hr>
                <div class="mt-4">
                    <a href="{{ route('students.edit', $student) }}" class="btn btn-warning">Edit</a>
                    <a href="{{ route('students.index') }}" class="btn btn-secondary">Back to List</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection