<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('students.index');
});

// Student Resource Routes (Index, Create, Store, Show, Edit, Update, Destroy)
Route::resource('students', StudentController::class);