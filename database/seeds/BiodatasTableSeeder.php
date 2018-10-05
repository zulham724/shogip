<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Biodata;

class BiodatasTableSeeder extends Seeder
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
        		"user_id"=>1,
        		"first_name"=>"Ujang",
        		"last_name"=>"Kayang",
        		"birth_of_date"=>"2018-05-04",
        		"province_id"=>"Jawa Tengah",
        		"city_id"=>"Semarang",
        		"district_id"=>"Gunung Pati",
        		"identify_number"=>"45252"

        	],

        	[
		    	"id"=>2,
        		"user_id"=>1,
        		"first_name"=>"Ujang",
        		"last_name"=>"Kayang",
        		"birth_of_date"=>"2018-05-04",
        		"province_id"=>"Jawa Tengah",
        		"city_id"=>"Semarang",
        		"district_id"=>"Gunung Pati",
        		"identify_number"=>"45252"
		],

        	];
        Biodata::insert($data);		
    }
}
