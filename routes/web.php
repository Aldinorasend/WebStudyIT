<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegularUserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\AuthController;

// Route::post('/upload', [FileUploadController::class, 'store']);
Route::get('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'register']);
Route::get('/forgot-password', [AuthController::class, 'forgotPassword']);
Route::get('/reset-password', [AuthController::class, 'resetPassword']);

// USER FUNCTIONALITY
Route::get('/',[RegularUserController::class, 'index']);
Route::get('/students/{akun_id}',[RegularUserController::class, 'indexUser']);
Route::get('/students/{akun_id}/payments',[RegularUserController::class, 'enroll']);
Route::get('/students/{akun_id}/courses/{course_id}/modul', [RegularUserController::class, 'readModul']);



// INSTRUCTOR DATA
Route::get('admin/instructors', [AdminController::class, 'indexInstructor']);
Route::get('admin/instructors/create', [AdminController::class, 'createInstructor']);
Route::post('admin/instructors', [AdminController::class, 'storeInstructor']);
Route::get('admin/instructors/{id}/edit', [AdminController::class, 'editInstructor']);
Route::put('admin/instructors/{id}', [AdminController::class, 'updateInstructor']);
Route::delete('admin/instructors/{id}', [AdminController::class, 'destroyInstructor']); 

// COURSE DATA
Route::get('/admin/courses', [AdminController::class, 'indexCourse']);
Route::get('/admin/courses/create', [AdminController::class, 'createCourse']);
Route::post('/admin/courses', [AdminController::class, 'storeCourse']);
Route::get('/admin/courses/{id}/edit', [AdminController::class, 'editCourse']);
Route::put('/admin/courses/', [AdminController::class, 'updateCourse']);
Route::delete('/admin/courses/{id}', [AdminController::class, 'destroyCourse']); 





