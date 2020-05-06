<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    public function getCategoryCount(){
        return $this->hasMany('App\Models\article','category_id','id')->count();
    }
}
