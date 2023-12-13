<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Customer;
use App\Models\Motorcycle;
use App\Models\PreTripReceipt;
use App\Models\Reserved;
use App\Models\Vehicle;
use DateTimeZone;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ReceiptController extends Controller
{

    public function genPreTripReceipt(): View{
        return view('generators.pre-trip', ['customers' => Customer::all(), 'vehicles' => VehicleController::vehiclesForSelection()]);
    }

    public function viewPreTripReceipts(): View{
        return view('receipts.pretrip.display', ['data' => PreTripReceipt::all()]);
    }

    public function generatePreTrip(Request $request): JsonResponse{
        $requestDate = date_create('now', new DateTimeZone('Asia/Manila'))
            ->format('Y-m-d H:i:s');
        $input = $request->all();
        //Deposit + (Rent Cost + Destination) + (Gas + (Car wash + Helmet))
        $carwash_cost = ($input['vehicle_type'] == 'Car') ? 200:80;
        $deposit_cost = (($input['vehicle_type'] == 'Car') ? 500:200);
        $gas_cost = $input['gas'] * $input['gas_price'];
        $optionals_cost = $gas_cost + ((($input['wash'] == 1) ? $carwash_cost:0) + (($input['helmet'] == 1) ? 150:0));
        $total = $deposit_cost + ($input['vehicle_rentPrice'] + $input['destination-price']) + $optionals_cost;
        PreTripReceipt::create([
            'agent_name' => $input['agent_name'],
            'customer_name' => $input['customer_name'],
            'vehicle_type' => $input['vehicle_type'],
            'vehicle_plateNo' => $input['vehicle_plateNo'],
            'pretrip_typeOfID' => $input['validIdentification'],
            'pretrip_datestart' => $input['start-date'],
            'pretrip_dateend' => $input['end-date'],
            'pretrip_destination' => $input['destination'],
            'pretrip_destinationPrice' => $input['destination-price'],
            'pretrip_initialGas' => $input['initial-gas'],
            'pretrip_requestGasLiters' => $input['gas'],
            'pretrip_requestGasPrice' => $input['gas_price'],
            'pretrip_requestWash' => $input['wash'],
            'pretrip_requestHelmet' => $input['helmet'],
            'pretrip_total' => $total,
            'pretrip_createdAt' => $requestDate,
        ]);
        VehicleController::reserveVehicle($input['vehicle_type'], $input['vehicle_plateNo']);
        $latest_id = DB::select('select max(pretrip_ID) from pretripreceipts');
        Reserved::created([
            'vehicle_type' => $input['vehicle_type'],
            'vehicle_plateNo' => $input['vehicle_plateNo'],
            'customer_name' => $input['customer_name'],
            'reserved_reservingPretripID' => ++$latest_id,
            'reserved_reservationDate' => $requestDate
        ]);
        return response()->json(['type'=>'success']);
    }
}
