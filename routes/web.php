<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RecruiterController;
use App\Http\Controllers\CandidateController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
*/

// Public Routes
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'Home')->name('home');
    Route::get('/about', 'About')->name('about');
    Route::get('/contact', 'Contact')->name('contact');
    Route::get('/jobs', 'Jobs')->name('jobs');
    Route::get('/companies', 'Companies')->name('companies');
    Route::get('/job-details/{jobId}', 'JobDetails')->name("job-details");
    
    // Auth Views (Guests Only)
    Route::middleware('guest')->group(function() {
        Route::get('/sign_in', 'SignInview')->name('sign_in');
        Route::get('/sign_up', 'SignUpview')->name('sign_up');
        Route::get('/forgot-password', 'ForgotPassword')->name('forgot_password'); 
    });
});

// Authentication Action Routes
Route::controller(AuthController::class)->group(function () {
    Route::post('/sign_in_store', 'login')->name('sign_in_store'); // Remapped to match existing form action often
    Route::post('/sign_up_store', 'register')->name('sign_up_store'); // Remapped
    Route::post('/logout', 'logout')->name('logout');
    Route::get('/logout', 'logout'); // Handle GET logout for legacy links
});

// Candidate Routes
Route::middleware('auth:candidate')->prefix('candidate')->group(function () {
    Route::controller(CandidateController::class)->group(function () {
        Route::get('/dashboard', 'profile')->name('candidateProfile'); // Redirect to profile/dashboard
        Route::post('/profile/update', 'updateProfile')->name('candidate.update');
        Route::post('/apply-job', 'applyJob')->name('applyJob'); 
        
        // Dashboard Pages
        Route::get('/applied-jobs', function() { return view('candidate.applied_jobs'); })->name('AppliedJob');
        Route::get('/cv-manager', function() { return view('candidate.cv_manager'); })->name('cvManager');
    });
});

// Recruiter Routes
Route::middleware('auth:employer')->prefix('employer')->group(function () {
    Route::controller(RecruiterController::class)->group(function () {
        Route::get('/dashboard', 'dashboard')->name('dashboard.recruiter'); // Redirect to dashboard
        
        // Job Management
        Route::get('/post-job', 'postJob')->name('post_job');
        Route::post('/post-job', 'storeJob')->name('jobs.store');
        
        // Other legacy routes mapped
        Route::get('/manage-jobs', 'dashboard')->name('manage-jobs'); // Mapping to dashboard for now
    });
});
