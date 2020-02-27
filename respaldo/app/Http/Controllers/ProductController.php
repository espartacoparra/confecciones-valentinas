<?php

namespace App\Http\Controllers;

use App\{Product,User,Part,Color,Image,Price};
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $t="changeval";
        $rutaedit= (string)action("ProductController@edit",$t);
        $rutarealtime=(string)action("ProductController@realtime");
        $rutadestroy=(string)action("ProductController@destroy",$t);
        return view("admin.product.index",compact("values","t","rutaedit","rutarealtime","rutadestroy"));
    }

    public function realtime()
    {
        $values = Product::where("part_id","!=",5)->orderBy("id","ASC")->with('prices')->with('part')->get();
        return $values;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function main(){
        return view("admin.template.main");
    }



    public function create()
    {
        $parts = Part::all()->pluck("name","id");

    return view("admin.product.create",compact("parts"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product= new Product();
        $product->fill($request->all());
        $product->user_id=\Auth::user()->id;
        $product->save();
        $price= new Price();
        $price->price= $request->price;
        $price->product()->associate($product);
        $price->save();
        $image= new Image();
        $file = $request->file("image");
        $na= "parte".time().$file->getClientOriginalName().".".$file->getClientOriginalExtension();
        $image->name=$na;
        $image->product()->associate($product);
        $image->save();
        $path= public_path()."/partesProductos";
        $file->move($path,$na);
        return redirect()->action("ProductController@index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=Product::find($id);
        $product->images;
        $product->prices;
        $parts = Part::all()->pluck("name","id");
        return view("admin.product.edit",compact("parts","product"));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $file=$request->file("image");
        $product=Product::find($id);
        $product->fill($request->all());
        if ($file != null) {
            foreach ($product->images as $image) {
            $path=public_path()."/partesProductos/".$image->name;
           unlink($path);
           $image =Image::find($image->id);
           $image->name=$na = "parte".time().$file->getClientOriginalName().".".$file->getClientOriginalExtension();
           $path= public_path()."/partesProductos/";
           $file->move($path,$na);
           $image->save();
            }
        }
        $product->save();
        $price=Price::where("product_id","=",$id)->first();
        $price->price= $request->price;
        $price->save();
         return redirect()->action("ProductController@index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pro=Product::find($id);
        $pro->status=0;
        $pro->save();
        return redirect()->action("ProductController@index");
    }
}

