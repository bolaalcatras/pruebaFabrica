<?php

namespace App\Http\Controllers;

use App\Models\Accident;
use Illuminate\Http\Request;

class AccidentController extends Controller
{
    public function index(){
        $accident = Accident::included()->get(); 
        return response()->json($accident);
    }
}
