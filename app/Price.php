<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $table="prices";
    protected $fillable=['id', 'price',"product_id", 'created_at', 'updated_at'];
    public function product(){return $this->belongsTo("App\Product");}
}
