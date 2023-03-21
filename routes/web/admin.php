<?php

use App\Http\Controllers\Backend\Admin\AdminHomeController;
use App\Http\Controllers\Backend\Admin\InstitutionsController;
use App\Http\Controllers\Backend\Admin\ReportController;
use App\Http\Controllers\Backend\Admin\UserController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [AdminHomeController::class, 'index'])->name('dashboard.admin.index');

    // User routes
    Route::put('/users/{id}/enable', [UserController::class, 'enable'])->name('users.enable');
    Route::put('/users/{id}/disable', [UserController::class, 'disable'])->name('users.disable');
    Route::resource('/users', UserController::class);

    // Institution routes
    Route::resource('/institutions', InstitutionsController::class);

    // Report generation routes
    Route::resource('/reports', ReportController::class);
});
