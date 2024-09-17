<?php

namespace App\Http\Controllers;

use App\Models\Fine;
use Illuminate\Http\Request;

class FineController extends Controller
{
    public function index(){
        $fine = Fine::included()->get(); 
        return response()->json($fine);
    }
}
