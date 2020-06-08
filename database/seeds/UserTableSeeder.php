<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //to create users ->run on terminal(php artisan db:seed)

        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('12345678'),
            'role' => '3'

        ]);
        $admin->assignRole('super-admin');


        $professional = User::create([
            'name' => 'professional',
            'email' => 'professional@professional.com',
            'password' => bcrypt('12345678'),
            'state' => 'free',
            'role' => '2',

        ]);
        $professional->assignRole('professional');



        $user = User::create([
            'name' => 'user',
            'email' => 'user@user.com',
            'password' => bcrypt('12345678'),
            'role' => '1'

        ]);
        $user->assignRole('user');
    }
}
