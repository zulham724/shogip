<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UmkmCategori extends Model
{
    protected $table = "umkm_categories";
    
     protected $guarded = ["id"];
     
    public function umkm(){
        return $this->belongsTo('App\Umkm');
    }
}
