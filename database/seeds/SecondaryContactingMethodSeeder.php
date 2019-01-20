<?php

use Illuminate\Database\Seeder;
use App\Models\SecondaryContactingMethod;

class SecondaryContactingMethodSeeder extends Seeder
{
    public function run()
    {
        foreach (SecondaryContactingMethod::$labels as $label) {
            SecondaryContactingMethod::create(['label' => $label]);
        }
    }
}
