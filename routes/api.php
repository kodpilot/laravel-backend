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


Route::get('/certificates-page', [mobileAPIController::class, 'certificatesPage'])->middleware('control:key');
Route::post('/certificates-page/add-certificate', [mobileAPIController::class, 'addCertificate'])->middleware('control:key');


Route::get('/cv-page', [mobileAPIController::class, 'cvPage'])->middleware('control:key');
Route::get('/cv-page/cv-{cv_id?}', [mobileAPIController::class, 'cvDetails'])->middleware('control:key');


Route::post('/cv-page/cv-add', [mobileAPIController::class, 'cvAdd'])->middleware('control:key');
Route::post('/cv-page/cv-{cv_id?}/add-detail', [mobileAPIController::class, 'cvDetailsAdd'])->middleware('control:key');


Route::post('/profile-page/profile-{profile_id?}/add-comment', [mobileAPIController::class, 'addProfileComment'])->middleware('control:key');

Route::get('/profile-page/profile-{profile_id?}/comments', [mobileAPIController::class, 'getProfileComments'])->middleware('control:key');


Route::post('/test-key', [mobileAPIController::class, 'test'])->middleware('control:key');


