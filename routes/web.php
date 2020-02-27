<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();





//rutas admin*************************************************
Route::group(["prefix"=>"admin","middleware"=>['auth','Admin']],function(){
	Route::get('/main', 'AdminController@main');
//rutas de las partes
Route::resource("parts","PartController");
Route::get('/partsrealtime', 'PartController@realtime');	
Route::get('/partdestroy/{id}', 'PartController@destroy');
//ruta de los productos(arma tu bralette)
Route::resource("/products","ProductController");
Route::get("/productsrealtime","ProductController@realtime");
Route::get('/productdestroy/{id}', 'ProductController@destroy');
//ruta de las exitencias
Route::resource("/stock","StockController");
Route::get("/stockrealtime","StockController@realtime");
Route::get('/stockdestroy/{id}', 'StockController@destroy');
Route::get("/stockaddimg/{id}","StockController@addimg");
Route::post("/stock/{id}/imgstore","StockController@imgstore");
Route::get("/stockdeleteimg/{id}","StockController@deleteimg");
Route::get("/stockdelimg/{id}","StockController@delimg");
Route::get("/stockeditimg/{id}","StockController@editimg");
Route::post("/stockupdateimg/{id}/idp/{idp}","StockController@updateimg");
Route::get("/stockcreatevalue/{id}","StockController@createvalue");
Route::post("/stock/{id}/storevalue","StockController@storevalue");
//user route
Route::resource("/user","UserController");
Route::get("/userrealtime","UserController@realtime");
Route::get("/userdestroy/{id}","UserController@destroy");
Route::get("/useractivate/{id}","UserController@activate");
//rutas sale
Route::resource("/sale","SaleController");
//pedidos sin recibo de pago
Route::get("/salerealtime","SaleController@realtime");
//pedidos con recibo de pago
Route::get("/orderspay","SaleController@orderspay");
Route::get("/salerealtimeorderspay","SaleController@realtimeorderspay");
//pedidos con pago verificado
Route::get("/productspay","SaleController@productspay");
Route::get("/salerealtimeproductspay","SaleController@realtimeproductspay");
//rutas para productos enviados
Route::get("/productssend","SaleController@productssend");
Route::get("/productssend/{id}","SaleController@send");
Route::get("/salerealtimeproductssend","SaleController@realtimeproductssend");
//ruta que confirma el pago y redirecciona al producto

Route::get("/saleverificatepay/{id}","SaleController@verificatepay");
//Route::post("/salestock/{id}","SaleController@salestock");
//cotrolador que muestra el prooducto que no esta verificado
Route::get("/saleshowproduct/{id}","SaleController@showproduct");
//cotrolador que muestra el prooducto que esta verificado
Route::get("/saleshowproductpay/{id}","SaleController@showproductpay");
//elimina producto sin confirmacion de pago
Route::get("/saledelorder/{id}","SaleController@delorder");
//rutas de reportes pdf
Route::get("/pdfproductspay","SaleController@pdfproductspay");
//ruta del chat
Route::get("/saleshowchat/{id}","SaleController@showchat");
//chat admin 
Route::get("/salerealtimeshowchat/{id}","SaleController@realtimeshowchat");	

});
//*************************************************
Route::group(["middleware"=>'auth'],function(){
	Route::post("/salestock/{id}","SaleController@salestock");
	Route::get("/userporfile","UserPorfileController@index");
	Route::get("/userorders","UserPorfileController@orders");
	Route::get("/userreadyorders","UserPorfileController@readyorders");
	Route::get("/userpreparation","UserPorfileController@preparation");
	Route::get("/userpayorder/{id}","UserPorfileController@payorder");
	//eliminar las ordenes que no han sido pagadas
	Route::get("/userdelorder/{id}","UserPorfileController@delorder");
	//marcar productos como recividos
	Route::get("/userreceivedorder/{id}","UserPorfileController@received");
	Route::post("/userpayorderstore/{id}","UserPorfileController@payorderstore");
	//mostra ela vista con el chat de acuerdo al producto
	Route::get("/showchat/{id}","UserPorfileController@showchat");
	//realime del chat
	Route::get("/realtimeshowchat/{id}","UserPorfileController@realtimeshowchat");	
	//enviar mensaje
	Route::post("/sendmessage","UserPorfileController@sendmessage");
	
});

Route::get("/","PrincipalController@index");



//paginas libres
Route::get("/principal","PrincipalController@stock");
Route::get("/principal/product/{id}","PrincipalController@product");
//ruta de como tomar la medidas
//index de la pagina
Route::get("/sizes","PrincipalController@sizes");
//login route
Route::get("/login","Auth\LoginController@showloginform");
Route::get("/logout","Auth\LoginController@logout");
Route::post("/login","Auth\LoginController@login")->name("login"); 
//regitro rutas
Route::get("/register","Auth\RegisterController@showregister");
Route::post("/register","Auth\RegisterController@register")->name("register");
