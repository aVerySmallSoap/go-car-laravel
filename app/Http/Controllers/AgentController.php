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

    /** @noinspection PhpUndefinedMethodInspection */
    public function store(AgentRequest $request): RedirectResponse{
        $validated = $request->validated();
        Agent::create([
            'agent_name' => $validated['name'],
            'agent_age' => $validated['age'],
            'agent_address' => $validated['address']
        ]);
        return to_route('agents.display', ['data' => Agent::all()]);
    }

    public function update(AgentRequest $request): JsonResponse{
        $validated = $request->validated();
        Agent::where('agent_id', $validated['id'])
            ->update([
                'agent_name' => $validated['name'],
                'agent_age' => $validated['age'],
                'agent_address' => $validated['address']
            ]);
        return response()->json(['Message' => 'Agents successfully updated!']);
    }

    public function destroy(string|int $id): RedirectResponse{
        Agent::destroy($id);
        return to_route('agents.display', ['data' => Agent::all()]);
    }
    public function fetchAll(): View {
        return view('agents.display', ['data' => Agent::all()] );
    }
}
