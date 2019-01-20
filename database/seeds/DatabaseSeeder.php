<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(ContactTypeSeeder::class);
        $this->call(CustomerTypeSeeder::class);
        $this->call(PriorityContactingMethodSeeder::class);
        $this->call(SecondaryContactingMethodSeeder::class);
        $this->call(SpokenLanguageSeeder::class);
    }
}
