<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
     protected $table="chats";
    protected $fillable=['id', 'sale_id','created_at', 'updated_at'];
     public function sale(){return $this->belongsTo("App\Sale");}
     public function messages(){return $this->hasMany("App\Message");}
}