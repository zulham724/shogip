<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UmkmAchievement extends Model
{
    protected $table = "umkm_achievements";
    
    protected $guarded = ["id"];

    public function umkm(){
        return $this->belongsTo('App\Umkm');
    }
}
