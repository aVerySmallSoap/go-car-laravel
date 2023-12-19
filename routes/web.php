<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DispatchController;
use App\Http\Controllers\LeaserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReceiptController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\MotorcycleController;
use App\Http\Middleware\VerifyIfAdmin;
use App\Http\Middleware\VerifyRole;
use App\Models\Released;
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
    return view('home');
})->middleware('auth');

Route::middleware(['auth', VerifyRole::class])->group(function(){
    //Customers
    Route::get('/customers', [CustomerController::class, 'fetchAll'])->name('customers.display');
    Route::get('/customer/create', [CustomerController::class, 'create'])->name('customers.create');
    Route::get('/customer/edit/{id}', [CustomerController::class, 'edit'])->name('customers.edit');
    Route::get('/customer/delete/{id}', [CustomerController::class, 'destroy'])->name('customers.destroy');
    Route::get('/customer/fetch/{id}', [CustomerController::class, 'fetch'])->name('customers.fetch');
    Route::post('/customer/store', [CustomerController::class, 'store'])->name('customers.store');
    Route::post('/customer/update', [CustomerController::class, 'update'])->name('customers.update');

    Route::middleware(VerifyIfAdmin::class)->group(function(){
        //something testy
        Route::get('/users', [UserController::class, 'fetchAll']);
        Route::get('/user/{id}', [UserController::class, 'show']);

        //Agents
        Route::get('/agents', [AgentController::class, 'fetchAll'])->name('agents.display');
        Route::get('/agent/create', [AgentController::class, 'create'])->name('agents.create');
        Route::get('/agent/edit/{id}', [AgentController::class, 'edit'])->name('agents.edit');
        Route::get('/agent/delete/{id}', [AgentController::class, 'destroy'])->name('agents.destroy');
        Route::post('/agent/store', [AgentController::class, 'store'])->name('agents.store');
        Route::post('/agent/update', [AgentController::class, 'update'])->name('agents.update');

        //Leasers
        Route::get('/leasers', [LeaserController::class, 'fetchAll'])->name('leasers.display');
        Route::get('/leaser/create', [LeaserController::class, 'create'])->name('leasers.create');
        Route::get('/leaser/edit/{id}', [LeaserController::class, 'edit'])->name('leasers.edit');
        Route::get('/leaser/delete/{id}', [LeaserController::class, 'destroy'])->name('leasers.destroy');
        Route::post('/leaser/store', [LeaserController::class, 'store'])->name('leasers.store');
        Route::post('/leaser/update', [LeaserController::class, 'update'])->name('leasers.update');

        //Vehicles
        Route::get('/vehicles', [VehicleController::class, 'fetchAll'])->name('vehicle.display');
        Route::get('/vehicle/create', [VehicleController::class, 'create'])->name('vehicle.create');
        Route::get('/vehicle/edit/{id}', [VehicleController::class, 'edit'])->name('vehicle.edit');
        Route::get('/vehicle/delete/{id}', [VehicleController::class, 'destroy'])->name('vehicle.destroy');
        Route::get('/vehicle/fetch/{type}', [VehicleController::class, 'filterVehicleSelectionByType']);
        Route::get('/vehicle/fetch/{type}/{id}', [VehicleController::class, 'fetchVehicleByTypeID']);
        Route::post('/vehicle/store', [VehicleController::class, 'store'])->name('vehicle.store');
        Route::post('/vehicle/update', [VehicleController::class, 'update'])->name('vehicle.update');

        //Pre-trip receipt
        Route::get('/generate/pre-trip', [ReceiptController::class, 'genPreTripReceipt'])->name('generators.pre-trip');
        Route::get('/receipts/pre-trip', [ReceiptController::class, 'viewPreTripReceipts'])->name('pre-trip.display');
        Route::get('/receipt/pre-trip/{id}', [ReceiptController::class, 'detailsPreTrip'])->name('pre-trip.view');
        Route::post('/generate/pre-trip/store', [ReceiptController::class, 'generatePreTrip'])->name('generators.pre-trip.store');

        //Post-trip receipt
        Route::get('/generate/post-trip/{pretrip}', [ReceiptController::class, 'genPostTripReceipt']);
        Route::get('/receipts/post-trip', [ReceiptController::class, 'viewPostTripReceipts']);
        Route::get('/receipt/post-trip/{id}', [ReceiptController::class, 'detailsPostTrip']);
        Route::post('/generate/post-trip/store', [ReceiptController::class, 'generatePostTrip']);

        //Receipt
        Route::get('/receipts', [ReceiptController::class, 'viewReceipts']);
        Route::get('/generate/receipt/{posttrip}', [ReceiptController::class, 'genReceipt']);
        Route::get('/receipt/{id}', [ReceiptController::class, 'detailsReceipt']);
        Route::get('/receipt/delete/{id}', [ReceiptController::class, 'destroyReceipt']);
        Route::post('/generate/receipt/store', [ReceiptController::class, 'generateReceipt']);

        //Reservation
        Route::get('/reserved', [ReservationController::class, 'fetchAll']);
        Route::get('/reserved/release/{receiptID}/{type}/{plateNo}', [ReservationController::class, 'push']);
        Route::get('/reserved/delete/{receiptID}/{plateNo}', [ReservationController::class, 'destroy']);

        //Monitoring
        Route::get('/released', [DispatchController::class, 'fetchAll'])->name('released');
        Route::get('/released/extend/{ulid}/{pretrip}/{type}/{date}', [DispatchController::class, 'fetchExtend']);
        Route::post('/released/extend', [DispatchController::class, 'extend']);
    });
});

//Login
Route::get('/login', [LoginController::class, 'view'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/login/verify', [LoginController::class, 'authenticate'])->name('login.verify');

//Register
Route::get('/register', [RegistrationController::class, 'view'])->name('register');
Route::post('/register/store', [RegistrationController::class, 'store'])->name('register.store');

Route::post('/search', [SearchController::class, 'search']);
