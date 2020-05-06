<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\config;
use STR;

class configController extends Controller
{
    public function index(){
            $config=Config::find(1);
            return view('back.config.index',compact('config'));

    }

    public function update(Request $request){
        $config=Config::find(1);
        $config->title=$request->title;
        $config->active=$request->status;
        $config->facebook=$request->facebook;
        $config->instagram=$request->instagram;
        $config->youtube=$request->youtube;
        $config->github=$request->github;

        

        if($request->hasFile('logo')){
            $logo=Str::slug($request->title)."-logo-".$request->logo->getClientOriginalExtension();
            $request->logo->move(public_path('uploads'),$logo);
            $config->logo='uploads/'.$logo;
         }

         if($request->hasFile('favicon')){
            $favicon=Str::slug($request->title)."-logo-".$request->favicon->getClientOriginalExtension();
            $request->favicon->move(public_path('uploads'),$favicon);
            $config->favicon='uploads/'.$favicon;
         }
        $config->save();
        toastr()->success('guncellendi');
        return redirect()->back();
    }
}
