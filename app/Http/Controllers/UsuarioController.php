<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use stdClass;

class UsuarioController extends Controller
{
    function index()
    {

        //controller - app/http/Controllers
        //Model - app/Model
        //view - resouces/view
        //rotas - router/web.php
        $pessoa01 = new stdClass();
        $pessoa01->nome = "Jackson";
        $pessoa01->idade = 35;

        $pessoa02 = new stdClass();
        $pessoa02->nome = "Maria";
        $pessoa02->idade = 15;

        $pessoa03 = new stdClass();
        $pessoa03->nome = "Chaves";
        $pessoa03->idade = 16;

        $pessoas = [$pessoa01, $pessoa02, $pessoa03];

       // dd($pessoas);

        return view('index', ["pessoas" => $pessoas]);
    }
}
