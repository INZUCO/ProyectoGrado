<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //La ruta y que se creen 20 usuarios.
        factory(App\Category::class, 20)->create();
    }
}
