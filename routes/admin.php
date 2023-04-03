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


    ### settings
    Route::resource('settings', \App\Http\Controllers\Admin\SettingController::class);//setting


    ### branches
    Route::resource('branches', \App\Http\Controllers\Admin\BranchController::class);//setting

    ### employee
    Route::resource('employees', \App\Http\Controllers\Admin\EmployeeController::class);//setting

    ### roles
    Route::resource('roles', \App\Http\Controllers\Admin\EmployeeController::class);//setting



});
