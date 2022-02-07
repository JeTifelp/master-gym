<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocioRutinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socio_rutina', function (Blueprint $table) {
            $table->id();
            $table->date('fecha');
            $table->integer('id_usuario')->unsigned();
            $table->foreign('id_usuario')->references('id')->on('users')
                                        ->onUpdate('cascade')->onDelete('cascade');
            $table->integer('id_rutina')->unsigned();
            $table->foreign('id_rutina')->references('id')->on('rutina')
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
        Schema::dropIfExists('socio_rutina');
    }
}
