<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
     // protected $table = "biodatas";
    // protected $fillable = [
    //     'user_id', 'first_name', 'last_name', 'birth_of_date', 'province_id', 'city_id', 'district_id', 'identify_number',
    // ];
     protected $guarded = ["id"];
    public function user(){
        return $this->belongsTo('App\User');
    }
     
}
