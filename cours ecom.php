<?php


// my sql par le terminal

php artisan make:model Category// cree modele





namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "category";

    public $timestamps = false; // representation table ds mysql ds Category
}




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
        factory(App\Category::class, 2)->create();
    }
}
// DatabaseSeeder : peupler la db



$factory->define(App\Category::class, function (Faker\Generator $faker) {
    $faker = Faker\Factory::create('fr_FR');

    $sourceImage = $faker->imageUrl(500, 500, 'fashion', true, 'Faker');
    $destination = public_path().'/uploads/categories';
    $NameImage = str_random(20).'.jpg';

    copy($sourceImage, $destination.'/'.$NameImage);


    return [
        'name' => $faker->sentence(),
        'description' => $faker->realtext(),
        'image' => $NameImage,
        'position' => $faker->unique()->randomDigit,
    ];
});

//ModelFactory : usine a catégorie


