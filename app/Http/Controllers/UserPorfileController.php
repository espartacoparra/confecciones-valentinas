<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Sale,Order,Product,Pdf,Size,User,Message,Chat};
use App\Http\Requests\PdfRequest;
use Illuminate\Support\Facades\Validator;
class UserPorfileController extends Controller
{
    public function index(){
        $user= User::find(\Auth::user()->id);
    	return view("store.userporfile.index",compact("user"));
    }
    //pedidos sin cancelar
    public function orders(){
    	
    	$sale= Sale::where("user_id",'=',\Auth::user()->id)->where("status","=",0)->with("orders")->paginate(10);
    	
    
    	return view("store.userporfile.orders",compact("sale"));
    }
    //pedidos en espera de confirmacion
     public function preparation(){
        
        
        $sale= Sale::where("user_id",'=',\Auth::user()->id)->where("status","=",1)->with("orders")->paginate(10);
        
    
        return view("store.userporfile.preparation",compact("sale"));
    }
   
    //pedidos listos
    public function readyorders(){
        
        $sale= Sale::where("user_id",'=',\Auth::user()->id)->where("status","=",2)->with("orders")->paginate(10);
        
    
        return view("store.userporfile.raedyorders",compact("sale"));
    }
    //pagina para pagar pedido
     public function payorder(Request $request,$id){
        
         $order = Order::where("sale_id","=",$id)->where("user_id","=",\Auth::user()->id)->with("product")->with("sale")->with("user")->first();
         
        $idpro= $order->product->id;
        $pro =Product::with('prices')->with("images")->find($idpro);
        
    
        return view("store.userporfile.payorder",compact("order","pro"));
    }
    public function delorder($id){
        
        $order = Order::where("sale_id","=",$id)->where("user_id","=",\Auth::user()->id)->first();
        $pro=Product::with("sizes")->find($order->product_id);
        
        $c=0;
        $array= $pro->sizes;
        foreach ($array as  $value) {
            $c++;
        }
        $size= Size::where("size","=", $order->size)->first();
        
      
     
        for ($i=0; $i < $c ; $i++) { 
          
           if ($pro->sizes[$i]->pivot->product_id == $order->product_id && $size->id == $pro->sizes[$i]->pivot->size_id) {
                $val=$pro->sizes[$i]->pivot->value + 1;
                
                $pro->sizes()->detach($size->id);
                

                $pro->sizes()->attach([$size->id=>["value"=>$val]]);

           }
        }
        $order->delete();
        $sale= Sale::find($id);
        $sale->delete();
    return redirect()->action('UserPorfileController@orders');
    }

    public function payorderstore(PdfRequest $request,$id){
            $sale=Sale::find($id);
            $sale->status=1;
            $sale->save();

        $file= $request->file("pdf");
         $na = "recibos".rand().time().$file->getClientOriginalName();
        $pdf= new Pdf();
        $pdf->direction=$request->direction;
        $pdf->pdf=$na;
         $pdf->sale()->associate($sale);
        $pdf->save();
        $path= public_path()."/recibos";
        $file->move($path,$na);
        
    	return redirect()->action('UserPorfileController@preparation');
    }

    public function received($id){
        $sale=Sale::where("id","=",$id)->where("user_id","=",\Auth::user()->id)->first();
        $sale->status=3;
        $sale->save();
        return redirect()->action('UserPorfileController@readyorders');
    }
   

   public function showchat($id){

   $sale= Sale::where("id","=",$id)->where("user_id","=",\Auth::user()->id)->with("chat")->first();

   
    $message= Message::where("chat_id","=",$sale->chat->id)->with("user")->get();
    $t="changeval";
        $rutarealtime=(string)action("UserPorfileController@realtimeshowchat",$id);
        $rutasendmessage=(string)action("UserPorfileController@sendmessage");
    return view("store.userporfile.chat",compact("rutarealtime","sale","message","rutasendmessage"));
   }

    public function realtimeshowchat($id){
    $sale= Sale::where("id","=",$id)->where("user_id","=",\Auth::user()->id)->with("chat")->first();
    $message= Message::where("chat_id","=",$sale->chat->id)->with("user")->get();
    return $message;
    }

    public function sendmessage(Request $request){
       
      
        $message= new Message();
        $message->chat_id=$request->chat_id;
        $message->user_id=$request->user_id;
        $message->message=$request->message;
        $message->save();
    }
}
