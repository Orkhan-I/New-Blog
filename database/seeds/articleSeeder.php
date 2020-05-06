<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class articleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker::create();
        for($i=0;$i<5;$i++){
            DB::table('articles')->insert([
                'category_id'=>rand(1,7),
                'title'=>$faker->title,
                'image'=>$faker->imageUrl(800, 400,'cats',true,'Orxan Ismayil'),
                'content'=>$faker->text,
                'slug'=>STR::slug($faker->title),
                'created_at'=>$faker->dateTime('now'),
                'updated_at'=>now()
                
                
            ]);

        }
    }
}
