<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/instructors', [AdminController::class, 'indexInstructor']);
Route::get('/admin/dashboard', [AdminController::class, 'indexDashboard']);
Route::get('/instructors/create', [AdminController::class, 'create']);
Route::post('/instructors', [AdminController::class, 'store']);
Route::get('/instructors/{id}/edit', [AdminController::class, 'edit']);
Route::put('/instructors/{id}', [AdminController::class, 'update']);
Route::delete('/instructors/{id}', [AdminController::class, 'destroy']); 
