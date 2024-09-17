<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index(){
        $vehicle = Vehicle::included()->get(); 
        return response()->json($vehicle);
    }
}
