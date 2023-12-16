<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarMotorRequest;
use App\Models\Leaser;
use App\Models\Motorcycle;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MotorcycleController extends Controller
{
    public function create(): View{
        return view('vehicles.motorcycles.create', ['leasers' => Leaser::all()]);
    }

    /** @noinspection PhpUndefinedMethodInspection */
    public function store(CarMotorRequest $request): RedirectResponse{
        $validated = $request->validated();
        Motorcycle::create([
            'motor_plateNo' => $validated['plateNo'],
            'motor_model' => $validated['model'],
            'motor_type' => $validated['type'],
            'motor_color' => $validated['color'],
            'motor_isAvailable' => $validated['availability'],
            'motor_rentPrice' => $validated['rentPrice'],
            'leaser_name' => $validated['leaser']
        ]);
        return to_route('vehicles.motorcycles.display', ['data' => Motorcycle::all()]);
    }

    public function update(CarMotorRequest $request): JsonResponse{
        $validated = $request->validated();
        Motorcycle::where('motor_plateNo', $validated['plateNo'])
            ->update([
                'motor_model' => $validated['model'],
                'motor_type' => $validated['type'],
                'motor_color' => $validated['color'],
                'motor_isAvailable' => $validated['availability'],
                'motor_rentPrice' => $validated['rent'],
                'leaser_name' => $validated['leaser']
            ]);
        return response()->json(['Message' => 'Car successfully updated!']);
    }

    public function destroy(string|int $id): RedirectResponse{
        Motorcycle::destroy($id);
        return to_route('vehicles.motorcycles.display', ['data' => Motorcycle::all()]);
    }

    public function fetchAll(): View {
        return view('vehicles.motorcycles.display', ['data' => Motorcycle::all()]);
    }

    public function edit(string $id):View {
        return view('vehicles.motorcycles.edit', ['data' => Motorcycle::findOrFail($id), 'leasers' => Leaser::all()]);
    }
}
