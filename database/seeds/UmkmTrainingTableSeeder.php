<?php

use Illuminate\Database\Seeder;
use App\UmkmTraining;
class UmkmTrainingTableSeeder extends Seeder
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
        		"name"=>"Pelatihan UMKM",
        		"description"=>"Makanan",
        		"date"=>"2018-05-06"
        	],

        	[
		    	"id"=>2,
		    	"umkm_id"=>2,
        		"name"=>"Pemasaran UMKM",
        		"description"=>"Makanan",
        		"date"=>"2018-05-06"
        	],
		];

        UmkmTraining::insert($data);		
    }
}
