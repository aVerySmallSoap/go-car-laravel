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
                    ->select(
                        'car_plateNo as vehicle_plateNo',
                        'car_name as vehicle_name',
                        'car_type as vehicle_type',
                        'car_color as vehicle_color',
                        'car_rentPrice as vehicle_rentPrice')
                    ->where('car_name', '=', $id)
                    ->where('car_isAvailable', '=', 1)
                    ->get();
                break;
            case 'Motorcycle':
                $vehicle = DB::table('motorcycles')
                    ->select(
                        'motor_plateNo as vehicle_plateNo',
                        'motor_name as vehicle_name',
                        'motor_type as vehicle_type',
                        'motor_color as vehicle_color',
                        'motor_rentPrice as vehicle_rentPrice')
                    ->where('motor_name', '=', $id)
                    ->where('motor_isAvailable', '=', 1)
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
                        'car_color as vehicle_color',
                        'car_rentPrice as vehicle_rentPrice')
                    ->where('car_isAvailable', '=', 1)
                    ->get();
                break;
            case 'Motorcycle':
                $vehicle = DB::table('motorcycles')
                    ->select('motor_plateNo as vehicle_plateNo',
                        'motor_name as vehicle_name',
                        'motor_type as vehicle_type',
                        'motor_color as vehicle_color',
                        'motor_rentPrice as vehicle_rentPrice')
                    ->where('motor_isAvailable', '=', 1)
                    ->get();
                break;
            default:
                return response()->json(['type' => 'error', 'message' => 'type unsupported']);
        }
        foreach ($vehicle as $key => $value){
            $data[] = $value;
        }
        return response()->json(['type' => 'success', 'data' => $data]);
    }

    public static function reserveVehicle(string $type, $plateNo): JsonResponse{
        switch ($type){
            case 'Car':
                DB::table('cars')
                    ->where('car_plateNo', $plateNo)
                    ->update(['car_isAvailable' => 0]);
                break;
            case 'Motorcycle':
                DB::table('motorcycles')
                    ->where('motor_plateNo', $plateNo)
                    ->update(['motor_isAvailable' => 0]);
                break;
            default:
                return response()->json(['type' => 'error', 'message' => 'No such thing as '.$type]);
        }
        return response()->json(['type' => 'success']);
    }
}
