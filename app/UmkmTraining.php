<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UmkmTraining extends Model
{
    protected $table = "umkm_trainings";
    
    protected $guarded = ["id"];

    public function umkm(){
        return $this->belongsTo('App\Umkm');
    }
}
