<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = "districts";
    
    protected $guarded = ["id"];

    public function city(){
        return $this->belongsTo('App\City');
    }
}
