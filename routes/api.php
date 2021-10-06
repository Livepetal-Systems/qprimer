<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/getSubscribtion/{user}', [\App\Http\Controllers\ApiController::class, 'getProgram'])->name('getProgram');
Route::get('/getQuestions/{program}/', [\App\Http\Controllers\ApiController::class, 'getQuestion'])->name('getQuestion');
Route::get('/generateHsitory/{user}', [\App\Http\Controllers\ApiController::class, 'generateHsitory'])->name('generateHsitory');

Route::post('/apiloginUser', [\App\Http\Controllers\Mobile::class, 'apiloginUser'])->name('apiloginUser');
Route::post('/submitExam',  [\App\Http\Controllers\ApiController::class, 'answerProcessor'])->name('submitExam');



Route::middleware('auth:api')->get('/user', function(Request $request) {
    return $request->user();
});











Route::get('/getProgram/{user}', [\App\Http\Controllers\ApiController::class, 'getProgram'])->name('getProgram');
Route::get('/getExam/{program}/', [\App\Http\Controllers\ApiController::class, 'getQuestion'])->name('getQuestion');
Route::get('/generateHsitory/{user}', [\App\Http\Controllers\ApiController::class, 'generateHsitory'])->name('generateHsitory');

Route::post('/apiloginUser', [\App\Http\Controllers\Mobile::class, 'apiloginUser'])->name('apiloginUser');
Route::post('/submitExam',  [\App\Http\Controllers\ApiController::class, 'answerProcessor'])->name('submitExam');



Route::middleware('auth:api')->get('/user', function(Request $request) {
    return $request->user();
});

