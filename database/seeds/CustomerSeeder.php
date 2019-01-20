<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        factory(User::class, 10)->each(function ($user) {
            $user->role_id = Role::where('role', Role::CUSTOMER_ROLE)->first()->id;
        });
    }
}
