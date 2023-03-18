<?php

use Illuminate\Foundation\Auth\EmailVerificationRequest;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;

// Organization Admin Controllers
use App\Http\Controllers\Backend\OrgAdmin\DashboardController;
use App\Http\Controllers\Backend\OrgAdmin\CourseController;
use App\Http\Controllers\Backend\OrgAdmin\InstructorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');

// Contact us route
Route::get('/support/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/support/contact', [ContactController::class, 'store'])->name('contact.store');

// After email verified route
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return view('auth.email-verified');
})->middleware(['auth', 'signed', 'throttle: 6,1'])->name('verification.verify');


// Password reset route
Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
    ->middleware(['guest'])
    ->name('password.request');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
    ->middleware(['guest'])
    ->name('password.email');


// Organization Admin Routes
Route::middleware('auth')->group(function () {
    Route::get('/org_admin', [DashboardController::class, 'index'])->name('dashboard.org_admin.index');
    // Courses Routes
    Route::resource('/org_admin/courses', CourseController::class);

    // Org_Admin Routes
    Route::get('/org_admin/instructors/finduser', function () {
        return view('backend.org_admin.instructors.finduser');
    })->name('instructors.finduser');
    Route::post('/org_admin/instructors/finduser', [InstructorController::class, 'findUser'])->name('instructors.findUser');
    Route::get('/org_admin/instructors/inviteuser/{hashedId}', function() {
        return view('backend.org_admin.instructors.inviteuser');
    })->name('instructors.inviteUser');
    Route::resource('/org_admin/instructors', InstructorController::class);
});
