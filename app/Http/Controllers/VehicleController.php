<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class VehicleController extends Controller
{
    public function fetchAll(): View {
        $merged = DB::table('cars')
            ->select('car_plateNo as vehicle_plateNo',
                'car_name as vehicle_name',
                'car_type as vehicle_type',
                'car_color as vehicle_color',
                'leaser_name as leaser_name'
            )
            ->where('car_isAvailable', 1)
            ->union(
                DB::table('motorcycles')
                    ->select('motor_plateNo as vehicle_plateNo',
                        'motor_name as vehicle_name',
                        'motor_type as vehicle_type',
                        'motor_color as vehicle_color',
                        'leaser_name as leaser_name'
                    )
                    ->where('motor_isAvailable', 1))
            ->get();
        return view('vehicles.display', ['data' => $merged]);
    }
}
