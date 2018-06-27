<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //La ruta y que se creen 29 usuarios.

        factory(App\User::class, 29)->create();

        /*Crear mi usuario el 30 soy yop*/
        App\User::create([
        	'name' 		=> 'Inocencio Zuñiga',
        	'email' 	=> 'izuniga@misena.edu.co',
        	'password' 	=> bcrypt('inzuco')
        ]);
        
    }
}
