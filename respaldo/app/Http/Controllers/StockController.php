<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{Product,User,Part,Color,Image,Price,Size};

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       $t="changeval";
        $rutaedit= (string)action("StockController@edit",$t);
        $rutarealtime=(string)action("StockController@realtime");
        $rutadestroy=(string)action("StockController@destroy",$t);
        $rutaaddimg=(string)action("StockController@addimg",$t);
        $rutadeleteimg=(string)action("StockController@deleteimg",$t);
        $rutacreatevalue=(string)action("StockController@createvalue",$t);
        return view("admin.stock.index",compact("values","t","rutaedit","rutarealtime","rutadestroy","rutaaddimg","rutadeleteimg","rutacreatevalue"));
    }

     public function realtime()
    {
        $values = Product::where("part_id","=",5)->orderBy("id","ASC")->with('sizes')->with('part')->with('prices')->get();

        return $values;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $size= Size::all()->pluck("size","id");
        
        return view("admin.stock.create",compact("size"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $product= new Product($request->all());
        $product->part_id=5;
        $product->user_id= \Auth::user()->id;
        $product->save();
        $product->sizes()->sync($request->size);
        $price= new Price();
        $price->price= $request->price;
        $price->product()->associate($product);
        $price->save();

        foreach ($request->file("image") as $image1){  
        $image= new Image();
        $file = $image1;
        $na = "existencias".rand().time().$file->getClientOriginalName().".".$file->getClientOriginalExtension();
        $image->name=$na;
        $image->product()->associate($product);
        $image->save();
        $path= public_path()."/partesProductos";
        $file->move($path,$na);

        }
        

        return redirect()->action("StockController@index");
        


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $pro=Product::with("sizes")->with("prices")->find($id);
        $size= Size::all()->pluck("size","id");
        return view("admin.stock.edit",compact("size","pro","prosize"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $pro=Product::find($id);
         $pro->fill($request->all());
         $pro->save();
         $pro->sizes()->sync($request->size);
         $price= Price::where("product_id","=",$id)->first();
         $price->price=$request->price;
         $price->save();
        return redirect()->action("StockController@index");
        
         
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pro=Product::find($id);
        
        $pro->status=0;
        $pro->save();
        return redirect()->action("StockController@index");
    }
    //agregar imagenes*************************************
    public function addimg($id){

        $pro= Product::find($id);
        return view("admin.stock.addimg",compact("pro"));

    }

    public function imgstore(Request $request, $id){

       $pro=Product::find($id);
       foreach ($request->file("image") as $image1){  
        $image= new Image();
        $file = $image1;
        $na = "existencias".time().$file->getClientOriginalName().".".$file->getClientOriginalExtension();
        $image->name=$na;
        $image->product()->associate($pro);
        $image->save();
        $path= public_path()."/partesProductos";
        $file->move($path,$na);
        }
        return redirect()->action("StockController@index");

    }
    //******************************************************
     //eliminar imagenes*************************************
    public function deleteimg($id){

        $pro= Product::with("images")->find($id);
        return view("admin.stock.deleteimg",compact("pro"));
    }
    public function delimg($id){

        $image= Image::find($id);
        $path=public_path()."/partesProductos/".$image->name;
        unlink($path);
        $id=$image->product_id;
        $image->delete();
        return redirect()->action("StockController@deleteimg",$id);
    }
    //******************************************************
    //editar imagenes*************************************
     public function editimg($id){

        $img= Image::with("product")->find($id);
        return view("admin.stock.editimg",compact("img"));
    }
    public function updateimg(Request $request, $id,$idp){

        $image= Image::find($id);
        $path=public_path()."/partesProductos/".$image->name;
        unlink($path);
        $file=$request->file("image");
        $na = "existencias".time().$file->getClientOriginalName().".".$file->getClientOriginalExtension();
        $image->name=$na;
        $image->save();
        $path= public_path()."/partesProductos";
        $file->move($path,$na);

        return redirect()->action("StockController@deleteimg",$idp);
    }  
    //******************************************************  
    //agregar valores a la tallas*************************************
    public function createvalue($id){

        $pro =product::with("sizes")->find($id);
        return view("admin.stock.createvalue",compact("pro"));

    }

    public function storevalue(Request $request ,$id){

       
        $i=0;
        $array=[];
        $pro=Product::with("sizes")->find($id);
        
       foreach ($request->all() as $key =>  $value) {
           if ($i!=0){
                $pro->sizes()->detach($key);
               $pro->sizes()->attach([$key=>["value"=>$value]]);
           }
           $i++; 
       }
        return redirect()->action("StockController@index");

    }
}

