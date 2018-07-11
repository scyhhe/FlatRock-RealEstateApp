<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'user_role' => function() {
            if (rand(1,10) >= 5) {
                return 'user';
            } else {
                return 'broker';
            }
        },
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Home::class, function (Faker $faker) {
    return [
        'user_id' => function() {
            return factory('App\User')->create()->id;
        },
        'title' => $faker->sentence,
        'description' => $faker->paragraph,
        'price' => $faker->numberBetween($min = 50000, $max = 250000),
    ];
});

$factory->define(App\HomeImage::class, function (Faker $faker) {
    return [
        'home_id' => function() {
            return factory('App\Home')->create()->id;
        },
        'path' => $faker->imageUrl($width = 300, $height = 225)
    ];
});