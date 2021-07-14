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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



/*
 * ********************
 *  PARTICULAR MODEL
 * ******************
*/
Route::post('get/service', [App\Http\Controllers\ParticularController::class, 'service']);
Route::post('get/customer', [App\Http\Controllers\ParticularController::class, 'customer']);
Route::post('new/comments', [App\Http\Controllers\ParticularController::class, 'newComment']);
Route::post('delete/comment/{id}', [App\Http\Controllers\ParticularController::class, 'deleteComment']);
Route::post('new/file', [App\Http\Controllers\ParticularController::class, 'newFile']);
Route::post('delete/file/{id}', [App\Http\Controllers\ParticularController::class, 'deleteFile']);