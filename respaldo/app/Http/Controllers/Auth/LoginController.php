<?php

namespace App\Http\Controllers\Auth;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
   public function __construct(){
        $this->middleware('guest',['only'=>'showloginform']);
    }

    public function showloginform(){
        return view("store.loginregister.login");
    }
    public function login(){
        $credentials=$this->validate(request(),[
            "email"=>"email|string|required",
            "password"=>"required|string"
        ]);
       

       if (Auth::attempt($credentials)) {
            return redirect()->action("UserController@index");
        }else{
             return back()->withErrors(['email'=>'Estas credenciales no coinciden con las de nuestras bases de datos'])->withInput(request(["email"]));
        }

    }
    public function logout(){
            Auth::logout();
            return redirect()->action("PrincipalController@index");
    }
}
/*public function __construct(){
        //$this->middleware('guest',['only'=>'showloginform']);
    }

    public function showloginform(){
        return view("store.loginregister.login");
    }
    public function login(){
        $credentials=$this->validate(request(),[
            "email"=>"email|string|required",
            "password"=>"required|string"
        ]);
       

       if (Auth::attempt($credentials)) {
            return redirect()->action("AdminController@main");
        }else{
             return back()->withErrors(['email'=>'Estas credenciales no coinciden con las de nuestras bases de datos'])->withInput(request(["email"]));
        }
    }*/