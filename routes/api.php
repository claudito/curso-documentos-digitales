<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::put('documentos',function(Request $request){

    if( $request->token !== "12345678" ){
        return "token invalido";
    }

    return [
        [
            'codigo'=>1,
            'tipo'=>'Facturas',
            'cantidad'=>200
        ],
        [
            'codigo'=>2,
            'tipo'=>'Boletas',
            'cantidad'=>180
        ]
    ];

});
