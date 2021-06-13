<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BbsController;

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

// Route::get('/','App\Http\Controllers\BbsController@index');
// Route::post('/bbs_add','App\Http\Controllers\BbsController@add');

Route::get('/', [BbsController::class, 'index']);

Route::post('add', [BbsController::class, 'add']);

Route::get('bbs_delete/{id}',[BbsController::class, 'delete']);