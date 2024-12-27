<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegularUserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\FileUploadController;

Route::post('/upload', [FileUploadController::class, 'store']);
use App\Http\Controllers\AuthController;


Route::get('/',[RegularUserController::class, 'indexUser']);
Route::get('/notloggedin',[RegularUserController::class, 'indexNotLoggedin']);
Route::get('/loggedin',[RegularUserController::class, 'indexLoggedin']);



Route::get('/admin/dashboard', [AdminController::class, 'indexDashboard']);


// Kelola Course
Route::get('/admin/courses', [AdminController::class, 'indexCourse']);
Route::get('/admin/courses/create', [AdminController::class, 'createCourse']);
Route::post('/admin/courses', [AdminController::class, 'storeCourse']);
Route::get('/admin/courses/{id}/edit', [AdminController::class, 'editCourse']);
Route::put('/admin/courses/{id}', [AdminController::class, 'updateCourse']);
Route::delete('/admin/courses/{id}', [AdminController::class, 'destroyCourse']); 

// Kelola Instructor
Route::get('/admin/instructors', [AdminController::class, 'indexInstructor']);
Route::get('admin/instructors/create', [AdminController::class, 'createConstructor']);
Route::post('admin/instructors', [AdminController::class, 'storeConstructor']);
Route::get('admin/instructors/{id}/edit', [AdminController::class, 'editConstructor']);
Route::put('admin/instructors/{id}', [AdminController::class, 'updateConstructor']);
Route::delete('admin/instructors/{id}', [AdminController::class, 'destroyConstructor']); 


Route::get('/instructors/create', [AdminController::class, 'create']);
Route::post('/instructors', [AdminController::class, 'store']);
Route::get('/instructors/{id}/edit', [AdminController::class, 'edit']);
Route::put('/instructors/{id}', [AdminController::class, 'update']);
Route::delete('/instructors/{id}', [AdminController::class, 'destroy']); 

Route::get('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'register']);
