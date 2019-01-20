<?php

use Illuminate\Database\Seeder;
use App\Models\CustomerType;

class CustomerTypeSeeder extends Seeder
{
    public function run()
    {
        foreach (CustomerType::$types as $type) {
            CustomerType::create(['type' => $type]);
        }
    }
}
