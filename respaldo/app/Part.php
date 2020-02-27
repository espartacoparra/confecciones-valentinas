<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    protected $table="parts";
    protected $fillable=['id', 'name', 'created_at', 'updated_at'];
    public function products(){return $this->hasMany("App\Product");}
}
