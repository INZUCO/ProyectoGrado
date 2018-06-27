<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNeigborhoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*BARRIO*/
        Schema::create('neigborhoods', function (Blueprint $table) {
            $table->increments('id');
                $table->string('codigo',50)->unique();
                $table->string('nombre',200);
                $table->text('description',250);   
                $table->string('codigo_corregimiento',50);              
            $table->timestamps();

            /*Relaciones*/
            /*Solo se coloca en la tabla de muchos en este caso es MUNICIPALITIES se relaciona con STATES*/
            $table->foreign('codigo_corregimiento')->references('codigo')->on('corregimientos')
                  ->onDelete('cascade')
                  ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('neigborhoods');
    }
}
