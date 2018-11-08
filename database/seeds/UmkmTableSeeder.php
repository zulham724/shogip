<?php

use Illuminate\Database\Seeder;
use App\Umkm;
class UmkmTableSeeder extends Seeder
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
        		"umkm_category_id"=>1,
        		"state_id"=>33,
        		"city_id"=>3374,
        		"district_id"=>3301010,
        		"name"=>"Futaba",
                "business_form"=>"CV",
        		"description"=>"Kerajinan",
        		"address"=>"semarang",
        		"cp"=>"089665349961",
        		"web"=>"Craft",
        		"facebook"=>"Kerajinan",
        		"twitter"=>"Craft",
        		"instagram"=>"Kerajinan",
        		"latitude"=>"Craft",
        		"longitude"=>"Kerajinan"

        	],

        	[
		    	"id"=>2,
        		"user_id"=>1,
        		"umkm_category_id"=>2,
        		"state_id"=>33,
        		"city_id"=>3374,
        		"district_id"=>3301010,
        		"name"=>"Its Milk",
                "business_form"=>"CV",
        		"description"=>"Kerajinan",
        		"address"=>"semarang",
        		"cp"=>"089665349961",
        		"web"=>"Craft",
        		"facebook"=>"Kerajinan",
        		"twitter"=>"Craft",
        		"instagram"=>"Kerajinan",
        		"latitude"=>"Craft",
        		"longitude"=>"Kerajinan"
        	],
		];

        Umkm::insert($data);		
    }
}
