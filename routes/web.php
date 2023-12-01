<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\LeaserController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\MotorcycleController;
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

//Leasers
Route::get('/leasers', [LeaserController::class, 'fetchAll'])->name('leasers.display');
Route::get('/leaser/create', [LeaserController::class, 'create'])->name('leasers.create');
Route::get('/leaser/edit/{id}', [LeaserController::class, 'edit'])->name('leasers.edit');
Route::get('/leaser/delete/{id}', [LeaserController::class, 'destroy'])->name('leasers.destroy');
Route::post('/leaser/store', [LeaserController::class, 'store'])->name('leasers.store');
Route::post('/leaser/update', [LeaserController::class, 'update'])->name('leasers.update');

//Vehicles
Route::get('/vehicles', [VehicleController::class, 'fetchAll'])->name('vehicles.display');
Route::get('/vehicle/create', [VehicleController::class, 'create'])->name('vehicles.create');
Route::get('/vehicle/edit/{id}', [VehicleController::class, 'edit'])->name('vehicles.edit');
Route::get('/vehicle/delete/{id}', [VehicleController::class, 'destroy'])->name('vehicles.destroy');
Route::post('/vehicle/store', [VehicleController::class, 'store'])->name('vehicles.store');
Route::post('/vehicle/update', [VehicleController::class, 'update'])->name('vehicles.update');

//Cars
Route::get('/cars', [CarController::class, 'fetchAll'])->name('vehicles.cars.display');
Route::get('/car/create', [CarController::class, 'create'])->name('vehicles.cars.create');
Route::get('/car/edit/{id}', [CarController::class, 'edit'])->name('vehicles.cars.edit');
Route::get('/car/delete/{id}', [CarController::class, 'destroy'])->name('vehicles.cars.destroy');
Route::post('/car/store', [CarController::class, 'store'])->name('vehicles.cars.store');
Route::post('/car/update', [CarController::class, 'update'])->name('vehicles.cars.update');

//Motorcycle
Route::get('/motorcycles', [MotorcycleController::class, 'fetchAll'])->name('vehicles.motorcycles.display');
Route::get('/motorcycle/create', [MotorcycleController::class, 'create'])->name('vehicles.motorcycles.create');
Route::get('/motorcycle/edit/{id}', [MotorcycleController::class, 'edit'])->name('vehicles.motorcycles.edit');
Route::get('/motorcycle/delete/{id}', [MotorcycleController::class, 'destroy'])->name('vehicles.motorcycles.destroy');
Route::post('/motorcycle/store', [MotorcycleController::class, 'store'])->name('vehicles.motorcycles.store');
Route::post('/motorcycle/update', [MotorcycleController::class, 'update'])->name('vehicles.motorcycles.update');
