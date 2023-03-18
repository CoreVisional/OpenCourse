<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() : void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@opencourse.net',
            'password' => bcrypt('password'),
            'is_admin' => true,
            'profile_picture' => 'default.png',
            'last_login' => Carbon::now()
        ]);

        User::create([
            'name' => 'Test',
            'email' => 'test@opencourse.net',
            'password' => bcrypt('test123'),
            'is_admin' => true,
            'profile_picture' => 'default.png',
            'last_login' => Carbon::now()
        ]);
    }
}
