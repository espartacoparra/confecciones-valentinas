<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table="images";
    protected $fillable=['id', 'name','product_id', 'created_at', 'updated_at'];
    public function product(){return $this->belongsTo("App\Product");}
}
