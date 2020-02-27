<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table="messages";
    protected $fillable=['id', 'chat_id','user_id','created_at', 'updated_at'];
     public function chat(){return $this->belongsTo("App\Chat");}
      public function user(){return $this->belongsTo("App\User");}
}
