<?php

namespace App\Http\Controllers;

use App\Models\Reserved;
use Illuminate\Http\Request;

class ReservationController extends Controller{

    public function fetchAll(){
        return view('vehicles.reserved.display', ['data' => Reserved::all()]);
    }
}
