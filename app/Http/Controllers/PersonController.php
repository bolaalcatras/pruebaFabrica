<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    public function index(){
        $person = Person::included()->get(); 
        return response()->json($person);
    }
    
}
