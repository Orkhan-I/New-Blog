<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;



  

  
class auths extends Controller
{
    public function login(){
        return view('back.auth.login');
}
    public function loginPost(Request $request){
        if(Auth::attempt(['email'=>$request->email,'password'=>$request->password])){
            toastr()->success('ok','xos geldiniz '." ".Auth::user()->name." bey");
            return redirect()->route('admin.dashboard');
        }
        return redirect()->route('admin.login')->withErrors('xeta bas verdi!!!');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('admin.login');
    }
}