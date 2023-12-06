<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Customer;
use App\Models\Motorcycle;
use App\Models\Vehicle;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ReceiptController extends Controller
{

    public function genPreTripReceipt(): View|JsonResponse
    {
        return view('generators.pre-trip', ['customers' => Customer::all(), 'vehicles' => VehicleController::vehiclesForSelection()]);
    }
}
