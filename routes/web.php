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

Route::get('/',[HomeController::class,'Home']);
Route::get('/job-details/{jobId}',[HomeController::class,'JobDetails'])->name("job-details");
Route::post('/applyJob',[HomeController::class,'ApplyJob'])->name('applyJob');


// -------------------------------------SIGN IN AND SIGN UP -------------------------------------------------

Route::get('/sign_in',[HomeController::class,'SignInview'])->name('sign_in');

Route::get('/sign_up',[HomeController::class,'SignUpview'])->name('sign_up');

Route::post('/sign_up_store',[HomeController::class,'SignUpStore'])->name('sign_up_store');

Route::post('/sign_in_store',[HomeController::class,'SignInStore'])->name('sign_in_store');

// --------------------------------------- END SIGN IN AND SIGN UP -----------------------------------------------------------------

// ---------------------------------------FORGOT PASSWORD VERIFICATION CODE --------------------------------------------------------

Route::get('/forgot_password',[HomeController::class,'ForgotPassword']);

Route::get('/code_verification',[HomeController::class,'CodeVerification']);

Route::get('/new-pass',[HomeController::class,'NewPass']);

Route::get('/successfull-change-pass',[HomeController::class,'SuccessfullChangePass']);

// --------------------------------------- END FORGOT PASSWORD VERIFICATION CODE ---------------------------------------------------

// --------------------------------------- UPDATE COMPANY PROFILE  ---------------------------------------------------

Route::get('/employer',[RecruterController::class,'EditEmployerIndex'])->name('profile');

Route::post('/updateEmployer',[RecruterController::class,'UpdateCompanyProfile'])->name('updateEmployer');


Route::get('/employer/post-job',[RecruterController::class,'PostJob'])->name('post-job');

Route::post('/employer/post-job_store',[RecruterController::class,'PostJobRequest'])->name('PostJobRequest');
// --------------------------------------- END UPDATE COMPANY PROFILE  ---------------------------------------------------

// --------------------------------------- POST JOB ---------------------------------------------------

Route::get('/employer/manage-jobs',[RecruterController::class,'ManageJobs'])->name('manage-jobs');

Route::get('/employer/resume',[RecruterController::class,'resumeDisplayed'])->name('resume');
//----------------------------------------- LOG OUT ---------------------------------------------------

Route::get('/employer/logOut',[RecruterController::class,'logOut'])->name('logOut');


Route::get('/employer/change-password',[RecruterController::class,'ChangePasswordShow'])->name('change-password');

Route::post('/employer/change-password_store',[RecruterController::class,'ChangePasswordRequest'])->name('ChangePasswordRequest');

// --------------------------------------- END POST JOB ---------------------------------------------------


Route::get('/candidate',[CandidateController::class,'candidateProfile'])->name('candidateProfile');
Route::post('/updateCandidate',[CandidateController::class,'UpdatecandidateProfile'])->name('UpdatecandidateProfile');


Route::get('candidate/AppliedJob',[CandidateController::class,'AppliedJob'])->name('AppliedJob');

Route::get('candidate/jobAlert',[CandidateController::class,'jobAlert'])->name('jobAlert');

Route::get('candidate/cvManager',[CandidateController::class,'cvManager'])->name('cvManager');

Route::get('candidate/change-passwordC',[CandidateController::class,'changePasswordC'])->name('change-passwordC');

Route::post('candidate/change-password_store',[CandidateController::class,'ChangePasswordCRequest'])->name('ChangePasswordRequestC');


Route::get('/logOutC',[CandidateController::class,'logOutC'])->name('logOutC');

