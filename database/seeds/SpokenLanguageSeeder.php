<?php

use Illuminate\Database\Seeder;
use App\Models\SpokenLanguage;

class SpokenLanguageSeeder extends Seeder
{
    public function run()
    {
        foreach (SpokenLanguage::$labels as $label) {
            SpokenLanguage::create(['label' => $label]);
        }
    }
}
