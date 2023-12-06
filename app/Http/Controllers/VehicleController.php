<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Motorcycle;
use App\Models\Vehicle;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class VehicleController extends Controller
{

    public function fetchAll(): View {
        $merged = self::vehiclesForSelection();
        return view('vehicles.display', ['data' => $merged]);
    }

    public static function vehiclesForSelection(): Collection {
        return DB::table('cars')
            ->select('car_plateNo as vehicle_plateNo',
                'car_name as vehicle_name',
                'car_type as vehicle_type',
                'car_color as vehicle_color',
                'leaser_name as leaser_name'
            )
            ->where('car_isAvailable', '=', 1)
            ->union(
                DB::table('motorcycles')
                    ->select('motor_plateNo as vehicle_plateNo',
                        'motor_name as vehicle_name',
                        'motor_type as vehicle_type',
                        'motor_color as vehicle_color',
                        'leaser_name as leaser_name'
                    )
                    ->where('motor_isAvailable', '=', 1))
            ->get();
    }

    public function fetchVehicleByTypeID(string $type, string $id): JsonResponse{
        $data = array();
        switch ($type){
            case 'Car':
                $vehicle = DB::table('cars')
                    ->select('car_plateNo as vehicle_plateNo',
                        'car_name as vehicle_name',
                        'car_type as vehicle_type',
                        'car_color as vehicle_color'
                    )->where('car_name', '=', $id)
                    ->get();
                break;
            case 'Motorcycle':
                $vehicle = DB::table('motorcycles')
                    ->select('motor_plateNo as vehicle_plateNo',
                        'motor_name as vehicle_name',
                        'motor_type as vehicle_type',
                        'motor_color as vehicle_color'
                    )->where('motor_name', '=', $id)
                    ->get();
                break;
            default:
                return response()->json(['type' => 'error', 'message' => 'type unsupported']);
        }
        foreach ($vehicle[0] as $key => $value){
            $data[] = $value;
        }
        return response()->json(['type' => 'success', 'data' => $data]);
    }

    public function filterVehicleSelectionByType(string $type): JsonResponse {
        $data = array();
        switch ($type){
            case 'Car':
                $vehicle = DB::table('cars')
                    ->select('car_plateNo as vehicle_plateNo',
                        'car_name as vehicle_name',
                        'car_type as vehicle_type',
                        'car_color as vehicle_color'
                    )->get();
                break;
            case 'Motorcycle':
                $vehicle = DB::table('motorcycles')
                    ->select('motor_plateNo as vehicle_plateNo',
                        'motor_name as vehicle_name',
                        'motor_type as vehicle_type',
                        'motor_color as vehicle_color'
                    )->get();
                break;
            default:
                return response()->json(['type' => 'error', 'message' => 'type unsupported']);
        }
        foreach ($vehicle as $key => $value){
            $data[] = $value;
        }
        return response()->json(['type' => 'success', 'data' => $data]);
    }
}
