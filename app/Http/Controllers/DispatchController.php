<?php

namespace App\Http\Controllers;

use App\Models\PreTripReceipt;
use App\Models\Released;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DispatchController extends Controller
{
    public function fetchAll(): View{
        return view('vehicles.released.display', ['data' => Released::all()]);
    }

    public function fetchExtend(string $receipt, string $type, string $date): View{
        $cost = ($type == 'Car') ? 200:80;
        return view('vehicles.released.extend',
            ['data' => PreTripReceipt::findOrFail($receipt),
                'type' => $type,
                'cost' => $cost,
                'date' => $date]);
    }

    public function extend(Request $request){
        dd($request->all());
    }
}
