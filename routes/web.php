<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Student;
use App\Models\Course;

Route::get('/', function () {
    return redirect('/students');
});

// STUDENT ROUTES
Route::get('/students', function () {
    $students = Student::all();
    return view('student.list', compact('students'));
})->name('students.index');

Route::get('/students/create', function () {
    return view('student.create');
});

Route::post('/students', function (Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:students,email',
        'phone' => 'required|string|max:20',
        'address' => 'nullable|string|max:500',
        'date_of_birth' => 'nullable|date',
    ]);

    $student = Student::create($validated);
    return redirect()->route('students.index')->with('success', "Student {$student->name} created successfully!");
});

Route::get('/students/{id}', function ($id) {
    $student = Student::findOrFail($id);
    return view('student.detail', compact('student'));
});

Route::get('/students/{id}/edit', function ($id) {
    $student = Student::findOrFail($id);
    return view('student.edit', compact('student'));
});

Route::put('/students/{id}', function (Request $request, $id) {
    $student = Student::findOrFail($id);
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => ['required', 'email', 'max:255', Rule::unique('students')->ignore($student->id)],
        'phone' => 'required|string|max:20',
        'address' => 'nullable|string',
        'date_of_birth' => 'nullable|date',
    ]);

    $student->update($validated);
    return redirect('/students')->with('success', 'Student updated successfully!');
});

Route::delete('/students/{id}', function ($id) {
    $student = Student::findOrFail($id);
    $student->delete();
    return redirect('/students')->with('success', 'Student deleted successfully!');
});


// COURSE ROUTES
Route::get('/courses', function () {
    $courses = Course::all();
    return view('course.list', compact('courses'));
})->name('courses.index');

Route::get('/courses/create', function () {
    return view('course.create');
});

Route::post('/courses', function (Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'duration' => 'required|integer|min:1',
        'fee' => 'required|numeric|min:0',
        'difficulty' => 'required|in:Easy,Medium,Hard',
    ]);

    $course = Course::create($validated);
    return redirect()->route('courses.index')->with('success', "Course {$course->name} created successfully!");
});

Route::get('/courses/{id}', function ($id) {
    $course = Course::findOrFail($id);
    return view('course.detail', compact('course'));
});

Route::get('/courses/{id}/edit', function ($id) {
    $course = Course::findOrFail($id);
    return view('course.edit', compact('course'));
});

Route::put('/courses/{id}', function (Request $request, $id) {
    $course = Course::findOrFail($id);
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'duration' => 'required|integer|min:1',
        'fee' => 'required|numeric|min:0',
        'difficulty' => 'required|in:Easy,Medium,Hard',
    ]);

    $course->update($validated);
    return redirect('/courses')->with('success', 'Course updated successfully!');
});

Route::delete('/courses/{id}', function ($id) {
    $course = Course::findOrFail($id);
    $course->delete();
    return redirect('/courses')->with('success', 'Course deleted successfully!');
});
