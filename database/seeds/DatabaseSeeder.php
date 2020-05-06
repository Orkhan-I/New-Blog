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
         $this->call(CategorySeeder::class);
         $this->call(articleSeeder::class);
         $this->call(pageSeeder::class);
         $this->call(adminSeeder::class);
         $this->call(configSeeder::class);
    }
}
