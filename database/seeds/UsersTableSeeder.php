<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run ()
    {
        for ($i = 0; $i < 5; $i++) {
            DB::table('users')->insert([
                'name'     => "user 00$i",
                'email'    => "user00$i@gmail.com",
                'password' => bcrypt('Test1234'),
            ]);
        }
    }
}
