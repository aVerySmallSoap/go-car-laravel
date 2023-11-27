<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agent;
use Illuminate\View\View;

class AgentController extends Controller
{
    protected string $name = 'Agents';

    public function fetchAll(): View
    {
        return view('entity', ['data' => Agent::all(), 'entity' => $this->name] );
    }

    public function show(string $id): View
    {
        return view('entity.profile', ['data' => Agent::findOrFail($id), 'entity' => $this->name] );
    }
}
