<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*DEPARTAMENTO*/
        Schema::create('states', function (Blueprint $table) {
            $table->increments('id');
                $table->string('codigo',50)->unique();
                $table->string('nombre',200);
                $table->text('description',250);   
                $table->string('codigo_country',50);         
            $table->timestamps();

            /*Relaciones*/
            /*Solo se coloca en la tabla de muchos en este caso es STATES se relaciona con COUNTRIES*/
            $table->foreign('codigo_country')->references('codigo')->on('countries')
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
        Schema::dropIfExists('states');
    }
}
