<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //La ruta y que se creen 20 usuarios.

        factory(App\Tag::class, 20)->create();
        
    }
}
