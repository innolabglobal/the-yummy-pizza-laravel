<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Address;
use Faker\Generator as Faker;

$factory->define(Address::class, function (Faker $faker) {

    return [
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'first_name' => $faker->word,
        'last_name' => $faker->word,
        'address' => $faker->word,
        'city' => $faker->word,
        'post_code' => $faker->word,
        'phone_number' => $faker->word,
        'user_id' => $faker->word
    ];
});
