<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\article;
use Illuminate\Support\Str;

class categoryController extends Controller
{
    public function index(){
        $categories=Categories::all();
        return view('back.categories.index',compact('categories'));
    }

    public function getData(Request $request){
        $category=Categories::findorFail($request->id);
       return response()->json($category);
    }





    public function switch(Request $request){
        $category=Categories::findorFail($request->id);
        $category->status=$request->statu==true ? 1: 0;
        $category->save();
    }

    public function createCategory(Request $request){
        $isExist=Categories::whereSlug(Str::slug($request->name));
        if($isExist){
            toastr()->error('bu kateqoriya artiq movcuddur');
            return redirect()->back();
        }
       $category=new Categories;
       $category->name=$request->name;
       $category->slug=STR::slug($request->name);
       $category->save();
       toastr()->success('elave edildi');
       return redirect()->back();
    }
    

    public function updateCategory(Request $request){
        $isSlug=Categories::whereSlug(Str::slug($request->slug))->whereNotIn('id',[$request->id])->first();
        $isName=Categories::whereName($request->category)->whereNotIn('id',[$request->id])->first();
        if($isSlug or $isName){
            toastr()->error('bu kateqoriya artiq movcuddur');
            return redirect()->back();
        }
       $category=Categories::find($request->id);
       $category->name=$request->category;
       $category->slug=STR::slug($request->slug);
       $category->save();
       toastr()->success('Yenilendi');
       return redirect()->back();
    }



    public function deleteCategory(Request $request){
        $category=Categories::findorFail($request->id);
        if($category->id==1){
            toastr()->error('bu siline bilmez');
            return redirect()->back();
        }
$message='';
        $count=$category->getCategoryCount();
        if($count>0){
            Article::where('category_id',$category->id)->update(['category_id'=>1]);
            $defaulCategory=Categories::find(1);
            $message="Bu kateqoriyaya aid meqaleler ".$defaulCategory->name."-e yuklendi";
        
    
    }
    $category->delete();
    toastr()->success('Silindi!',$message);
    return redirect()->back();
}
}
