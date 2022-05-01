<?php

Route::get('documentos','DocumentoController@index');
Route::post('documentos/insertar','DocumentoController@insertar');
Route::post('documentos/actualizar','DocumentoController@actualizar');
Route::post('documentos/eliminar','DocumentoController@eliminar');