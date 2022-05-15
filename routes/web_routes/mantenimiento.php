<?php 

#Certificados
Route::prefix('mantenimientos')->middleware('auth')->group(function () {
	
	Route::name('certificados.')->group(function () {
		Route::get('certificados','CertificadoController@index')->name('index');
		Route::get('certificados/edit/{id}','CertificadoController@edit')->name('edit');
		Route::get('certificados/create','CertificadoController@create')->name('create');
		Route::post('certificados/store','CertificadoController@store')->name('store');
		Route::delete('certificados/destroy/{id}','CertificadoController@destroy')->name('destroy');
		Route::post('certificados/store_firma','CertificadoController@storeFirma')->name('store_firma');
	});

});

