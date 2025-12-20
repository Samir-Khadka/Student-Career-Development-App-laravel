<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Home page
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Authentication routes
Route::get('/login', [App\Http\Controllers\AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);
Route::get('/register', [App\Http\Controllers\AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [App\Http\Controllers\AuthController::class, 'register']);
Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
Route::get('password/reset', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [App\Http\Controllers\Auth\ResetPasswordController::class, 'reset'])->name('password.update');

// Protected routes
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Employer Routes
    Route::middleware('role:EMPLOYER')->prefix('employer')->name('employer.')->group(function () {
        Route::get('/jobs/create', [App\Http\Controllers\EmployerController::class, 'createJob'])->name('jobs.create');
        Route::post('/jobs', [App\Http\Controllers\EmployerController::class, 'storeJob'])->name('jobs.store');
    });

    // Job routes
    Route::get('/jobs', [App\Http\Controllers\JobController::class, 'index'])->name('jobs.index');
    Route::get('/jobs/{id}', [App\Http\Controllers\JobController::class, 'show'])->name('jobs.show');
    Route::post('/jobs/{id}/save', [App\Http\Controllers\JobController::class, 'saveJob'])->name('jobs.save');
    Route::post('/jobs/{id}/apply', [App\Http\Controllers\JobController::class, 'applyJob'])->name('jobs.apply');

    // Mentor routes
    Route::get('/mentors', [App\Http\Controllers\MentorController::class, 'index'])->name('mentors.index');

    // API routes
    Route::prefix('api')->group(function () {
        Route::get('/jobs/search', [App\Http\Controllers\JobController::class, 'search']);
    });
});

// Profile route
// Profile route
Route::middleware('auth')->group(function () {
    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'show'])->name('profile');
    Route::get('/profile/edit', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});