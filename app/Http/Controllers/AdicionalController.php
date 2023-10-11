<?php

namespace App\Http\Controllers;

use App\Models\Adicional;
use Illuminate\Http\Request;

class AdicionalController extends Controller
{
    public function index(){
        $adicional = Adicional::all();

        return view('adicional.list')->with(['adicional'=> $adicional]);
    }
}
