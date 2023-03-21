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

// Guest accessible routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/courses', [CourseController::class, 'index'])->name('public.courses.index');
Route::get('/about-us', function () {
    return view('pages.about-us');
})->name('about-us');

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
    Route::get('/instructor', [InstructorHomeController::class, 'index'])->name('dashboard.instructor.index');
    Route::get('/org_admin', [OrgAdminHomeController::class, 'index'])->name('dashboard.org_admin.index');

    // Instructor Routes
    Route::resource('/instructor/courses', InstructorCourseController::class)->names([
        'index' => 'instructor.courses.index',
    ]);
    // End of Instructor Routes

    // Org_Admin Routes
    Route::get('/org_admin/instructors/finduser', function () {
        return view('backend.org_admin.instructors.finduser');
    })->name('instructors.finduser');
    Route::post('/org_admin/instructors/finduser', [InstructorController::class, 'findUser'])->name('instructors.findUser');
    Route::get('/org_admin/instructors/inviteuser/{hashedId}', function() {
        return view('backend.org_admin.instructors.inviteuser');
    })->name('instructors.inviteUser');
    Route::resource('/org_admin/instructors', InstructorController::class);
    Route::resource('/org_admin/courses', OrgAdminCourseController::class)->names([
        'index' => 'org_admin.courses.index',
    ]);
    // End of Org_Admin Routes
});
