<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() : void
    {
        $userEmails = ['admin@opencourse.net', 'test@opencourse.net'];
        $roleNames = ['admin', 'admin'];

        $userIds = User::whereIn('email', $userEmails)->pluck('user_id', 'email');
        $roleIds = Role::whereIn('role_name', $roleNames)->pluck('role_id', 'role_name');

        foreach ($userEmails as $index => $email) {
            $userId = $userIds->get($email);
            $roleId = $roleIds->get($roleNames[$index]);
            DB::table('user_roles')->insert([
                'user_id' => $userId,
                'role_id' => $roleId,
            ]);
        }
    }
}
