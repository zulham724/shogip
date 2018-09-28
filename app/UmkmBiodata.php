<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UmkmBiodata extends Model
{
    protected $table = "umkm_biodatas";
    
    protected $guarded = ["id"];

    public function umkm(){
        return $this->belongsTo('App\Umkm');
    }
}
