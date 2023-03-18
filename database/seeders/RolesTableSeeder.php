<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() : void
    {
        $roles = [
            ['role_name' => 'admin', 'display_name' => 'Administrator'],
            ['role_name' => 'org_admin', 'display_name' => 'Organization Administrator'],
            ['role_name' => 'instructor', 'display_name' => 'Instructor'],
            ['role_name' => 'student', 'display_name' => 'Student'],
        ];

        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
