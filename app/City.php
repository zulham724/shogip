<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\State;
use App\Umkm;


class City extends Model
{   
    protected $guarded = ["id"];

    public function state(){
        return $this->belongsTo('App\State');

    }

    public function umkm(){
    	return $this->hasMany('App\Umkm');
    }

    public function districts(){
    	return $this->hasMany('App\District');
    }

}
