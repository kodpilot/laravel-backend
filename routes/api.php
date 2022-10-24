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
