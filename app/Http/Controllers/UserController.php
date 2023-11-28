<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    protected string $name = 'Users';

    public function fetchAll(): View {
        return view('entity', ['data' => User::all(), 'entity' => $this->name] );
    }

    public function show(string $id): View {
        return view('entity.profile', ['data' => User::findOrFail($id), 'entity' => $this->name] );
    }
}
