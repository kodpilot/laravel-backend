<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\mobileAPIController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// index
Route::get('/', [mobileAPIController::class, 'index'])->middleware('control:general');

// authenticating with api key
Route::post('/register', [mobileAPIController::class, 'register'])->middleware('control:general');
Route::post('/login', [mobileAPIController::class, 'login'])->middleware('control:general');
Route::post('/send-code', [mobileAPIController::class, 'verifyPhone'])->middleware('control:general');
Route::post('/logout', [mobileAPIController::class, 'logout'])->middleware('control:key');



// Route::get('/certificates-page', [mobileAPIController::class, 'certificatesPage'])->middleware('control:key');
// Route::post('/certificates-page/add-certificate', [mobileAPIController::class, 'addCertificate'])->middleware('control:key');
// Route::post('/certificates-page/delete-certificate-{certificate_id?}', [mobileAPIController::class, 'deleteCertificate'])->middleware('control:key');
// Route::post('/certificates-page/update-certificate-{certificate_id?}', [mobileAPIController::class, 'editCertificate'])->middleware('control:key');


Route::get('/cv-page', [mobileAPIController::class, 'cvPage'])->middleware('control:key');
Route::get('/cv-page/cv-{cv_id?}', [mobileAPIController::class, 'cvDetailPage'])->middleware('control:key');
Route::post('/cv-page/cv-add', [mobileAPIController::class, 'cvAdd'])->middleware('control:key');
Route::post('/cv-page/cv-update-{cv_id?}', [mobileAPIController::class, 'cvEdit'])->middleware('control:key');
Route::post('/cv-page/cv-delete-{cv_id?}', [mobileAPIController::class, 'cvDelete'])->middleware('control:key');


Route::post('update-details/personal-informations', [mobileAPIController::class, 'updatePersonalInformation'])->middleware('control:key');
Route::post('update-details/contact-informations', [mobileAPIController::class, 'updateContactInformation'])->middleware('control:key');
Route::post('update-details/social-media-informations', [mobileAPIController::class, 'updateSocialInformation'])->middleware('control:key');
Route::post('add-details/skills-informations', [mobileAPIController::class, 'addSkillInformation'])->middleware('control:key');
Route::post('update-details/skills-informations', [mobileAPIController::class, 'updateSkillInformation'])->middleware('control:key');
Route::post('add-details/employment-history-informations', [mobileAPIController::class, 'addEmploymentInformation'])->middleware('control:key');
Route::post('update-details/employment-history-informations', [mobileAPIController::class, 'updateEmploymentInformation'])->middleware('control:key');
Route::post('add-details/education-history-informations', [mobileAPIController::class, 'addEducationInformation'])->middleware('control:key');
Route::post('update-details/education-history-informations', [mobileAPIController::class, 'updateEducationInformation'])->middleware('control:key');
Route::post('add-details/training-informations', [mobileAPIController::class, 'addTrainingInformation'])->middleware('control:key');
Route::post('update-details/training-informations', [mobileAPIController::class, 'updateTrainingInformation'])->middleware('control:key');
Route::post('add-details/reference-informations', [mobileAPIController::class, 'addReferenceInformation'])->middleware('control:key');
Route::post('update-details/reference-informations', [mobileAPIController::class, 'updateReferenceInformation'])->middleware('control:key');
Route::post('add-details/interest-informations', [mobileAPIController::class, 'addInterestInformation'])->middleware('control:key');
Route::post('update-details/interest-informations', [mobileAPIController::class, 'updateInterestInformation'])->middleware('control:key');
Route::post('add-details/language-informations', [mobileAPIController::class, 'addLanguageInformation'])->middleware('control:key');
Route::post('update-details/language-informations', [mobileAPIController::class, 'updateLanguageInformation'])->middleware('control:key');



// Route::get('/cv-page/cv-{cv_id?}', [mobileAPIController::class, 'cvDetails'])->middleware('control:key');
// Route::post('/cv-page/cv-{cv_id?}/add-detail', [mobileAPIController::class, 'cvDetailsAdd'])->middleware('control:key');


Route::get('/profile-page/profile-{profile_id?}/comments', [mobileAPIController::class, 'getProfileComments'])->middleware('control:key');
Route::post('/profile-page/profile-{profile_id?}/add-comment', [mobileAPIController::class, 'addProfileComment'])->middleware('control:key');



Route::post('/test-key', [mobileAPIController::class, 'test'])->middleware('control:key');
