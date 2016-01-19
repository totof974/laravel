<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/*$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});*/

$factory->define(App\Product::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence(),
        'description' => $faker->paragraph(),
        'price' => $faker->randomFloat(2),
        'brand' => $faker->word,
    ];
});



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