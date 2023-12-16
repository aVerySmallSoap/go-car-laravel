<?php

namespace App\Http\Controllers;

use App\Models\Extension;
use App\Models\PreTripReceipt;
use App\Models\Released;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DispatchController extends Controller
{
    public function fetchAll(): View{
        return view('vehicles.released.display', ['data' => Released::all()]);
    }

    public function fetchExtend(string $id, string $receipt, string $type): View{
        $cost = ($type == 'Car') ? 200:80;
        return view('vehicles.released.extend',
            ['data' => PreTripReceipt::findOrFail($receipt), 'cost' => $cost, 'ulid' => $id]);
    }

    public function extend(Request $request){
        $data = $request->all();
        Extension::create([
            'pretrip_ID' => $data['id'],
            'released_ID' => $data['ulid'],
            'vehicle_type' => $data['type'],
            'vehicle_plateNo' => $data['plateNo'],
            'extension_originalEndDateTime' => $data['original-date'],
            'extension_extendedDateTime' => $data['new-date'],
            'extension_cost' => $data['cost']
        ]);
        PreTripReceipt::where('pretrip_ID', $data['id'])
            ->update(['pretrip_dateend' => $data['new-date']]);
        Released::where('pretrip_ID', $data['id'])
            ->update(['pretrip_dateend' => $data['new-date']]);
        return response()->json(['type' => 'success']);
    }
}
