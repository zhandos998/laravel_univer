<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', [App\Http\Controllers\Admin\AdminController::class, 'index'])->name('admin');

Route::get('/admin/users', [App\Http\Controllers\Admin\AdminUserController::class, 'view_users'])->name('view_user');
Route::get('/admin/user/{id}', [App\Http\Controllers\Admin\AdminUserController::class, 'view_user'])->name('view_user');
Route::get('/admin/add_user', [App\Http\Controllers\Admin\AdminUserController::class, 'add_user'])->name('add_user');
Route::post('/admin/add_user', [App\Http\Controllers\Admin\AdminUserController::class, 'add_user'])->name('add_user');
Route::get('/admin/change_user/{id}', [App\Http\Controllers\Admin\AdminUserController::class, 'change_user'])->name('change_user');
Route::post('/admin/change_user/{id}', [App\Http\Controllers\Admin\AdminUserController::class, 'change_user'])->name('change_user');
Route::get('/admin/delete_user/{id}', [App\Http\Controllers\Admin\AdminUserController::class, 'delete_user'])->name('delete_user');
Route::get('/admin/user/add_to_group/{id}', [App\Http\Controllers\Admin\AdminUserController::class, 'add_to_group'])->name('add_to_group');
Route::post('/admin/user/add_to_group/{id}', [App\Http\Controllers\Admin\AdminUserController::class, 'add_to_group'])->name('add_to_group');


Route::get('/admin/subjects', [App\Http\Controllers\Admin\AdminSubjectController::class, 'view_subjects'])->name('view_subjects');
Route::get('/admin/add_subject', [App\Http\Controllers\Admin\AdminSubjectController::class, 'add_subject'])->name('add_subject');
Route::post('/admin/add_subject', [App\Http\Controllers\Admin\AdminSubjectController::class, 'add_subject'])->name('add_subject');
Route::get('/admin/change_subject/{id}', [App\Http\Controllers\Admin\AdminSubjectController::class, 'change_subject'])->name('change_subject');
Route::post('/admin/change_subject/{id}', [App\Http\Controllers\Admin\AdminSubjectController::class, 'change_subject'])->name('change_subject');
Route::get('/admin/delete_subject/{id}', [App\Http\Controllers\Admin\AdminSubjectController::class, 'delete_subject'])->name('delete_subject');
// Route::get('/admin/subject/add_to_group/{id}', [App\Http\Controllers\Admin\AdminSubjectController::class, 'add_to_group'])->name('add_to_group');
// Route::post('/admin/subject/add_to_group/{id}', [App\Http\Controllers\Admin\AdminSubjectController::class, 'add_to_group'])->name('add_to_group');


Route::get('/admin/groups', [App\Http\Controllers\Admin\AdminGroupController::class, 'view_groups'])->name('view_groups');
Route::get('/admin/group/{id}', [App\Http\Controllers\Admin\AdminGroupController::class, 'view_group'])->name('view_group');
Route::get('/admin/add_group', [App\Http\Controllers\Admin\AdminGroupController::class, 'add_group'])->name('add_group');
Route::post('/admin/add_group', [App\Http\Controllers\Admin\AdminGroupController::class, 'add_group'])->name('add_group');
Route::get('/admin/change_group/{id}', [App\Http\Controllers\Admin\AdminGroupController::class, 'change_group'])->name('change_group');
Route::post('/admin/change_group/{id}', [App\Http\Controllers\Admin\AdminGroupController::class, 'change_group'])->name('change_group');
Route::get('/admin/delete_group/{id}', [App\Http\Controllers\Admin\AdminGroupController::class, 'delete_group'])->name('delete_group');
Route::get('/admin/remove_from_group/{id}', [App\Http\Controllers\Admin\AdminGroupController::class, 'remove_from_group'])->name('remove_from_group');
Route::get('/admin/group/view_subjects/{id}', [App\Http\Controllers\Admin\AdminGroupController::class, 'view_subjects'])->name('view_subjects');
Route::get('/admin/group/add_subject/{id}', [App\Http\Controllers\Admin\AdminGroupController::class, 'add_subject'])->name('group_add_subject');
Route::post('/admin/group/add_subject/{id}', [App\Http\Controllers\Admin\AdminGroupController::class, 'add_subject'])->name('group_add_subject');
Route::get('/admin/group/delete_subject/{id}', [App\Http\Controllers\Admin\AdminGroupController::class, 'delete_subject'])->name('group_delete_subject');



Route::get('/admin/news', [App\Http\Controllers\Admin\AdminNewController::class, 'view_news'])->name('view_news');
Route::get('/admin/add_new', [App\Http\Controllers\Admin\AdminNewController::class, 'add_new'])->name('add_new');
Route::post('/admin/add_new', [App\Http\Controllers\Admin\AdminNewController::class, 'add_new'])->name('add_new');
Route::get('/admin/change_new/{id}', [App\Http\Controllers\Admin\AdminNewController::class, 'change_new'])->name('change_new');
Route::post('/admin/change_new/{id}', [App\Http\Controllers\Admin\AdminNewController::class, 'change_new'])->name('change_new');
Route::get('/admin/delete_new/{id}', [App\Http\Controllers\Admin\AdminNewController::class, 'delete_new'])->name('delete_new');



// -----------------------------------------------------------------------------------------------------------------------
// -----------------------------------------------------------------------------------------------------------------------
// -----------------------------------------------------------------------------------------------------------------------



Route::get('/teacher', [App\Http\Controllers\Teacher\TeacherController::class, 'index'])->name('teacher');
Route::get('/teacher/view_group/subject_{subject_id}/group_{group_id}', [App\Http\Controllers\Teacher\TeacherController::class, 'view_group'])->name('view_group');
Route::get('/teacher/timetable', [App\Http\Controllers\Teacher\TeacherController::class, 'timetable'])->name('timetable');
Route::get('/teacher/group/add_document/subject_{subject_id}/group_{group_id}', [App\Http\Controllers\Teacher\TeacherController::class, 'add_document'])->name('add_document');
Route::post('/teacher/group/add_document/subject_{subject_id}/group_{group_id}', [App\Http\Controllers\Teacher\TeacherController::class, 'add_document'])->name('add_document');
Route::get('/teacher/view_student/subject_{subject_id}/student_{student_id}', [App\Http\Controllers\Teacher\TeacherController::class, 'view_student'])->name('view_student');
Route::post('/teacher/view_student/subject_{subject_id}/student_{student_id}', [App\Http\Controllers\Teacher\TeacherController::class, 'view_student'])->name('view_student');




// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
