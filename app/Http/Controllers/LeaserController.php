<?php

namespace App\Http\Controllers;

use App\Http\Requests\LeaserRequest;
use App\Models\Leaser;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class LeaserController extends Controller
{
    public function create(): View{
        return view('leasers.create');
    }

    /** @noinspection PhpUndefinedMethodInspection */
    public function store(LeaserRequest $request): RedirectResponse{
        $validated = $request->validated();
        Leaser::create([
            'leaser_name' => $validated['name'],
            'leaser_age' => $validated['age'],
            'leaser_address' => $validated['address'],
            'leaser_contactNo' => $validated['contact']
        ]);
        return to_route('leasers.display', ['data' => Leaser::all()]);
    }

    public function update(LeaserRequest $request): JsonResponse{
        $validated = $request->validated();
        Leaser::where('leaser_id', $validated['id'])
            ->update([
                'leaser_name' => $validated['name'],
                'leaser_age' => $validated['age'],
                'leaser_address' => $validated['address'],
                'leaser_contactNo' => $validated['contact']
            ]);
        return response()->json(['type' => 'success']);
    }

    public function destroy(string|int $id): RedirectResponse{
        Leaser::destroy($id);
        return to_route('leasers.display', ['data' => Leaser::all()]);
    }

    public function fetchAll(): View {
        return view('leasers.display', ['data' => Leaser::all()]);
    }

    public function edit(string $id):View {
        return view('leasers.edit', ['data' => Leaser::findOrFail($id)]);
    }
}
