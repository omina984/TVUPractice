<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\CourseController;
use App\Http\Controllers\admin\LessongroupController;
use App\Http\Controllers\admin\TermController;
use App\Http\Controllers\admin\UserController as AdminUserController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Models\admin\Lessongroup;

Auth::routes();

// login
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//reset password
Route::get('/resetpassword', [ResetPasswordController::class, 'index'])->name('auth.resetpassword.index');
Route::post('/resetpassword', [ResetPasswordController::class, 'resetpassword'])->name('auth.resetpassword.resetpass');

Route::prefix('admin')->middleware('Check_Is_ADMIN')->group(function () {
    //admin - index
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');

    //admin - user
    Route::get('/users', [AdminUserController::class, 'index'])->name('admin.users.index');
    Route::post('/users', [AdminUserController::class, 'search'])->name('admin.users.search');

    Route::get('/user/create', [AdminUserController::class, 'create'])->name('admin.user.create');
    Route::post('/user/store', [AdminUserController::class, 'store'])->name('admin.user.store');

    Route::get('/user/edit/{user}', [AdminUserController::class, 'edit'])->name('admin.user.edit');
    Route::post('/user/update/{user}', [AdminUserController::class, 'update'])->name('admin.user.update');

    //admin - term
    Route::get('/terms', [TermController::class, 'index'])->name('admin.terms.index');

    Route::get('/term/create', [TermController::class, 'create'])->name('admin.term.create');
    Route::post('/term/store', [TermController::class, 'store'])->name('admin.term.store');

    Route::get('/term/edit/{term}', [TermController::class, 'edit'])->name('admin.term.edit');
    Route::post('/term/update/{term}', [TermController::class, 'update'])->name('admin.term.update');

    //admin - lessongroup
    Route::get('/lessongroups', [LessongroupController::class, 'index'])->name('admin.lessongroups.index');

    Route::get('/lessongroup/create', [LessongroupController::class, 'create'])->name('admin.lessongroup.create');
    Route::post('/lessongroup/store', [LessongroupController::class, 'store'])->name('admin.lessongroup.store');

    Route::get('/lessongroup/edit/{lessongroup}', [LessongroupController::class, 'edit'])->name('admin.lessongroup.edit');
    Route::post('/lessongroup/update/{lessongroup}', [LessongroupController::class, 'update'])->name('admin.lessongroup.update');

    //admin - course
    Route::get('/courses', [CourseController::class, 'index'])->name('admin.courses.index');

    Route::get('/course/create', [CourseController::class, 'create'])->name('admin.course.create');
    Route::post('/course/store', [CourseController::class, 'store'])->name('admin.course.store');

    Route::get('/course/edit/{course}', [CourseController::class, 'edit'])->name('admin.course.edit');
    Route::post('/course/update/{course}', [CourseController::class, 'update'])->name('admin.course.update');
});
