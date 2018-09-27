<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class City extends Model
{
    protected $table = "cities";
    
    protected $guarded = ["id"];

    public function state(){
        return $this->belongsTo('App\State');
    }
}
