<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocioAlimentacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socio_alimentacion', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_fin');
            $table->date('fecha_inicio');
            $table->integer('id_usuario')->unsigned();
            $table->foreign('id_usuario')->references('id')->on('users')
                                        ->onUpdate('cascade')->onDelete('cascade');
            $table->integer('id_alimentacion')->unsigned();
            $table->foreign('id_alimentacion')->references('id')->on('alimentacion')
                                        ->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('socio_alimentacion');
    }
}
