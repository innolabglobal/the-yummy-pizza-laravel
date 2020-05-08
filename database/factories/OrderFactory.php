<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Order;
use App\User;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {

    return [
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'order_number' => 'TPY' . uniqid(),
        'user_id' => factory(User::class),
        'status' => $faker->randomElement(['pending', 'processing', 'completed', 'decline']),
        'grand_total' => $faker->randomDigitNotNull,
        'item_count' => $faker->randomDigitNotNull,
        'payment_status' => $faker->boolean,
        'payment_method' => $faker->randomElement(['COD', 'Stripe', 'Braintree']),
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'address' => $faker->address,
        'city' => $faker->city,
        'country' => $faker->country,
        'post_code' => $faker->postcode,
        'phone_number' => $faker->phoneNumber,
        'notes' => $faker->text
    ];
});
