<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Menu;
use App\Models\Order;
use App\Models\OrderItem;
use Faker\Generator as Faker;

$factory->define(OrderItem::class, function (Faker $faker) {

    return [
        'created_at' => $faker->date('Y-m-d H:i:s'),
        'updated_at' => $faker->date('Y-m-d H:i:s'),
        'order_id' => factory(Order::class),
        'menu_id' => factory(Menu::class),
        'quantity' => $faker->randomDigitNotNull,
        'price' => $faker->word
    ];
});
