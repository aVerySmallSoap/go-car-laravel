<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class VehicleController extends Controller
{
    public function fetchAll(): View {
        $merged = DB::table('cars')->beforeQuery(function ($column){

        })
            ->union(DB::table('motorcycles'))
            ->get();
        return view('vehicles.display', ['data' => $merged]);
    }
}
