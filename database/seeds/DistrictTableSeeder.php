<?php

use Illuminate\Database\Seeder;
use App\District;

class DistrictTableSeeder extends Seeder
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
        		"city_id"=>3374,
        		"name"=>"Semarang",
        		"description"=>"Kerajinan"
        	],

        	[
		    	"id"=>2,
        		"city_id"=>3374,
        		"name"=>"Gunung Pati",
        		"description"=>"Kerajinan"
        	],
		];

        District::insert($data);		
    }
}
