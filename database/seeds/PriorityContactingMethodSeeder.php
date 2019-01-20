<?php

use Illuminate\Database\Seeder;
use App\Models\PriorityContactingMethod;

class PriorityContactingMethodSeeder extends Seeder
{
    public function run()
    {
        foreach (PriorityContactingMethod::$labels as $label) {
            PriorityContactingMethod::create(['label' => $label]);
        }
    }
}
