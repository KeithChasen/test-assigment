<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class CustomerSeeder extends Seeder
{
    public function run()
    {
        factory(User::class, 10)->create();
    }
}
