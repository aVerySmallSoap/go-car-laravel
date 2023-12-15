<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Motorcycle;
use App\Models\PreTripReceipt;
use App\Models\Released;
use App\Models\Reserved;
use Illuminate\Http\Request;
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
        if($type == 'Car'){
            $vehicle = Car::query()
                ->selectRaw('car_plateNo as vehicle_plateNo, car_model as vehicle_model, car_type as vehicle_type')
                ->where('car_plateNo', '=', $plate)
                ->get();
        }else{
            $vehicle = Motorcycle::query()
                ->selectRaw('motor_plateNo as vehicle_plateNo, motor_model as vehicle_model, motor_type as vehicle_type')
                ->where('motor_plateNo', '=', $plate)
                ->get();
        }
        $receipt = PreTripReceipt::findOrFail($receipt);
        $receipt = $receipt->attributesToArray();
        $vehicle = $vehicle->all()[0]->attributesToArray();
        Released::create([
            'pretrip_ID' => $receipt['pretrip_ID'],
            'vehicle_plateNo' => $vehicle['vehicle_plateNo'],
            'vehicle_model' => $vehicle['vehicle_model'],
            'vehicle_type' => $vehicle['vehicle_type'],
            'customer_name' => $receipt['customer_name'],
            'pretrip_dateend' => $receipt['pretrip_dateend']
        ]);
    }
}
