<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoCertificado;
use App\Models\Certificado;

class CertificadoController extends Controller
{
    function index(Request $request){
        return view('certificado.index');
    }

    function create(){
        $tipo_certificados = TipoCertificado::all();
        return view('certificado.create',compact('tipo_certificados'));
    }

    function store(Request $request){

        //dd( $request->nif );
        Certificado::create([
            'nif'=>$request->nif,
            'codigo_pais'=>$request->codigo_pais,
            'nombre_comun'=>$request->nombre_comun,
            'cargo'=>$request->cargo,
            'numero_serie'=>$request->numero_serie,
            'tipo_certificado_id'=>$request->tipo_certificado,
            'entidad_emisora'=>$request->entidad_emisora,
            'fecha_inicio'=>$request->fecha_inicio,
            'fecha_fin'=>$request->fecha_fin
        ]);

        return [
            'title'=>'Buen Trabajo',
            'text' =>'Registro Exitoso',
            'type' =>'success'
        ];
    }
}
