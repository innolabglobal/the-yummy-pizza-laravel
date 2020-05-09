<?php

use App\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class SuperAdminUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::firstOrCreate(['name' => 'super-admin']);
        Role::firstOrCreate(['name' => 'user']);

        $superAdmin = User::firstOrCreate(
            [
                'email' => "superadmin@gmail.com",
            ],
            [
                'name' => "Super Admin",
                'email' => "superadmin@gmail.com",
                'password' => bcrypt('Test1234'),
            ]
        );
        

        User::all()->each(function (User $user) {
           $user->assignRole('user');
        });

        $superAdmin->assignRole('super-admin');
    }
}
