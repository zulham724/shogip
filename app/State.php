<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class State extends Model
{
 	 protected $table = "states";
    
     protected $guarded = ["id"];
     
    public function city(){
        return $this->belongsTo('App\City');
    }
}
