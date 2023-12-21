<?php

namespace App\Http\Controllers;

use App\Http\Requests\AgentRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use App\Models\Agent;
use Illuminate\View\View;

class AgentController extends Controller
{
    public function create(): View{
        return view('agents.create', ['leasers' => Agent::all()]);
    }

    public function edit(string $id): View{
        return view('agents.edit', ['data' => Agent::findOrFail($id)]);
    }

    /** @noinspection PhpUndefinedMethodInspection */
    public function store(AgentRequest $request): JsonResponse{
        $validated = $request->validated();
        Agent::create([
            'agent_name' => $validated['name'],
            'agent_age' => $validated['age'],
            'agent_address' => $validated['address']
        ]);
        return response()->json(['type' => 'success']);
    }

    public function update(AgentRequest $request): JsonResponse{
        $validated = $request->validated();
        Agent::where('agent_id', $request['id'])
            ->update([
                'agent_name' => $validated['name'],
                'agent_age' => $validated['age'],
                'agent_address' => $validated['address']
            ]);
        return response()->json(['type' => 'success']);
    }

    public function destroy(string|int $id): RedirectResponse{
        Agent::destroy($id);
        return to_route('agents.display', ['data' => Agent::all()]);
    }
    public function fetchAll(): View {
        return view('agents.display', ['data' => Agent::all()] );
    }
}
