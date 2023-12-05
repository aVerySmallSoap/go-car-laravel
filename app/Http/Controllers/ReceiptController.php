<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Motorcycle;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ReceiptController extends Controller
{
    public function genPreTripReceipt(string $id, string $type): View|JsonResponse
    {
        switch ($type){
            case 'Car':
                $object = DB::table('cars')
                    ->select('car_plateNo as vehicle_plateNo',
                    'car_name as vehicle_name',
                    'car_type as vehicle_type',
                    'car_color as vehicle_color',
                    'leaser_name as leaser_name')
                    ->where('car_plateNo', '=', $id)
                    ->get();
                break;
            case 'Motorcycle':
                $object = DB::table('motorcycles')
                    ->select('motor_plateNo as vehicle_plateNo',
                        'motor_name as vehicle_name',
                        'motor_type as vehicle_type',
                        'motor_color as vehicle_color',
                        'leaser_name as leaser_name'
                    )
                    ->where('motor_isAvailable', '=', 1)
                    ->get();
                break;
            default:
                return response()->json(['type' => 'error', 'message' => 'object not found']);
        }
        return view('generators.pre-trip', ['data' => $object]);
    }
}
