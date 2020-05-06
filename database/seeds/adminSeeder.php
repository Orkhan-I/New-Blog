<?php

use Illuminate\Database\Seeder;

class adminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name'=>"Orxan",
            'email'=>'orxan6514@gmail.com',
            'password'=>bcrypt('orxan547') 
        ]);
    }
}
