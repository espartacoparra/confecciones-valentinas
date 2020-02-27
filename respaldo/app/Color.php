<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    protected $table="colors";
    protected $fillable=['id', 'product_id', 'color', 'status', 'price', 'created_at', 'updated_at'];
    public function product(){return $this->belongsTo("App\Product");}
    public function orders(){return $this->hasMany("App\Order");}
}
