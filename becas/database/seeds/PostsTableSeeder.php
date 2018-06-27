<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crea 300 post.
    	/*
			Por cada post que se cre debe existir una relacion
			en la funcion anonima se pasa de parametro el post que se esta creando App\Post $post
			Destros se usa la variable que se pasa como argumento $post
			Luego se pasa la etiqueta tags()
			attach() - Para relacionar el post con la etiqueta y se le pasa un array
    	*/
        factory(App\Post::class, 300)->create()->each(function(App\Post $post){
        	$post->tags()->attach([
        		/*Etiquetas con la que se va a relacionar*/
        		rand(1,5),
        		rand(6,14),
        		rand(14,20),
        	]);
        });

        /*ERROR. si genera un error toca ir a App\Post en este caso es post mirar el nombre en plurasr y busca el singular
        	hay se hace el cambio
			y relacionarlas con las etiquetas con un metodo que dice el error
        */

    }
}
