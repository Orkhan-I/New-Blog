<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category=['Esas','eylence','texnologiya','idman','saglamliq','heyat terzi'];
        foreach($category as $categories){
            STR::slug($categories);
            DB::table('categories')->insert([
                'name'=>$categories,
                'slug'=>STR::slug($categories) 
            ]);
        }
       
    }
}
