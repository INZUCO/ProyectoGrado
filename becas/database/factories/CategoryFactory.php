<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {

	/*$faker crea la informacion falsa*/

	$titulo = $faker->sentence(4); /*Oracion con 4 palabras*/
    return [ 
        //Estructura de la tabla
        
        'name' => $titulo,
        'slug' => str_slug($titulo),
        'body' => $faker->text(500), /*Crea un parrafo con 500 palabras*/
    ];
});
