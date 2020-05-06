<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\page;
use App\Models\contact;
use Illuminate\Support\Str;

class pageController extends Controller
{
    public function index(){
        $pages=Page::all();
        return view('back.pages.index',compact('pages'));
    }

    public function pageSwitch(Request $request){
        $page=Page::findorFail($request->id);
        $page->status=$request->statu==true ? 1: 0;
        $page->save();
    }

    public function createPage(){
       
        return view('back.pages.create');
    }

    public function createPagePost(Request $request){
        $request->validate([
            'title'=>'min:3',
            'image'=>'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $last=Page::orderBy('order','DESC')->first();
        
          $page=new Page;
         $page->title=$request->title;
         $page->content=$request->content;
         $page->order=$last->order+1;
         $page->slug=Str::slug($request->title);
 
         if($request->hasFile('image')){
            $imageName=Str::slug($request->title).".".$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$imageName);
            $page->image='uploads/'.$imageName;
         }
     $page->save();
 
     toastr()->success('pages','Elave olundu...');
         
     return redirect()->route('admin.page.index');
   
    }

    public function updatePage($id){
        $page=Page::findOrFail($id);
        return view('back.pages.update',compact('page'));
    }
    public function updatePost(Request $request,$id){
        $request->validate([
            'title'=>'min:3',
            'image'=>'image|mimes:jpeg,png,jpg|max:2048'
        ]);
        
          $page=Page::findorFail($id);
         $page->title=$request->title;
         $page->content=$request->content;
         $page->slug=Str::slug($request->title);
 
         if($request->hasFile('image')){
            $imageName=Str::slug($request->title).".".$request->image->getClientOriginalExtension();
            $request->image->move(public_path('uploads'),$imageName);
            $page->image='uploads/'.$imageName;
         }
     $page->save();
 
     toastr()->success('pages','Yenilendi...');
         
     return redirect()->route('admin.page.index');
    }

    public function deletePage($id){
        Page::find($id)->delete();
        toastr()->success('Silindi...');
        return redirect()->route('admin.page.index');
    }

    public function orders(Request $request){
        $b=$request->get('page');
        foreach($b as $key => $order){
            Page::update(['order'=>$key])->where('id',$order);
        }
    }


    public function messages(){
        $contacts=Contact::all();
        return view('back.pages.messages',compact('contacts'));
    }
    public function deleteMessages($id){
        Contact::find($id)->delete();
        toastr()->success('Silindi...');
        return redirect()->route('admin.message');
    }
}
