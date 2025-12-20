<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\MentorController;
use App\Http\Controllers\EmployerController;

// Home page
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Authentication routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected routes
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Job routes
    Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
    Route::get('/jobs/{id}', [JobController::class, 'show'])->name('jobs.show');
    Route::post('/jobs/{id}/save', [JobController::class, 'saveJob'])->name('jobs.save');
    Route::post('/jobs/{id}/apply', [JobController::class, 'applyJob'])->name('jobs.apply');

    // Skills routes
    Route::get('/skills', [StudentController::class, 'skills'])->name('skills.index');
    Route::post('/skills/assessment', [StudentController::class, 'takeAssessment'])->name('skills.assessment');

    // Mentor routes
    Route::get('/mentors', [MentorController::class, 'index'])->name('mentors.index');
    Route::get('/mentors/{id}', [MentorController::class, 'show'])->name('mentors.show');
    Route::post('/mentors/{id}/connect', [MentorController::class, 'connect'])->name('mentors.connect');

    // Student routes
    Route::prefix('student')->middleware('role:student')->group(function () {
        Route::get('/dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');
        Route::get('/profile', [StudentController::class, 'profile'])->name('student.profile');
        Route::post('/profile', [StudentController::class, 'updateProfile'])->name('student.profile.update');
        Route::get('/applications', [StudentController::class, 'applications'])->name('student.applications');
        Route::get('/saved-jobs', [StudentController::class, 'savedJobs'])->name('student.saved-jobs');
    });

    // Mentor routes
    Route::prefix('mentor')->middleware('role:mentor')->group(function () {
        Route::get('/dashboard', [MentorController::class, 'dashboard'])->name('mentor.dashboard');
        Route::get('/profile', [MentorController::class, 'profile'])->name('mentor.profile');
        Route::post('/profile', [MentorController::class, 'updateProfile'])->name('mentor.profile.update');
        Route::get('/mentorships', [MentorController::class, 'mentorships'])->name('mentor.mentorships');
    });

    // Employer routes
    Route::prefix('employer')->middleware('role:employer')->group(function () {
        Route::get('/dashboard', [EmployerController::class, 'dashboard'])->name('employer.dashboard');
        Route::get('/profile', [EmployerController::class, 'profile'])->name('employer.profile');
        Route::post('/profile', [EmployerController::class, 'updateProfile'])->name('employer.profile.update');
        Route::get('/jobs', [EmployerController::class, 'jobs'])->name('employer.jobs');
        Route::get('/jobs/create', [EmployerController::class, 'createJob'])->name('employer.jobs.create');
        Route::post('/jobs', [EmployerController::class, 'storeJob'])->name('employer.jobs.store');
        Route::get('/jobs/{id}/edit', [EmployerController::class, 'editJob'])->name('employer.jobs.edit');
        Route::put('/jobs/{id}', [EmployerController::class, 'updateJob'])->name('employer.jobs.update');
        Route::delete('/jobs/{id}', [EmployerController::class, 'deleteJob'])->name('employer.jobs.delete');
        Route::get('/candidates', [EmployerController::class, 'candidates'])->name('employer.candidates');
    });

    // Admin routes
    Route::prefix('admin')->middleware('role:admin')->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');
        Route::get('/users', function () {
            return view('admin.users');
        })->name('admin.users');
        Route::get('/jobs', function () {
            return view('admin.jobs');
        })->name('admin.jobs');
    });
});

// API routes
Route::prefix('api')->group(function () {
    Route::get('/jobs/search', [JobController::class, 'search']);
    Route::get('/skills/assessment/{id}', [StudentController::class, 'getAssessment']);
    Route::post('/skills/assessment/{id}/submit', [StudentController::class, 'submitAssessment']);
});

// Profile route
Route::get('/profile', function () {
    return view('profile');
})->name('profile')->middleware('auth');