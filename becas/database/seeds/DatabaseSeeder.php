<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	/*Se colocar en orden 
    	 1-Laque no dependen de otro.*/
         $this->call(UsersTableSeeder::class);
         $this->call(CategoriesTableSeeder::class);
         $this->call(TagsTableSeeder::class);
         $this->call(PostsTableSeeder::class);

         /* php artisan migrate:refresh --seed 
			refresca la base de datos e incluye los seeder
         */
    }
}
