<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\PostTripReceipt;
use App\Models\PreTripReceipt;
use App\Models\Reserved;
use DateTimeZone;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ReceiptController extends Controller
{

    public function genPreTripReceipt(): View{
        return view('generators.pre-trip', ['customers' => Customer::all(), 'vehicles' => VehicleController::vehiclesForSelection()]);
    }

    //TODO: generate post-trip receipt;
    //TODO: merge data from pre- and post-receipts to create a single receipt.
    public function genPostTripReceipt(string $pretrip): View{
        return view('generators.post-trip', [
            'pretrip' => PreTripReceipt::findOrFail($pretrip),
            'return_date' => date_create('now', new DateTimeZone('Asia/Manila'))
        ]);
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
        $latest_id = DB::select('select max(pretrip_ID) as latest from pretripreceipts');
        VehicleController::reserveVehicle($input['vehicle_type'], $input['vehicle_plateNo']);
        Reserved::create([
            'vehicle_type' => $input['vehicle_type'],
            'vehicle_plateNo' => $input['vehicle_plateNo'],
            'customer_name' => $input['customer_name'],
            'pretrip_ID' => $latest_id[0]->latest,
            'reserved_reservationDate' => $requestDate
        ]);
        return response()->json(['type'=>'success']);
    }

    public function generatePostTrip(Request $request){
        $input = $request->all();
        $gas_calc = ($input['gas'] < $input['initial-gas']) ?
            (($input['initial-gas'] - $input['gas']) * $input['gas-price']) : 0;
        $total = $input['optional-cost'] + $gas_calc;
        PostTripReceipt::create([
            'pretrip_ID' => $input['pretrip'],
            'agent_name' => $input['agent'],
            'customer_name' => $input['customer'],
            'posttrip_returnDate' => $input['return-date'],
            'posttrip_gasBar'  => $input['gas'],
            'posttrip_damageReport' => $input['comment'],
            'posttrip_optionalCost' => $input['optional-cost'],
            'posttrip_total' => $total
        ]);
        return response()->json(['type' => 'success']);
    }
}
