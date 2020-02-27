<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table= "products";
    protected $fillable=['id', 'name', 'ubication', 'description', 'status','part_id', 'user_id','created_at','updated_at'];
    public function colors(){return $this->hasMany("App\Color");}
    public function sizes(){return $this->belongsToMany("App\Size")->withTimestamps()->withPivot('value');}
    public function images(){return $this->hasMany("App\Image");}
    public function prices(){return $this->hasMany("App\Price");}
    public function user(){return $this->belongsTo("App\User");}
    public function part(){return $this->belongsTo("App\Part");}
    public function orders(){return $this->hasMany("App\Order");}
}
