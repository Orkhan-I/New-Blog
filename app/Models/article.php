<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class article extends Model
{
    use SoftDeletes;
    function getCategory(){
        return $this->hasOne('App\Models\Categories','id','category_id');
    }

    function getCategoryCount(){}
}
