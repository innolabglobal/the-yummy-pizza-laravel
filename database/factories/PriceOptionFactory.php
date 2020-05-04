<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Menu;
use App\Models\PriceOption;
use Faker\Generator as Faker;

$factory->define(PriceOption::class, function (Faker $faker) {

    return [
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'name' => $faker->word,
        'value' => $faker->word,
        'menu_id' => factory(Menu::class),
    ];
});
