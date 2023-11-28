<?php

namespace App\Http\Controllers;

use App\Models\Leaser;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use JetBrains\PhpStorm\NoReturn;

class LeaserController extends Controller
{

    protected string $name = 'Leasers';

    public function create(): View{
        return view('leaser.create');
    }

    public function store(Request $request): RedirectResponse{
        $validated = $request->validate([
            'name' => 'required',
            'age' => 'required',
            'address' => 'required',
            'contact' => 'required|max:11'
        ]);
        Leaser::create([
            'leaser_name' => $validated['name'],
            'leaser_age' => $validated['age'],
            'leaser_address' => $validated['address'],
            'leaser_contactNo' => $validated['contact']
        ]);
        return to_route('leasers', ['data' => Leaser::all(), 'entity' => $this->name]);
    }

    public function fetchAll(): View {
        return view('entity', ['data' => Leaser::all(), 'entity' => $this->name] );
    }

    public function show(string $id): View {
        return view('entity.profile', ['data' => Leaser::findOrFail($id), 'entity' => $this->name] );
    }


}
