<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'email' => 'admin@mail.com',
            'name' => 'admin',
            'password' => bcrypt('admin'),
            'role_id' => Role::where('role', Role::USER_ROLE)->first()->id
        ]);
    }
}
