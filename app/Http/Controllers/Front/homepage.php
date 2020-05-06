<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\article;
use App\Models\page;
use App\Models\contact;
use App\Models\config;
use DB;
use Validator;
use Mail;
class homepage extends Controller
{
    public function __construct(){
        if(Config::find(1)->active==0){
            return redirect()->to('sayt')->send();
        }

        view()->share('pages',Page::orderBy('order','ASC')->get());
        view()->share('categories',Categories::inRandomOrder()->get());
        view()->share('contacts',Contact::all());
        view()->share('config',Config::find(1));
        view()->share('count',Contact::count());
       
    }
    public function index(){
        $data['articles']=Article::where('status',1)->orderBy('created_at','DESC')->paginate(2);
        return view('front.homepage',$data);
    }

    public function single($category,$slug){
        $category=Categories::whereSlug($category)->first() ?? abort(403,"YOXDUR");
        $article=Article::whereSlug($slug)->whereCategoryId($category->id)->first() ?? abort(403,"YOXDUR");
        $article->increment('hit');
        $data['article']=$article;


        $data['categories']=Categories::inRandomOrder()->get();
        return view('front.singlepage',$data);
    }

    public function category($slug){
        $data['categories']=Categories::get();
        $category=Categories::whereSlug($slug)->first() ?? abort(403,"YOXDUR");
        $data['category']=$category;
        $data['articles']=Article::where('category_id',$category->id)->orderBy('created_at','DESC')->paginate(1);
        return view('front.category',$data);
    }

    public function page($slug){
        $page=Page::whereSlug($slug)->first() ?? abort(403,'bele sehife yoxdur' );
        $data['page']=$page;
        $data['pages']=Page::orderBy('order','ASC')->get();
        return view('front.page',$data);
    }

    public function contact(){
        
        return view('front.contact');
        
    }

    public function contactpost(Request $request){

        $rules=[
            'name'=>'required|min:5',
            'email'=>'required|email',
            'topic'=>'required',
            'message'=>'required|min:10'
        ];

        $validate=Validator::make($request->post(),$rules);

        if($validate->fails()){
            return redirect()->route('contact')->withErrors($validate)->withInput();
        }


        Mail::send([],[],function($message) use($request){
            $message->from('orxan_I_@mail.com','Blog');
            $message->to('ismayilov8958@mail.com');

            $message->setBody('Mesaj gonderen :'.$request->name.'<br>
            Mesaj gonderen Mail :'.$request->email.'<br>
            Mesaj Movzusu :'.$request->topic.'<br>
            Mesaj :'.$request->message.'<br>
            Mesaj tarixi:'.now().' ','text/html');
            $message->subject($request->name.'-in mesaji');
            
        });

        $contact=new Contact;
        $contact->name=$request->name;
        $contact->mail=$request->email;
        $contact->message=$request->message;
        $contact->topic=$request->topic;
        $contact->save();
       return redirect(route('contact'))->with('success',"Mesajiniz gonderildi. Tesekkurler !!!");
        
    }
}
