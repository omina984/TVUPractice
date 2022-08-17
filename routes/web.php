<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\TermController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\ResetPasswordController;

Auth::routes();

//reset password
Route::get('/resetpassword', [ResetPasswordController::class, 'index'])->name('auth.resetpassword.index');
Route::post('/resetpassword', [ResetPasswordController::class, 'resetpassword'])->name('auth.resetpassword.resetpass');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//admin
Route::prefix('admin')->middleware('Check_Is_ADMIN')->group(function () {
    //admin
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');

    //admin - term
    Route::get('/term', [TermController::class, 'index'])->name('admin.term.index');

    Route::get('/create', [TermController::class, 'create'])->name('admin.term.create');
    Route::post('/store', [TermController::class, 'store'])->name('admin.term.store');

    Route::get('/edit/{term}', [TermController::class, 'edit'])->name('admin.term.edit');
    Route::post('/update/{term}', [TermController::class, 'update'])->name('admin.term.update');

    // Route::get('categories/destroy/{category}', 'CategoryController@destroy')->name('destroy');
});
