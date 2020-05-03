<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\menu;
use Faker\Generator as Faker;

$factory->define(menu::class, function (Faker $faker) {

    return [
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'name' => $faker->word,
        'description' => $faker->text,
        'image' => $faker->word
    ];
});
