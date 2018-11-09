<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UmkmProblem extends Model
{
    protected $guarded = ["id"];

    public function problem_list(){
    	return $this->belongsTo('App\ProblemList');
    }
}
