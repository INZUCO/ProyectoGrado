<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScholarshipStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*Etsado demlas becas*/
        Schema::create('scholarship_statuses', function (Blueprint $table) {
            $table->increments('id');
                $table->string('codigo',50)->unique();
                $table->string('nombre',200);
                $table->text('description',250);                
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
        Schema::dropIfExists('scholarship_statuses');
    }
}
