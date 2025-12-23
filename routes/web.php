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
*/

// Public Routes
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'Home')->name('home');
    Route::get('/about', 'About')->name('about');
    Route::get('/contact', 'Contact')->name('contact');
    Route::get('/FindJobs', 'Jobs')->name('jobs');
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
    Route::post('/sign_in_store', 'login')->name('sign_in_store');
    Route::post('/sign_up_store', 'register')->name('sign_up_store');
    Route::post('/logout', 'logout')->name('logout');
    Route::get('/logout', 'logout');
    Route::post('/forgot-password-send', 'forgotPasswordMail')->name('forget_passMail');
});

// ============================================
// CANDIDATE ROUTES
// ============================================
Route::middleware('auth:candidate')->prefix('candidate')->name('candidate.')->group(function () {
    Route::controller(CandidateController::class)->group(function () {
        // Dashboard
        Route::get('/dashboard', 'dashboard')->name('dashboard');
        
        // Profile
        Route::get('/profile', 'profile')->name('profile');
        Route::post('/profile/update', 'updateProfile')->name('profile.update');
        
        // Jobs
        Route::post('/apply-job', 'applyJob')->name('applyJob');
        Route::get('/applied-jobs', 'appliedJobs')->name('applied_jobs');
        Route::delete('/application/{applicationId}/withdraw', 'withdrawApplication')->name('application.withdraw');
        Route::get('/saved-jobs', 'savedJobs')->name('saved_jobs');
        
        // Settings
        Route::get('/change-password', function() {
            return view('candidate.change_password', ['candidate' => auth('candidate')->user()]);
        })->name('change_password');
        Route::post('/change-password', 'changePassword')->name('change_password.update');
    });
});

// Legacy route for backward compatibility
Route::middleware('auth:candidate')->group(function() {
    Route::get('/candidateProfile', [CandidateController::class, 'dashboard'])->name('candidateProfile');
    Route::post('/applyJob', [CandidateController::class, 'applyJob'])->name('applyJob');
    Route::get('/AppliedJob', [CandidateController::class, 'appliedJobs'])->name('AppliedJob');
});

// ============================================
// RECRUITER/EMPLOYER ROUTES
// ============================================
Route::middleware('auth:employer')->prefix('employer')->name('recruiter.')->group(function () {
    Route::controller(RecruiterController::class)->group(function () {
        // Dashboard
        Route::get('/dashboard', 'dashboard')->name('dashboard');
        
        // Company Profile
        Route::get('/profile', 'editProfile')->name('profile');
        Route::post('/profile', 'updateProfile')->name('profile.update');
        
        // Job Management
        Route::get('/jobs', 'manageJobs')->name('jobs');
        Route::get('/post-job', 'postJob')->name('post_job');
        Route::post('/post-job', 'storeJob')->name('jobs.store');
        Route::get('/job/{jobId}/edit', 'editJob')->name('job.edit');
        Route::put('/job/{jobId}', 'updateJob')->name('job.update');
        Route::delete('/job/{jobId}', 'deleteJob')->name('job.delete');
        Route::post('/job/{jobId}/toggle-status', 'toggleJobStatus')->name('job.toggle');
        
        // Applications
        Route::get('/applications', 'allApplications')->name('applications');
        Route::get('/job/{jobId}/applications', 'viewApplications')->name('job.applications');
        Route::post('/application/{applicationId}/status', 'updateApplicationStatus')->name('application.status');
        
        // Candidates/Resumes
        Route::get('/candidates', 'browseResumes')->name('candidates');
        Route::get('/candidate/{candidateId}', 'viewCandidate')->name('candidate.view');
        
        // Settings
        Route::get('/change-password', 'changePasswordForm')->name('change_password');
        Route::post('/change-password', 'changePassword')->name('change_password.update');
    });
});

// Legacy route for backward compatibility
Route::middleware('auth:employer')->group(function() {
    Route::get('/dashboard', [RecruiterController::class, 'dashboard'])->name('dashboard.recruiter');
});
