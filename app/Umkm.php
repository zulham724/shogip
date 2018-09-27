<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Umkm extends Model
{
    protected $table = "umkm";
    
     protected $guarded = ["id"];
     
    public function user(){
        return $this->belongsTo('App\User');
    }

	public function umkmcategori(){
        return $this->belongsTo('App\UmkmCategori');
    }

    public function state(){
        return $this->belongsTo('App\State');    
    }

    public function city(){
        return $this->belongsTo('App\City');
    }

    public function district(){
        return $this->belongsTo('App\District');
    }
}
