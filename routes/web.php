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
Route::get('/leasers', [LeaserController::class, 'fetchAll'])->name('leaser.display');
Route::get('/leaser/{id}', [LeaserController::class, 'show']);
Route::get('/leaser/create', [LeaserController::class, 'create'])->name('leaser.create');
Route::get('/leaser/edit/{id}', [LeaserController::class, 'edit'])->name('leaser.edit');
Route::get('/leaser/delete/{id}', [LeaserController::class, 'destroy'])->name('leaser.destroy');
Route::post('/leaser/store', [LeaserController::class, 'store'])->name('leaser.store');
Route::post('/leaser/update', [LeaserController::class, 'update'])->name('leaser.update');

//Vehicles
Route::get('/vehicles', [VehicleController::class, 'fetchAll'])->name('vehicle.display');
Route::get('/vehicle/{id}', [VehicleController::class, 'show']);
Route::get('/vehicle/create', [VehicleController::class, 'create'])->name('vehicle.create');
Route::get('/vehicle/edit/{id}', [VehicleController::class, 'edit'])->name('vehicle.edit');
Route::get('/vehicle/delete/{id}', [VehicleController::class, 'destroy'])->name('vehicle.destroy');
Route::post('/vehicle/store', [VehicleController::class, 'store'])->name('vehicle.store');
Route::post('/vehicle/update', [VehicleController::class, 'update'])->name('vehicle.update');

//Cars
Route::get('/cars', [CarController::class, 'fetchAll'])->name('vehicles.cars.display');
//Route::get('/car/{id}', [CarController::class, 'show']);
Route::get('/car/create', [CarController::class, 'create'])->name('vehicles.cars.create');
Route::get('/car/edit/{id}', [CarController::class, 'edit'])->name('vehicles.cars.edit');
Route::get('/car/delete/{id}', [CarController::class, 'destroy'])->name('vehicles.cars.destroy');
Route::post('/car/store', [CarController::class, 'store'])->name('vehicles.cars.store');
Route::post('/car/update', [CarController::class, 'update'])->name('vehicles.cars.update');

//Motorcycle
Route::get('/motorcycles', [MotorcycleController::class, 'fetchAll'])->name('motorcycle.display');
Route::get('/motorcycle/{id}', [MotorcycleController::class, 'show']);
Route::get('/motorcycle/create', [MotorcycleController::class, 'create'])->name('motorcycle.create');
Route::get('/motorcycle/edit/{id}', [MotorcycleController::class, 'edit'])->name('motorcycle.edit');
Route::get('/motorcycle/delete/{id}', [MotorcycleController::class, 'destroy'])->name('motorcycle.destroy');
Route::post('/motorcycle/store', [MotorcycleController::class, 'store'])->name('motorcycle.store');
Route::post('/motorcycle/update', [MotorcycleController::class, 'update'])->name('motorcycle.update');
