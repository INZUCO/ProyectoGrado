<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
	/*$faker crea la informacion falsa*/

	$titulo = $faker->sentence(4); /*Oracion con 4 palabras*/
    return [ 
        //Estructura de la tabla
        'user_id' => rand(1,30), /*Utiliza los usuarios del 1 al 30*/
        'category_id' 	=> rand(1,20), /*Usa las categorias 1,20*/
        'name'    		=> $titulo,
        'slug'    		=> str_slug($titulo),
        'excerpt' 		=> $faker->text(200), /*crea un texto de 200 caracteres*/
        'body'    		=> $faker->text(500), /*crea un texto de 500 caracteres*/
        /*Toma una imagen online con un ancho de 1200 y un alto de 400*/
        'file' 			=> $faker->imageUrl($width = 1200, $heigth = 400), 
        /*Arreglo de elementos, por defecto queda */
        'status'		=> $faker->randomElement(['DRAFT', 'PUBLISHED'])
    ];
});
