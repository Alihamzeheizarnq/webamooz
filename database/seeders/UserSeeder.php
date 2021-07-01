<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'lastname' => 'admin',
            'role' => 'superAdmin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456789'),
            'mobile' => '09123456789'
        ]);
        User::create([
            'name' => 'علی',
            'lastname' => 'حمزه ای',
            'role' => 'admin',
            'email' => 'ali@gmail.com',
            'password' => bcrypt('123456789'),
            'mobile' => '09123456789'
        ]);

    }
}
