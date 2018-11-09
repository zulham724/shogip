<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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

    public function legality_lists(){
        return $this->hasMany('App\LegalityList');
    }

    public function district(){
        return $this->belongsTo('App\District');
    }

    public function umkmachievements(){
        return $this->hasMany('App\UmkmAchievement');
    }
    public function umkmatrainings(){
        return $this->hasMany('App\UmkmTraining');
    }
    public function umkm_biodata(){
        return $this->hasOne('App\UmkmBiodata');
    }
    public function products(){
        return $this->hasMany('App\Product');
    }

    public function umkm_problems(){
        return $this->hasMany('App\UmkmProblem');
    }
    



}
