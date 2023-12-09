<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Customer;
use App\Models\Motorcycle;
use App\Models\PreTripReceipt;
use App\Models\Vehicle;
use DateTimeZone;
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

    public function generatePreTrip(Request $request){
        $requestDate = date_create('now', new DateTimeZone('Asia/Manila'))
            ->format('Y-m-d H:i:s');
        $input = $request->all();
        //Store the data on the pre-trip receipt table
        PreTripReceipt::create([
            'agent_name' => $input['agent_name'],
            'customer_name' => $input['customer_name'],
            'vehicle_type' => $input['vehicle_type'],
            'vehicle_plateNo' => $input['vehicle_plateNo'],
            'pretrip_typeOfID' => $input['validIdentification'],
            'pretrip_datestart' => $input['start-date'],
            'pretrip_dateend' => $input['end-date'],
            'pretrip_destination' => $input['destination'],
            'pretrip_initialGas' => $input['initial-gas'],
            'pretrip_requestGasLiters' => $input['gas'],
            'pretrip_requestGasPrice' => $input['gas_price'],
            'pretrip_requestWash' => $input['wash'],
            'pretrip_requestHelmet' => $input['helmet'],
            'pretrip_total' => 100,
            'pretrip_createdAt' => $requestDate,
        ]);
        //Change vehicle variables on other table to be unavailable or "reserved"
    }
}
