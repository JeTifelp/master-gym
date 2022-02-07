<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMensualidadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mensualidad', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_fin');
            $table->date('fecha_inicio');
            $table->double('monto',5,1);
            $table->integer('id_promocion')->unsigned();
            $table->foreign('id_promocion')->references('id')->on('promocion')
                                        ->onUpdate('cascade')->onDelete('cascade');
            $table->integer('id_usuario')->unsigned();
            $table->foreign('id_usuario')->references('id')->on('users')
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
        Schema::dropIfExists('mensualidad');
    }
}
