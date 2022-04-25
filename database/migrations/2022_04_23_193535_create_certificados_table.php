<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()//php artisan migrate
    {
        Schema::create('certificados', function (Blueprint $table) {
            $table->id();
            $table->string('nif');//255
            $table->string('codigo_pais',20);
            $table->string('nombre_comun',300);
            $table->string('cargo',200)->nullable();
            $table->string('numero_serie',100);
            $table->unsignedBigInteger('tipo_certificado_id');
            $table->foreign('tipo_certificado_id')->references('id')->on('tipo_certificados');
            $table->index('tipo_certificado_id');
            $table->string('entidad_emisora',300);
            $table->date('fecha_inicio');
            $table->date('fecha_fin');
            $table->longText('archivo')->nullable();
            $table->string('password',300)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()//php artisan rollback
    {
        Schema::dropIfExists('certificados');
    }
}
