<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FrontEndController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/jobBoard', [FrontEndController::class, 'displayJobBoard']);
Route::get('/addJobPage', [FrontEndController::class, 'addJobPage']);
Route::get('/editJob/{id}', [FrontEndController::class, 'editJobPage']);