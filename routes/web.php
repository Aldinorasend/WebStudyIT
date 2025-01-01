<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegularUserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\AuthController;

Route::post('/upload', [FileUploadController::class, 'store']);



Route::get('/',[RegularUserController::class, 'index']);
Route::get('/admin/instructors', [AdminController::class, 'indexInstructor']);
Route::get('/admin/dashboard/{id}', [AdminController::class, 'indexDashboard']);
<<<<<<< HEAD
Route::get('/students',[RegularUserController::class, 'indexUser']);
Route::get('/students/{id}/payment',[RegularUserController::class, 'enroll']);
=======
Route::get('/students/{akun_id}',[RegularUserController::class, 'indexUser']);
Route::get('/students/{akun_id}/payments',[RegularUserController::class, 'enroll']);
>>>>>>> f945bcd8b2afee7ee0135eb36ba138982cca8f31



Route::get('/admin/dashboard', [AdminController::class, 'indexDashboard']);
Route::get('/admin/dashboard', [AdminController::class, 'indexDashboard']);

// Kelola Course
Route::get('/admin/courses', [CourseController::class, 'index']);
Route::get('/admin/courses/create', [CourseController::class, 'create']);
Route::post('/admin/courses', [CourseController::class, 'store']);
Route::get('/admin/courses/{id}/edit', [CourseController::class, 'edit']);
Route::put('/admin/courses/{id}', [CourseController::class, 'update']);
Route::delete('/admin/courses/{id}', [CourseController::class, 'destroy']); 

// Kelola Instructor
Route::get('/admin/instructors', [AdminController::class, 'indexInstructor']);
Route::get('admin/instructors/create', [AdminController::class, 'create']);
Route::post('admin/instructors', [AdminController::class, 'store']);
Route::get('admin/instructors/{id}/edit', [AdminController::class, 'edit']);
Route::put('admin/instructors/{id}', [AdminController::class, 'update']);
Route::delete('admin/instructors/{id}', [AdminController::class, 'destroy']); 

// Kelola Modul
Route::get('/admin/tasks', [AdminController::class, 'indexTask']);
// Route::get('admin/instructors/create', [AdminController::class, 'create']);
Route::post('admin/tasks', [AdminController::class, 'store']);
Route::get('/admin/tasks/{id}/edit', [AdminController::class, 'editTask']);
Route::put('admin/tasks/{id}', [AdminController::class, 'update']);
Route::delete('admin/tasks/{id}', [AdminController::class, 'destroy']); 

Route::get('/instructors/create', [AdminController::class, 'create']);
Route::post('/instructors', [AdminController::class, 'store']);
Route::get('/instructors/{id}/edit', [AdminController::class, 'edit']);
Route::put('/instructors/{id}', [AdminController::class, 'update']);
Route::delete('/instructors/{id}', [AdminController::class, 'destroy']); 

Route::get('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'register']);
Route::get('/forgot-password', [AuthController::class, 'forgotPassword']);
Route::get('/reset-password', [AuthController::class, 'resetPassword']);

Route::get('/students/{akun_id}/courses/{course_id}/modul', [RegularUserController::class, 'readModul']);

