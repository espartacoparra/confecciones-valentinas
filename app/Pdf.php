<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pdf extends Model
{
    protected $table="pdfs";
    protected $fillable=['id','pdf','sale_id','direction'];
    public function sale(){return $this->belongsTo('App\Sale');}
}
