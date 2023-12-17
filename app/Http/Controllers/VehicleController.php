<?php

namespace App\Http\Controllers;

use App\Http\Requests\VehicleRequest;
use App\Models\Leaser;
use App\Models\Vehicle;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class VehicleController extends Controller
{

    public function fetchAll(): View {
        return view('vehicles.display', ['data' => Vehicle::all()]);
    }

    public function create(): View{
        return view('vehicles.create', ['leasers' => Leaser::all()]);
    }

    public function destroy(string|int $id): RedirectResponse{
        Vehicle::destroy($id);
        return to_route('vehicle.display', ['data' => Vehicle::all()]);
    }

    public function edit(string $id):View {
        return view('vehicles.edit', ['data' => Vehicle::findOrFail($id), 'leasers' => Leaser::all()]);
    }

    public function store(VehicleRequest $request): JsonResponse {
        $validated = $request->validated();
        Vehicle::create([
            'vehicle_plateNo' => $validated['plateNo'],
            'vehicle_model' => $validated['model'],
            'vehicle_type' => $validated['type'],
            'vehicle_color' => $validated['color'],
            'vehicle_isAvailable' => $validated['availability'],
            'vehicle_rentPrice' => $validated['rent'],
            'leaser_name' => $validated['leaser']
        ]);
        return response()->json(['type' => 'success']);
    }

    public function update(VehicleRequest $request): JsonResponse {
        $validated = $request->validated();
        Vehicle::where('vehicle_plateNo', $validated['plateNo'])
            ->update([
            'vehicle_plateNo' => $validated['plateNo'],
            'vehicle_model' => $validated['model'],
            'vehicle_type' => $validated['type'],
            'vehicle_color' => $validated['color'],
            'vehicle_isAvailable' => $validated['availability'],
            'vehicle_rentPrice' => $validated['rent'],
            'leaser_name' => $validated['leaser']
        ]);
        return response()->json(['type' => 'success']);
    }

    public function filterVehicleSelectionByType(string $type): JsonResponse {
        $data = array();
        $vehicle = DB::table('vehicles')
            ->select(['vehicle_model'])
            ->where('vehicle_isAvailable', '=', 1)
            ->where('vehicle_type', '=', $type)->get();
        foreach ($vehicle as $element){
            foreach($element as $key => $value){
                $data[] = $value;
            }
        }
        return response()->json(['type' => 'success', 'data' => $data]);
    }

    public function fetchVehicleByTypeID(string $type, string $plate): JsonResponse{
        $data = array();
        $vehicle = DB::table('vehicles')
            ->select([
                'vehicle_plateNo',
                'vehicle_model',
                'vehicle_type',
                'vehicle_color',
                'vehicle_rentPrice'])
            ->where('vehicle_type', '=', $type)
            ->where('vehicle_model', '=', $plate)
            ->get();
        foreach ($vehicle[0] as $key => $value){
            $data[] = $value;
        }
        return response()->json(['type' => 'success', 'data' => $data]);
    }

    public static function reserveVehicle(string $type, $plateNo): JsonResponse{
        DB::table('vehicles')
            ->where('vehicle_type', '=', $type)
            ->where('vehicle_plateNo', '=', $plateNo)
            ->update(['vehicle_isAvailable' => 0]);
        return response()->json(['type' => 'success']);
    }
}
