<?php

use App\Models\Address;
use Illuminate\Database\Seeder;

const DUMMY_ADDRESSES = [
    [
        'address'      => 'Knesebeckstraße 75',
        'country'      => 'Germany',
        'city'         => 'Witzhave',
        'phone_number' => '02532753469',
        'name'         => 'Parent Home',
        'post_code'     => '48345',
        'first_name'   => 'Tony',
        'last_name'    => 'Stark'
    ],
    [
        'address'      => '1058  Mapleview Drive',
        'country'      => 'Germany',
        'city'         => 'Münsterappel',
        'phone_number' => '02532753469',
        'name'         => 'Home',
        'post_code'     => '48346',
        'first_name'   => 'Steve',
        'last_name'    => 'Roger'
    ],
    [
        'address'      => '4535  Larry Street',
        'country'      => 'Germany',
        'city'         => 'Ostbevern',
        'phone_number' => '02532753469',
        'name'         => 'Work',
        'post_code'     => '48344',
        'first_name'   => 'Scott',
        'last_name'    => 'Lang'
    ],
];

class AddressesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run ()
    {
        foreach (DUMMY_ADDRESSES as $address) {
            Address::create($address);
        }
    }
}
