<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            // Tabla de publicaciones
            $table->increments('id');
                
                $table->integer('user_id')->unsigned(); // unsigned ||| Sin signo. InzucoSoft
                $table->integer('category_id')->unsigned(); 
               
                $table->string('name', 128); 
                $table->string('slug', 128)->unique();
              
                $table->mediumText('excerpt')->nullable(); // Estracto
                $table->text('body');
                $table->enum('status', ['PUBLISHED', 'DRAFT'])->default('DRAFT'); // Estado. Permite constantes defecto que sea borrador.    
               
                $table->string('file', 200)->nullable();   
            $table->timestamps();


            /*
                Relation - Relacines
            */
            //Tabla ususario
                /*Un usuario tiene muchos post*/
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            //Tabla categoria
                /*Un Categoria tiene muchos post*/
            $table->foreign('category_id')->references('id')->on('categories')
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
        Schema::dropIfExists('posts');
    }
}
