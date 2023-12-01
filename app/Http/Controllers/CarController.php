<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarMotorRequest;
use App\Models\Car;
use App\Models\Leaser;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CarController extends Controller
{
    public function create(): View{
        return view('vehicles.cars.create', ['leasers' => Leaser::all()]);
    }

    /** @noinspection PhpUndefinedMethodInspection */
    public function store(CarMotorRequest $request): RedirectResponse{
        $validated = $request->validated();
        Car::create([
            'car_plateNo' => $validated['plateNo'],
            'car_name' => $validated['name'],
            'car_type' => $validated['type'],
            'car_color' => $validated['color'],
            'car_isAvailable' => $validated['availability'],
            'leaser_name' => $validated['leaser']
        ]);
        return to_route('vehicles.cars.display', ['data' => Car::all()]);
    }

    public function update(CarMotorRequest $request): JsonResponse{
        $validated = $request->validated();
        Car::where('car_plateNo', $validated['plateNo'])
            ->update([
                'car_name' => $validated['name'],
                'car_type' => $validated['type'],
                'car_color' => $validated['color'],
                'car_isAvailable' => $validated['availability'],
                'leaser_name' => $validated['leaser']
            ]);
        return response()->json(['Message' => 'Car successfully updated!']);
    }

    public function destroy(string|int $id): RedirectResponse{
        Car::destroy($id);
        return to_route('vehicles.cars.display', ['data' => Car::all()]);
    }

    public function fetchAll(): View {
        return view('vehicles.cars.display', ['data' => Car::all()]);
    }

    public function edit(string $id):View {
        return view('vehicles.cars.edit', ['data' => Car::findOrFail($id), 'leasers' => Leaser::all()]);
    }
}
