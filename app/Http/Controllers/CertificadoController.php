<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TipoCertificado;
use App\Models\Certificado;
use Carbon\Carbon;
use Greenter\XMLSecLibs\Certificate\X509Certificate;
use Greenter\XMLSecLibs\Certificate\X509ContentType;

class CertificadoController extends Controller
{
    function index(Request $request){
        if( $request->ajax() ){
            $result = $this->getData();
            return   ['data'=>$result];
        }

        return view('certificado.index',[
            'tipo_certificados'=> TipoCertificado::all(),
            'fecha_inicio'=>Carbon::now()->format('Y-m-d'),
            'fecha_fin'   =>Carbon::now()->addYear(1)->format('Y-m-d')
        ]);
    }

    private function getData(){
        $result = Certificado::selectRaw("
            certificados.id,
            certificados.nif,
            certificados.codigo_pais,
            certificados.nombre_comun,
            certificados.cargo,
            certificados.numero_serie,
            tipo_certificados.nombre tipo,
            certificados.entidad_emisora,
            certificados.fecha_inicio,
            certificados.fecha_fin,
            certificados.firma
        ")
        ->join('tipo_certificados',function($join){
            $join->on('certificados.tipo_certificado_id','=','tipo_certificados.id');
        })
        ->where('certificados.eliminado',0)
        ->get();
        return $result;
    }

    function create(){
        $tipo_certificados = TipoCertificado::all();
        return view('certificado.create',compact('tipo_certificados'));
    }

    function edit($id){
        $result = Certificado::where('id',$id)->first();
        return $result;
    }

    function store(Request $request){

        //dd( $request->all() );
        Certificado::updateOrCreate([
                'id'=>$request->id,
            ],
            [
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

        $text =  ( is_null($request->id) ) ? 'Registro Exitoso' : 'Actualización Exitosa' ;
        return [
            'title'=>'Buen Trabajo',
            'text' =>$text,
            'icon' =>'success'
        ];
    }

    function destroy($id){
        Certificado::where('id',$id)->update(['eliminado'=>1]);
        return [
            'title'=>'Buen Trabajo',
            'text' =>'Registro Eliminado',
            'icon' =>'success'
        ];
    }

    function storeFirma(Request $request){
        try {
            $archivo_pfx = $request->file('archivo_pfx');
            $pfx         = file_get_contents( $archivo_pfx );
            $password    = $request->password;
            $certificate = new X509Certificate($pfx, $password);
            $pem = $certificate->export(X509ContentType::PEM);

            Certificado::where('id',$request->id)
            ->update([
                'pfx'=>$pfx,
                'password'=>$password,
                'firma' =>1
            ]);

            return [
                'title'=>'Buen Trabajo',
                'text' =>'Firma Actualizada',
                'icon' =>'success'
            ];

        } catch (\Exception $e) {
            return [
                'title'=>'Error',
                'text' =>$e->getMessage(),
                'icon' =>'error'
            ];
        }
    }


}
