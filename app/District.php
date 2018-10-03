<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\City;

class District extends Model
{
    
    
    protected $guarded = ["id"];

    public function city(){
        return $this->belongsTo('App\City');
    }
}
