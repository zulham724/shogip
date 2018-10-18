<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LegalityList extends Model
{
    protected $table = "legality_list";
    
    protected $guarded = ["id"];
}
