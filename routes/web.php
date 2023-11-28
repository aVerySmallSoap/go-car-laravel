<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\LeaserController;
use App\Http\Controllers\UserController;
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

Route::get('/users', [UserController::class, 'fetchAll']);
Route::get('/user/{id}', [UserController::class, 'show']);
Route::get('/agents', [AgentController::class, 'fetchAll']);
Route::get('/agent/{id}', [AgentController::class, 'show']);

// Create
Route::get('/leaser/create', [LeaserController::class, 'create'])->name('leaser.create');
Route::get('/leaser/delete/{id}', [LeaserController::class, 'destroy']);
Route::post('/leaser/store', [LeaserController::class, 'store'])->name('leaser.store');

//View

Route::get('/leasers', [LeaserController::class, 'fetchAll'])->name('leasers');
Route::get('/leaser/{id}', [LeaserController::class, 'show']);
