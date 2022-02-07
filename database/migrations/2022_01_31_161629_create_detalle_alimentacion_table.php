<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetalleAlimentacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detalle_alimentacion', function (Blueprint $table) {
            $table->id();
            $table->integer('cantidad')->unsigned();
            $table->char('horario');
            $table->char('unidad_medida',2);
            $table->integer('id_alimento')->unsigned();
            $table->foreign('id_alimento')->references('id')->on('alimento')
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
        Schema::dropIfExists('detalle_alimentacion');
    }
}
