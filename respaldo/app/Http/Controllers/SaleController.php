<?php

namespace App\Http\Controllers;

use App\{Sale,Product,Order,Size,Chat,Message};
use Illuminate\Http\Request;

class SaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $t="changeval";
        $rutarealtime=(string)action("SaleController@realtime");
        $rutashowproduct=(string)action("SaleController@showproduct",$t);
        $rutadelorder=(string)action("SaleController@delorder",$t);
        $rutashowchat=(string)action("SaleController@showchat",$t);
        return view("admin.sale.index",compact("t","rutarealtime","rutashowproduct","rutadelorder","rutashowchat"));

    }
    public function realtime()
    {
        $values=Sale::where("status","=",0)->with("orders")->with("user")->get();

        return $values;
    }

    public function showproduct($id){
        $sale= Sale::with("pdf")->find($id);
        $order = Order::where("sale_id","=",$id)->with("product")->with("sale")->with("user")->first();

        $idpro= $order->product->id;
        $pro =Product::with('prices')->with('part')->with("images")->find($idpro);
        
        
        return view("admin.sale.showproduct",compact("order","pro","sale"));
    }

    public function orderspay(){
         $t="changeval";
        $rutarealtime=(string)action("SaleController@realtimeorderspay");
        $rutashowproduct=(string)action("SaleController@showproduct",$t);
        $rutashowchat=(string)action("SaleController@showchat",$t);
        return view("admin.sale.orderspay",compact("t","rutarealtime","rutashowproduct","rutashowchat"));
    }

     public function realtimeorderspay()
    {
        $values=Sale::where("status","=",1)->with("orders")->with("user")->get();

        return $values;
    }

    public function productspay(){
         $t="changeval";
        $rutarealtime=(string)action("SaleController@realtimeproductspay");
        $rutashowproduct=(string)action("SaleController@showproduct",$t);
        $rutasend=(string)action("SaleController@send",$t);
        $rutashowchat=(string)action("SaleController@showchat",$t);
        return view("admin.sale.productspay",compact("t","rutarealtime","rutashowproduct","rutasend","rutashowchat"));
    }

     public function realtimeproductspay()
    {
        $values=Sale::where("status","=",2)->with("orders")->with("user")->get();

        return $values;
    }
    public function send($id){
        $sale=Sale::where("id","=",$id)->first();
        $sale->status=3;
        $sale->save();
        return redirect()->action('SaleController@productssend');
    
    }

    public function productssend(){
         $t="changeval";
        $rutarealtime=(string)action("SaleController@realtimeproductssend");
        $rutashowproduct=(string)action("SaleController@showproduct",$t);
        return view("admin.sale.productssend",compact("t","rutarealtime","rutashowproduct"));
    }

     public function realtimeproductssend()
    {
        $values=Sale::where("status","=",3)->with("orders")->with("user")->get();

        return $values;
    }

    //marcarca el producto como en preparacion y edireciona a la vista del producto
     
     public function showproductpay($id){
        $sale= Sale::with("pdf")->find($id);
        $order = Order::where("sale_id","=",$id)->with("product")->with("sale")->with("user")->first();
        $idpro= $order->product->id;
        $pro =Product::with('prices')->with('part')->with("images")->find($idpro);
        
        
        return view("admin.sale.showproduct",compact("order","pro","sale"));
    }
    public function verificatepay($id){
        $sale= Sale::find($id);
        $sale->status=2;
        $sale->save();
        $sale= Sale::with("pdf")->find($id);
        $order = Order::where("sale_id","=",$id)->with("product")->with("sale")->with("user")->first();

       return redirect()->action("SaleController@productspay");
    }
//ruta para eliminar  un pedido
    public function delorder($id){

        $order = Order::where("sale_id","=",$id)->first();
        
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
    return redirect()->back();
    }

    //controlador para mostrar pdf de pedidos en cola para envio
    public function pdfproductspay(){
        $sales=Sale::where("status","=",2)->with("pdf")->with("orders")->with("user")->get();
        $cont=0;
        
        foreach ($sales as  $v) {
          $cont++;  
        }
        for ($i=0; $i < $cont ; $i++) { 
             $sales[$i]->product= Product::where("id","=",$sales[$i]->orders[0]->product_id)->first();  
           }   
       
       
          
            $pdf = \PDF::loadView('admin.sale.pdfproductspay',['sales'=>$sales]); 
           return $pdf->stream('factura.pdf');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //$pro=Product::where("part_id","!=",5)->with("images")->with("prices")->with("part")->get();
        
        //$value=0;
        /*foreach ($pro as $product) {
            foreach ($product->prices as $price) {
                $value+=$price->price;
            }
        }
        
        $sale= new Sale();
        $sale->user_id=\Auth::user()->id;
        $sale->status=1;
        $sale->price=$value;
        $sale->save();

        foreach ($pro as $product) {
            $order= new order();
            $order->user_id=\Auth::user()->id;
            $order->product_id=$product->id;
            $order->color_id=1;
            $order->sale()->associate($sale);
            $order->status=1;
            $order->save();
        }*/
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function show(sale $sale)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function edit(sale $sale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, sale $sale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\sale  $sale
     * @return \Illuminate\Http\Response
     */
    public function destroy(sale $sale)
    {
        //
    }

    public function salestock(Request $request,$id){

        $pro=Product::with("prices")->with("sizes")->find($id);
        
        $c=0;
        $array= $pro->sizes;
        foreach ($array as  $value) {
            $c++;
        }
       $a=0;
        for ($i=0; $i < $c ; $i++) { 
          
           if ($pro->sizes[$i]->id == $request->size && $request->size == $pro->sizes[$i]->pivot->size_id && $pro->sizes[$i]->pivot->value  > 0 ) {

                $val=$pro->sizes[$i]->pivot->value - 1;
                $pro->sizes()->detach($request->size);
                $pro->sizes()->attach([$request->size=>["value"=>$val]]);
           }else{
           $a++;
           }
           
           
        }
        if ($a == $c) {
            return redirect()->action("PrincipalController@stock");
        }else{
        $size =Size::find($request->size);
        $sale= new Sale();
        $sale->user_id=\Auth::user()->id;
        $sale->status=0;
        $sale->price=$pro->prices[0]->price;
        $sale->save();
        $order= new order();
        $order->user_id=\Auth::user()->id;
        $order->product_id=$id;
        $order->size=$size->size;
        $order->sale()->associate($sale);
        $order->status=1;
        $order->save();
        $chat= new Chat();
        $chat->sale()->associate($sale);
        $chat->save();
        return redirect()->action("UserPorfileController@orders");
        }
    }



    public function showchat($id){

   $sale= Sale::where("id","=",$id)->with("chat")->first();

   
    $message= Message::where("chat_id","=",$sale->chat->id)->with("user")->get();
    $t="changeval";
        $rutarealtime=(string)action("SaleController@realtimeshowchat",$id);
        $rutasendmessage=(string)action("UserPorfileController@sendmessage");
    return view("admin.sale.chat",compact("rutarealtime","sale","message","rutasendmessage"));
   }

    public function realtimeshowchat($id){
    $sale= Sale::where("id","=",$id)->with("chat")->first();
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
