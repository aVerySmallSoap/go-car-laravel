<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Motorcycle;
use App\Models\PreTripReceipt;
use App\Models\Released;
use App\Models\Reserved;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ReservationController extends Controller{

    public function fetchAll(): View{
        return view('vehicles.reserved.display', ['data' => Reserved::all()]);
    }

    public function destroy(string $receipt, string $type, string $plate){
        switch ($type){
            case 'Car':
                Car::where('car_plateNo', $plate)
                    ->update(['car_isAvailable' => 1]);
                break;
            case 'Motorcycle':
                Motorcycle::where('motor_plateNo', $plate)
                    ->update(['motor_isAvailable' => 1]);
                break;
            default:
                return response()->json(['type' => 'error', 'message' => 'no such thing']);
        }
        Reserved::where('pretrip_ID', $receipt)
            ->delete();
        PreTripReceipt::destroy($receipt);
        return response()->json(['type' => 'success']);
    }

    //Push vehicles out of yard(reservation) to monitor
    public function push(string $receipt, string $type, string $plate){
        $vehicle = DB::table('vehicles')
            ->select(['vehicle_plateNo', 'vehicle_model', 'vehicle_type'])
            ->where('vehicle_type', '=', $type)
            ->where('vehicle_plateNo', '=', $plate)->get();
        $receipt = PreTripReceipt::findOrFail($receipt);
        $receipt = $receipt->attributesToArray();
        $vehicle = $vehicle->all()[0];
        Released::create([
            'pretrip_ID' => $receipt['pretrip_ID'],
            'vehicle_plateNo' => $vehicle->vehicle_plateNo,
            'vehicle_model' => $vehicle->vehicle_model,
            'vehicle_type' => $vehicle->vehicle_type,
            'customer_name' => $receipt['customer_name'],
            'pretrip_dateend' => $receipt['pretrip_dateend']
        ]);
        Reserved::where('pretrip_ID', $receipt)->delete();
        return response()->redirectToRoute('/released');
    }
}
