<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegularUserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EditProfileController;





Route::get('/', [RegularUserController::class, 'index'])->name('index');
Route::get('/students/{akun_id}', [RegularUserController::class, 'indexUser']);

// Kelola Modul
Route::get('/admin/tasks', [AdminController::class, 'indexTask']);
Route::post('admin/tasks', [AdminController::class, 'store']);
Route::get('/admin/tasks/{id}/edit', [AdminController::class, 'editTask']);
Route::put('admin/tasks/{id}', [AdminController::class, 'update']);
Route::delete('admin/tasks/{id}', [AdminController::class, 'destroy']); 
 

Route::get('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'register']);


Route::get('contact-us/', [ContactUsController::class, 'index'])->name('contact_us.index');
Route::post('contact-us/store', [ContactUsController::class, 'store'])->name('contact_us.store');
Route::get('contact-us/{id}', [ContactUsController::class, 'show'])->name('contact_us.show');
Route::delete('contact-us/{id}', [ContactUsController::class, 'destroy'])->name('contact_us.destroy');

Route::get('/forgot-password', [AuthController::class, 'forgotPassword']);
Route::get('/reset-password', [AuthController::class, 'resetPassword']);

// USER FUNCTIONALITY
Route::get('/',[RegularUserController::class, 'index']);
Route::get('/students/{akun_id}',[RegularUserController::class, 'indexUser']);
Route::get('/students/{akun_id}/payments',[RegularUserController::class, 'enroll']);
Route::get('/students/{akun_id}/courses/{course_id}/modul', [RegularUserController::class, 'readModul']);



Route::get('admin/{akunId}/dashboard', [AdminController::class, 'indexDashboard']);
Route::get('admin/{akunId}/message', [AdminController::class, 'indexMessage']);

// INSTRUCTOR FUNCTIONALITY
Route::get('admin/{akunId}/instructors', [AdminController::class, 'indexInstructor']);
Route::get('admin/{akunId}/instructors/create', [AdminController::class, 'createInstructor']);
Route::post('admin/{akunId}/instructors', [AdminController::class, 'storeInstructor']);
Route::get('admin/{akunId}/instructors/{id}/edit', [AdminController::class, 'editInstructor']);
Route::put('admin/{akunId}/instructors/{id}', [AdminController::class, 'updateInstructor']);
Route::delete('admin/{akunId}/instructors/{id}', [AdminController::class, 'destroyInstructor']); 

// COURSE FUNCTIONALITY
Route::get('/admin/{akunId}/subjects', [AdminController::class, 'indexCourse']);    
Route::get('/admin/{akunId}/subjects/create', [AdminController::class, 'createCourse']);
Route::post('/admin/{akunId}/subjects', [AdminController::class, 'storeCourse']);
Route::get('/admin/{akunId}/subjects/{id}/edit', [AdminController::class, 'editCourse']);
Route::put('/admin/{akunId}/subjects/', [AdminController::class, 'updateCourse']);
Route::delete('/admin/{akunId}/subjects/{id}', [AdminController::class, 'destroyCourse']); 

// MODUL FUNCTIONALITY
Route::get('/admin/{akunId}/moduls', [AdminController::class, 'indexModul']);
Route::get('/admin/{akunId}/moduls/{courseId}', [AdminController::class, 'indexModulByCourseId']);
Route::post('/admin/{akunId}/moduls', [AdminController::class, 'storeTask']);
Route::get('/admin/{akunId}/moduls/{id}/edit', [AdminController::class, 'editTask']);
Route::put('/admin/{akunId}/moduls/{id}', [AdminController::class, 'updateTask']);
Route::delete('/admin/{akunId}/moduls/{id}', [AdminController::class, 'destroyTask']);

// TASK FUNCTIONALITY
Route::get('/admin/{akunId}/tasks', [AdminController::class, 'indexTask']);
Route::post('admin/{akunId}/tasks', [AdminController::class, 'store']);
Route::get('/admin/{akunId}/tasks/{id}/edit', [AdminController::class, 'editTask']);
Route::put('admin/{akunId}/tasks/{id}', [AdminController::class, 'update']);
Route::delete('admin/{akunId}/tasks/{id}', [AdminController::class, 'destroy']); 

// STUDENTS FUNCTIONALITY
Route::get('/admin/{akunId}/students', [AdminController::class, 'indexStudent']);
Route::get('/admin/{akunId}/students/{studentId}/activity', [AdminController::class, 'indexStudentActivity']);



Route::middleware(['auth'])->group(function () {
Route::get('/profile/edit', [EditProfileController::class, 'edit'])->name('profile.edit');
Route::post('/profile/update', [EditProfileController::class, 'update'])->name('profile.update');
});