<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        foreach (Role::$roles as $role) {
            Role::create(['role' => $role]);
        }
    }
}
