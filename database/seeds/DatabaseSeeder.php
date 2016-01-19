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
        // $this->call(UserTableSeeder::class);
        /*
        DB::table('product')->insert([
            'title' => 'Ceci est un titre de produit',
            'description' => 'lorem ipsum',
            'price' => 12,
            'brand' => 'nouvelle marque',
        ]);
        */

        //factory(App\Product::class, 2)->create();
        factory(App\Category::class, 3)->create();
    }
}
