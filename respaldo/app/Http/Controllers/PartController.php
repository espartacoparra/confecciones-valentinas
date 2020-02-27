<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Part;
class PartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parts = Part::orderBy("id","ASC")->get();
        $t="changeval";
        $rutaedit= (string)action("PartController@edit",$t);
        $rutarealtime=(string)action("PartController@realtime");
        $rutadestroy=(string)action("PartController@destroy",$t);
        return view("admin.parts.index",compact("parts","t","rutaedit","rutarealtime","rutadestroy"));
    }
     public function realtime()
    {
        $parts = Part::orderBy("id","ASC")->get();
        return $parts;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
        return view("admin.parts.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $part= new Part($request->all());
        $part->save();
        return redirect()->action("PartController@index");
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
        $parts= Part::find($id);
      
        return view("admin.parts.edit",compact("parts"));
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
        $part=Part::find($id);
        $part->fill($request->all());
        $part->save();
        return redirect()->action("PartController@index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $part= Part::find($id);
      $part->delete();
      return redirect()->action("PartController@index");
    }
}
