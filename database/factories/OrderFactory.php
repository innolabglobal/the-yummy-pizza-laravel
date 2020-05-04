<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Order;
use App\User;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {

    return [
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'order_number' => $faker->word,
        'user_id' => factory(User::class),
        'status' => 'pending',
        'grand_total' => $faker->word,
        'item_count' => $faker->randomDigitNotNull,
        'payment_status' => $faker->word,
        'payment_method' => $faker->word,
        'first_name' => $faker->word,
        'last_name' => $faker->word,
        'address' => $faker->text,
        'city' => $faker->word,
        'country' => $faker->word,
        'post_code' => $faker->word,
        'phone_number' => $faker->word,
        'notes' => $faker->text
    ];
});
