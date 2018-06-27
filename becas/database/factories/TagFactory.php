<?php

use Faker\Generator as Faker;

$factory->define(App\Tag::class, function (Faker $faker) {

	$titulo = $faker->unique()->word(5); /*Titulo unico y que sea una palabra de 5 caracteres*/
    return [ 
        //Estructura de la tabla
        
        'name' => $titulo,
        'slug' => str_slug($titulo),
    ];
});
