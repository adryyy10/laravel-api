<?php

use App\Http\Controllers\User\GetCollectionController;
use App\Http\Controllers\User\GetController;
use App\Http\Controllers\Resource\GetCollectionController as ResourceGetCollectionController;
use App\Http\Controllers\Resource\GetController as ResourceGetController;
use App\Http\Controllers\User\DeleteController;
use App\Http\Controllers\User\PostController;
use App\Http\Controllers\User\PutController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

/** Get data */
Route::get('/users', [GetCollectionController::class, 'getCollection']);
Route::get('/users/{id}', [GetController::class, 'get']);
Route::get('/unknown', [ResourceGetCollectionController::class, 'getCollection']);
Route::get('/unknown/{id}', [ResourceGetController::class, 'get']);

/** Create data */
Route::post('/users', [PostController::class, 'create']);

/** Update data */
Route::put('/users/{id}', [PutController::class, 'update']);

/** Delete data */
Route::delete('/users/{id}', [DeleteController::class, 'delete']);

Route::get('/token', function () {
    return csrf_token(); 
});