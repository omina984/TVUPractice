<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\LessonController;
use App\Http\Controllers\admin\LessongroupController;
use App\Http\Controllers\admin\MajorController;
use App\Http\Controllers\admin\TeacherLessonController;
use App\Http\Controllers\admin\TermController;
use App\Http\Controllers\admin\UserController as AdminUserController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DepartmentsController;

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

    //admin - lesson
    Route::get('/lessons', [LessonController::class, 'index'])->name('admin.lessons.index');

    Route::get('/lesson/create', [LessonController::class, 'create'])->name('admin.lesson.create');
    Route::post('/lesson/store', [LessonController::class, 'store'])->name('admin.lesson.store');

    Route::get('/lesson/edit/{lesson}', [LessonController::class, 'edit'])->name('admin.lesson.edit');
    Route::post('/lesson/update/{lesson}', [LessonController::class, 'update'])->name('admin.lesson.update');

    //admin - major
    Route::get('/majors', [MajorController::class, 'index'])->name('admin.majors.index');

    Route::get('/major/create', [MajorController::class, 'create'])->name('admin.major.create');
    Route::post('/major/store', [MajorController::class, 'store'])->name('admin.major.store');

    Route::get('/major/edit/{major}', [MajorController::class, 'edit'])->name('admin.major.edit');
    Route::post('/major/update/{major}', [MajorController::class, 'update'])->name('admin.major.update');

    //admin - teacherlesson
    Route::get('/teacherlessons', [TeacherLessonController::class, 'index'])->name('admin.teacherlessons.index');

    Route::get('/teacherlesson/create', [TeacherLessonController::class, 'create'])->name('admin.teacherlesson.create');
    // Route::post('/teacherlessons/create', [TeacherLessonController::class, 'search'])->name('admin.teacherlessons.search');
    Route::get('/teacherlesson/mySearch/{id}', [TeacherLessonController::class, 'mySearch']);
    Route::get('/teacherlesson/getTeachers/{id}', [TeacherLessonController::class, 'getTeachers']);
    Route::post('/teacherlesson/store', [TeacherLessonController::class, 'store'])->name('admin.teacherlesson.store');

    Route::get('/teacherlesson/edit/{teacherlesson}', [TeacherLessonController::class, 'edit'])->name('admin.teacherlesson.edit');
    Route::post('/teacherlesson/update/{teacherlesson}', [TeacherLessonController::class, 'update'])->name('admin.teacherlesson.update');
});
