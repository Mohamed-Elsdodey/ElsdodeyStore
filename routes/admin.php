<?php

use App\Http\Controllers\Admin\{AuthController,
    HomeController,

};
use Illuminate\Support\Facades\Route;


Route::get('login', [AuthController::class, 'loginView'])->name('admin.login');
Route::post('login', [AuthController::class, 'postLogin'])->name('admin.postLogin');

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('/', [HomeController::class,'index'])->name('admin.index');
    Route::get('logout', [AuthController::class, 'logout'])->name('admin.logout');

    ### admins

    Route::resource('admins', \App\Http\Controllers\Admin\AdminController::class);
    Route::get('activateAdmin',[App\Http\Controllers\Admin\AdminController::class,'activate'])->name('admin.active.admin');


    ### languages

    Route::resource('languages', \App\Http\Controllers\Admin\LanguageController::class);//language
    Route::get('activateLanguage', [App\Http\Controllers\Admin\LanguageController::class, 'activate'])->name('admin.active.language');





});
