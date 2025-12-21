<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RecruterController;
use App\Http\Controllers\CandidateController;



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

// Public & Auth Routes - HomeController
Route::controller(HomeController::class)->group(function () {
    Route::get('/', 'Home')->name('home'); // Added name 'home' for consistency
    Route::get('/job-details/{jobId}', 'JobDetails')->name("job-details");
    Route::post('/applyJob', 'ApplyJob')->name('applyJob');

    // Authentication
    Route::get('/sign_in', 'SignInview')->name('sign_in');
    Route::get('/sign_up', 'SignUpview')->name('sign_up');
    Route::post('/sign_up_store', 'SignUpStore')->name('sign_up_store');
    Route::post('/sign_in_store', 'SignInStore')->name('sign_in_store');

    // Password Reset
    Route::get('/forgot_password', 'ForgotPassword');
    Route::get('/code_verification', 'CodeVerification');
    Route::get('/new-pass', 'NewPass');
    Route::get('/successfull-change-pass', 'SuccessfullChangePass');
});

// Recruiter Routes - RecruterController
Route::controller(RecruterController::class)->group(function () {
    // Profile
    Route::get('/employer', 'EditEmployerIndex')->name('profile');
    Route::post('/updateEmployer', 'UpdateCompanyProfile')->name('updateEmployer');

    // Employer Dashboard Actions
    Route::prefix('employer')->group(function () {
        Route::get('/post-job', 'PostJob')->name('post-job');
        Route::post('/post-job_store', 'PostJobRequest')->name('PostJobRequest');
        Route::get('/manage-jobs', 'ManageJobs')->name('manage-jobs');
        Route::get('/resume', 'resumeDisplayed')->name('resume');
        
        // Settings & Auth
        Route::get('/logOut', 'logOut')->name('logOut');
        Route::get('/change-password', 'ChangePasswordShow')->name('change-password');
        Route::post('/change-password_store', 'ChangePasswordRequest')->name('ChangePasswordRequest');
    });
});

// Candidate Routes - CandidateController
Route::controller(CandidateController::class)->group(function () {
    Route::get('/candidate', 'candidateProfile')->name('candidateProfile');
    Route::post('/updateCandidate', 'UpdatecandidateProfile')->name('UpdatecandidateProfile');
    Route::get('/logOutC', 'logOutC')->name('logOutC');

    Route::prefix('candidate')->group(function () {
        Route::get('/AppliedJob', 'AppliedJob')->name('AppliedJob');
        Route::get('/jobAlert', 'jobAlert')->name('jobAlert');
        Route::get('/cvManager', 'cvManager')->name('cvManager');
        Route::get('/change-passwordC', 'changePasswordC')->name('change-passwordC');
        Route::post('/change-password_store', 'ChangePasswordCRequest')->name('ChangePasswordRequestC');
    });
});

