<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');
Route::get('/admin/users', [App\Http\Controllers\AdminController::class, 'view_users'])->name('admin');
Route::get('/admin/user/{id}', [App\Http\Controllers\AdminController::class, 'view_user'])->name('admin');
Route::get('/admin/add_user', [App\Http\Controllers\AdminController::class, 'add_user'])->name('admin');
Route::post('/admin/add_user', [App\Http\Controllers\AdminController::class, 'add_user'])->name('admin');














Route::get('/teacher', [App\Http\Controllers\TeacherController::class, 'index'])->name('teacher');




// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
