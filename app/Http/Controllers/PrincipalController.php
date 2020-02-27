<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Product,Image};
class PrincipalController extends Controller
{
    public function index(){
    	return view("store.index");
    }

    public function login(){
    	return view("store.loginregister.login");
    }
    public function register(){
        return view("store.loginregister.register");
    }

    public function stock(){
        $img=Image::all();
    	$pro=Product::where("status","=","1")->where("part_id","=",5)->with("images")->with("prices")->get();
    	return view("store.stock",compact("pro","img"));


    }
    public function product($id){
        $pro=Product::where("part_id","=",5)->with("images")->with("sizes")->with("prices")->find($id);
        $array= $pro->sizes->pluck("size","id");
        
        return view("store.product",compact("pro","array"));
    }

    public function sizes(){
        return view("store.sizes");
    }

}
