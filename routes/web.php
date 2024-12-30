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
Route::get('/students/{akun_id}',[RegularUserController::class, 'indexUser']);
Route::get('/students/{akun_id}/payments',[RegularUserController::class, 'enroll']);



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



Route::get('/instructors/create', [AdminController::class, 'create']);
Route::post('/instructors', [AdminController::class, 'store']);
Route::get('/instructors/{id}/edit', [AdminController::class, 'edit']);
Route::put('/instructors/{id}', [AdminController::class, 'update']);
Route::delete('/instructors/{id}', [AdminController::class, 'destroy']); 

Route::get('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'register']);
Route::get('/forgot-password', [AuthController::class, 'forgotPass']);
Route::get('/reset-password', [AuthController::class, 'resetPass']);
Route::get('/students/{akun_id}/courses/{course_id}/modul', [RegularUserController::class, 'readModul']);

