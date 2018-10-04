<?php

use Illuminate\Database\Seeder;
use App\UmkmAchievement;
class UmkmAchievementTableSeeder extends Seeder
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
		    	"umkm_id"=>1,
        		"name"=>"The Best UMKM",
        		"description"=>"Makanan",
        		"date"=>"2018-05-06"
        	],

        	[
		    	"id"=>2,
		    	"umkm_id"=>2,
        		"name"=>"Is The Best",
        		"description"=>"Makanan",
        		"date"=>"2018-05-06"
        	],
		];

        UmkmAchievement::insert($data);		
    }
}
