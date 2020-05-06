<?php

use Illuminate\Database\Seeder;

class configSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('configs')->insert([
            'title'=>'Orxan_Blog',
            'instagram'=>'insta',
            'facebook'=>'fb',
            'created_at'=>now(),
            'updated_at'=>now()
    
         ]); 
    }
}
