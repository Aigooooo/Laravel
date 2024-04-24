<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('getAllJobs',[JobController::class, 'getAllJobs']);
Route::post('addJob',[JobController::class, 'addJob']);
Route::get('getJob/{id}', [JobController::class, 'getJob']);
Route::put('editJob/{id}', [JobController::class, 'editJob']);
Route::delete('deleteJob/{id}', [JobController::class, 'deleteJob']);