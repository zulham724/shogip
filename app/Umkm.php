<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\UmkmCategori;

class Umkm extends Model
{
    protected $table = "umkm";
    
     protected $guarded = ["id"];
     
    public function user(){
        return $this->belongsTo('App\User');
    }

	public function umkm_category(){
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

    public function umkmachievement(){
        return $this->hasMany('App\UmkmAchievement');
    }
}
