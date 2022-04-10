<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DocumentoController extends Controller
{
    function index(){

        #dd('Hola soy la función index');
        return view('documento');
    }

    function insertar(){

    }

    function actualizar(){
        
    }
}
