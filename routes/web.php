<?php

use Illuminate\Support\Facades\Route;
use App\Models\TipoCertificado;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', 'HomeController@index')->name('home');

//Sitema de Autenticación(Login,Registro, Reestablecimiento de Contraseña)
Auth::routes();


/*Route::get('documentos', function() {

    #Bloque A
    dd('prueba');
    #Bloque B

    #Bloque C

});*/

Route::get('documentos','DocumentoController@index');
Route::post('documentos/insertar','DocumentoController@insertar');
Route::post('documentos/actualizar','DocumentoController@actualizar');
Route::post('documentos/eliminar','DocumentoController@eliminar');

#User
Route::get('users','UserController@index')->name('users.index');

#Certificados
Route::get('certificados/create','CertificadoController@create')->name('certificados.create');
Route::post('certificados/store','CertificadoController@store')->name('certificados.store');

#Pruebas
Route::get('pruebas',function(){

    //Registro Tipo de Certificado
    TipoCertificado::create(
        [
        'nombre'=>'Persona Natural',
        'descripcion'=>'Certificado para persona Natural con DNI'
        ]
    );

    TipoCertificado::create(
        [
            'nombre'=>'Persona Juridica',
            'descripcion'=>'Certificado para Responsable de Persona Juridica'
        ]
    );

    dd('okey');


});





