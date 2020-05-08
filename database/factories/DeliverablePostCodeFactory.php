<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\DeliverablePostCode;
use Faker\Generator as Faker;

$factory->define(DeliverablePostCode::class, function (Faker $faker) {

    return [
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'post_code' => $faker->postcode,
        'status' => $faker->boolean,
        'delivery_fees' => $faker->randomDigitNotNull
    ];
});
