<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    protected $table="sales";
    protected $fillable=['id', 'user_id', 'status', 'price', 'created_at', 'updated_at'];
    public function orders(){return $this->hasMany("App\Order");}
    public function user(){return $this->belongsTo("App\User");}
    public function pdf(){return $this->hasMany('App\Pdf');}
    public function chat(){return $this->hasOne('App\Chat');}
}
