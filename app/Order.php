<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table="orders";
    protected $fillable=['id', 'user_id', 'product_id', 'color_id', 'sale_id', 'status', 'created_at', 'updated_at'];
    public function user(){return $this->belongsTo("App\User");}
    public function color(){return $this->belongsTo("App\Color");}
    public function sale(){return $this->belongsTo("App\Sale");}
    public function product(){return $this->belongsTo("App\Product");}
}
