<?php

use Illuminate\Database\Seeder;
use App\Models\ContactType;

class ContactTypeSeeder extends Seeder
{
    public function run()
    {
        foreach (ContactType::$labels as $label) {
            ContactType::create(['label' => $label]);
        }
    }
}
