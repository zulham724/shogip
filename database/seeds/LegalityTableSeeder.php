<?php

use Illuminate\Database\Seeder;
use App\LegalityList;

class LegalityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
		    [
		    	"id"=>1,
        		"name"=>"SIUP",
        	],

        	[
		    	"id"=>2,
        		"name"=>"PIRT",
        	],
        	[
		    	"id"=>3,
        		"name"=>"HALAL",
        	],
        	[
		    	"id"=>4,
        		"name"=>"HKI",
        	],
        	[
		    	"id"=>5,
        		"name"=>"TDP",
        	],
        	[
		    	"id"=>6,
        		"name"=>"IUMK",
        	],
        	[
		    	"id"=>7,
        		"name"=>"BPOM",
        	],
		];
		LegalityList::insert($data);
    }
}
