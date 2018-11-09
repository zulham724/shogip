<?php

use Illuminate\Database\Seeder;
use App\Umkm;
use App\UmkmBiodata;
class UmkmBiodataTableSeeder extends Seeder
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
        		"year"=>"2018-05-04",
        		"founder"=>"Bagus",
        		"total_employes"=>"20",
        		"monthly_finance"=>"20000000"
        		
        	],

        	[
		    	"id"=>2,
        		"umkm_id"=>2,
        		"year"=>"2018-05-04",
        		"founder"=>"Asep",
        		"total_employes"=>"20",
        		"monthly_finance"=>"20000000"
        		
        	],
		];

        UmkmBiodata::insert($data);		
    }
}
