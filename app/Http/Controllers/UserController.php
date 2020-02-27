<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\{User};
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
    {
        $t="changeval";
        $rutaedit= (string)action("UserController@edit",$t);
        $rutarealtime=(string)action("UserController@realtime");
        $rutadestroy=(string)action("UserController@destroy",$t);
        $rutaactivate=(string)action("UserController@activate",$t);
        return view("admin.user.index",compact("values","t","rutaedit","rutarealtime","rutadestroy","rutaactivate"));
    }
     public function realtime()
    {
        $values = User::all();

        return $values;
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
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $u=User::find($id);
        $u->status="0";
        $u->save();
       
        return redirect()->action("UserController@index");
    }
    public function activate($id)
    {

        $u=User::find($id);
        $u->status="1";
        $u->save();
       
        return redirect()->action("UserController@index");
    }
}
