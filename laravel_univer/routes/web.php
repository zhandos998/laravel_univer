<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
Route::get('/admin/users', [App\Http\Controllers\AdminController::class, 'view_users'])->name('view_user');
Route::get('/admin/user/{id}', [App\Http\Controllers\AdminController::class, 'view_user'])->name('view_user');
Route::get('/admin/add_user', [App\Http\Controllers\AdminController::class, 'add_user'])->name('add_user');
Route::post('/admin/add_user', [App\Http\Controllers\AdminController::class, 'add_user'])->name('add_user');
Route::get('/admin/change_user/{id}', [App\Http\Controllers\AdminController::class, 'change_user'])->name('change_user');
Route::post('/admin/change_user/{id}', [App\Http\Controllers\AdminController::class, 'change_user'])->name('change_user');
Route::get('/admin/delete_user/{id}', [App\Http\Controllers\AdminController::class, 'delete_user'])->name('delete_user');

// -----------------------------------------------------------------------------------------------------------------------

Route::get('/teacher', [App\Http\Controllers\TeacherController::class, 'index'])->name('teacher');




// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
