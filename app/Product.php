<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // protected $table = "products";
    
    protected $guarded = ["id"];

    public function umkm(){
        return $this->belongsTo('App\Umkm');
    }
    public function product_images(){
        return $this->hasMany('App\ProductImage');
    }
}
