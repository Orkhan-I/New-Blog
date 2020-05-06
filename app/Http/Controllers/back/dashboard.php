<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\article;
use App\Models\categories;
use App\Models\page;

class dashboard extends Controller
{
    public function index(){
        $articles=Article::count();
        $article=Article::sum('hit');
        $pages=Page::count();
        $category=Categories::count();
        return view('back.dashboard',compact(['articles','pages','category','article']));
    }
}
