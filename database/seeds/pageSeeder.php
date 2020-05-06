<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class pageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count=0;
        $pages=['about','carier','contact','new'];
        foreach($pages as $page){
            $count++;
            DB::table('pages')->insert([
                'title'=>$page,
                'content'=>'Perferendis molestias sunt aut.
                             Animi praesentium et qui non omnis 
                             et sint. Reiciendis impedit sed rerum debitis.',
                'slug'=>STR::slug($page),
                'order'=>$count,
                'image'=>'https://thumbor.forbes.com/thumbor/960x0/https%3A%2F%2Fblogs-images.forbes.com%2Falejandrocremades%2Ffiles%2F2018%2F07%2Fdesk-3139127_1920-1200x773.jpg'
                
            ]);}
    }
}
