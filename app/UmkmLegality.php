<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UmkmLegality extends Model
{
    protected $table = "umkm_legality";
    
    protected $guarded = ["id"];

    public function legality_list(){
    	return $this->belongsTo('App\LegalityList');
    }

}
