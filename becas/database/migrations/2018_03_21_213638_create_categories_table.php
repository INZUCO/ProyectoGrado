<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Tabla de categorias
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');

                $table->string('name', 128); /*string = Texto*/
                $table->string('slug', 128)->unique(); // Babosa. Para URL amigables InzucoSoft .:unique() = Unico:.
                $table->mediumText('body')->nullable(); // nullable = NO es requerido   

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
        Schema::dropIfExists('categories');
    }
}
