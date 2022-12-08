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




// Route::get('/certificates-page', [mobileAPIController::class, 'certificatesPage'])->middleware('control:key');
// Route::post('/certificates-page/add-certificate', [mobileAPIController::class, 'addCertificate'])->middleware('control:key');
// Route::post('/certificates-page/delete-certificate-{certificate_id?}', [mobileAPIController::class, 'deleteCertificate'])->middleware('control:key');
// Route::post('/certificates-page/update-certificate-{certificate_id?}', [mobileAPIController::class, 'editCertificate'])->middleware('control:key');


// Route group for middleware control:general
Route::group(['middleware' => ['control:general']], function () {
    // index
    Route::get('/', [mobileAPIController::class, 'index']);
    // authenticating with api key
    Route::post('/register', [mobileAPIController::class, 'register']);
    Route::post('/login', [mobileAPIController::class, 'login']);
    Route::post('/send-code', [mobileAPIController::class, 'verifyPhone']);
    Route::post('/verify-code', [mobileAPIController::class, 'verifyCode']);
    Route::post('/reset-password', [mobileAPIController::class, 'forgotPassword']);
});



// Route group for middleware control:key
Route::group(['middleware' => 'control:key'], function () {

    Route::post('/logout', [mobileAPIController::class, 'logout'])->middleware('control:key');
    Route::post('/create-nft-card', [mobileAPIController::class, 'createNftCard'])->middleware('control:key');
    Route::post('/get-nft-card', [mobileAPIController::class, 'getNftCard'])->middleware('control:key');
    Route::post('/update-nft-card', [mobileAPIController::class, 'updateNftCard'])->middleware('control:key');

    Route::get('/cv-page', [mobileAPIController::class, 'cvPage']);
    Route::get('/cv-page/cv-{cv_id?}', [mobileAPIController::class, 'cvDetailPage']);
    Route::post('/cv-page/cv-add', [mobileAPIController::class, 'cvAdd']);
    Route::post('/cv-page/cv-update-{cv_id?}', [mobileAPIController::class, 'cvEdit']);
    Route::post('/cv-page/cv-delete-{cv_id?}', [mobileAPIController::class, 'cvDelete']);
    
    

    Route::post('update-details/personal-informations', [mobileAPIController::class, 'updatePersonalInformation']);

    Route::post('update-details/contact-informations', [mobileAPIController::class, 'updateContactInformation']);

    Route::post('update-details/social-media-informations', [mobileAPIController::class, 'updateSocialInformation']);

    Route::post('add-details/skills-informations', [mobileAPIController::class, 'addSkillInformation']);
    Route::post('update-details/skills-informations', [mobileAPIController::class, 'updateSkillInformation']);

    Route::post('add-details/employment-history-informations', [mobileAPIController::class, 'addEmploymentInformation']);
    Route::post('update-details/employment-history-informations', [mobileAPIController::class, 'updateEmploymentInformation']);

    Route::post('add-details/education-history-informations', [mobileAPIController::class, 'addEducationInformation']);
    Route::post('update-details/education-history-informations', [mobileAPIController::class, 'updateEducationInformation']);

    Route::post('add-details/training-informations', [mobileAPIController::class, 'addTrainingInformation']);
    Route::post('update-details/training-informations', [mobileAPIController::class, 'updateTrainingInformation']);

    Route::post('add-details/reference-informations', [mobileAPIController::class, 'addReferenceInformation']);
    Route::post('update-details/reference-informations', [mobileAPIController::class, 'updateReferenceInformation']);

    Route::post('add-details/interest-informations', [mobileAPIController::class, 'addInterestInformation']);
    Route::post('update-details/interest-informations', [mobileAPIController::class, 'updateInterestInformation']);

    Route::post('add-details/language-informations', [mobileAPIController::class, 'addLanguageInformation']);
    Route::post('update-details/language-informations', [mobileAPIController::class, 'updateLanguageInformation']);

    Route::get('connections', [mobileAPIController::class, 'Connections']);
    Route::post('connect', [mobileAPIController::class, 'Connect']);
    Route::post('add-app-connection', [mobileAPIController::class, 'addAppConnection']);
    
});

Route::group(['middleware' => 'control:app','prefix'=>'app'], function (){
    Route::get('/', [mobileAPIController::class, 'appPage']);
});

// Route::get('/cv-page/cv-{cv_id?}', [mobileAPIController::class, 'cvDetails'])->middleware('control:key');
// Route::post('/cv-page/cv-{cv_id?}/add-detail', [mobileAPIController::class, 'cvDetailsAdd'])->middleware('control:key');


Route::get('/profile-page/profile-{profile_id?}/comments', [mobileAPIController::class, 'getProfileComments'])->middleware('control:key');
Route::post('/profile-page/profile-{profile_id?}/add-comment', [mobileAPIController::class, 'addProfileComment'])->middleware('control:key');



Route::post('/test-key', [mobileAPIController::class, 'test'])->middleware('control:key');
