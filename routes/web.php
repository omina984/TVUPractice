<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\auth\AuthRegisterController as AuthAuthRegisterController;
use App\Http\Controllers\admin\autheitication\MyAuthController as AutheiticationMyAuthController;
use App\Http\Controllers\admin\autheitication\RegisteruserController as AutheiticationRegisteruserController;
use App\Http\Controllers\admin\autheitication\reset\MyAuthController as ResetMyAuthController;
use App\Http\Controllers\admin\autheitication\ResetUserController;
use App\Http\Controllers\admin\autheitication\UpdateUserController;
use App\Http\Controllers\admin\AuthRegisterController;
use App\Http\Controllers\admin\myauth\AuthRegisterController as MyauthAuthRegisterController;
use App\Http\Controllers\admin\myauth\RegisteruserController;
use App\Http\Controllers\admin\MyAuthController;
use App\Http\Controllers\admin\MyRegisterController;
use App\Http\Controllers\admin\RegisterController as AdminRegisterController;
use App\Http\Controllers\admin\TermController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Middleware\Check_Is_ADMIN;

Auth::routes();

// login
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//reset password
Route::get('/resetpassword', [ResetPasswordController::class, 'index'])->name('auth.resetpassword.index');
Route::post('/resetpassword', [ResetPasswordController::class, 'resetpassword'])->name('auth.resetpassword.resetpass');

// admin
Route::prefix('admin')->middleware('Check_Is_ADMIN')->group(function () {
    //auth
    Route::get('/register', [AutheiticationRegisterUserController::class, 'showRegistrationForm'])->middleware('Check_Is_ADMIN')->name('admin.auth.register');
    Route::get('/resetpassword', [UpdateUserController::class, 'index'])->middleware('Check_Is_ADMIN')->name('admin.auth.resetpassword.index');

    //admin
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');

    //admin - term
    Route::get('/term', [TermController::class, 'index'])->name('admin.term.index');

    Route::get('/create', [TermController::class, 'create'])->name('admin.term.create');
    Route::post('/store', [TermController::class, 'store'])->name('admin.term.store');

    Route::get('/edit/{term}', [TermController::class, 'edit'])->name('admin.term.edit');
    Route::post('/update/{term}', [TermController::class, 'update'])->name('admin.term.update');
});
