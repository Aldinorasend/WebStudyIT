<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegularUserController;
use App\Http\Controllers\AuthController;


Route::get('/',[RegularUserController::class, 'indexUser']);
Route::get('/instructors', [AdminController::class, 'indexInstructor']);
Route::get('/admin/dashboard', [AdminController::class, 'indexDashboard']);
Route::get('/instructors/create', [AdminController::class, 'create']);
Route::post('/instructors', [AdminController::class, 'store']);
Route::get('/instructors/{id}/edit', [AdminController::class, 'edit']);
Route::put('/instructors/{id}', [AdminController::class, 'update']);
Route::delete('/instructors/{id}', [AdminController::class, 'destroy']); 
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);