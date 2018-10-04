<?php

use Illuminate\Database\Seeder;
use App\UmkmCategori;

class UmkmCategoryTableSeeder extends Seeder
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
        		"name"=>"Food",
        		"description"=>"Makanan"
        	],

        	[
		    	"id"=>2,
        		"name"=>"Craft",
        		"description"=>"Kerajinan"
        	],
		];

        UmkmCategori::insert($data);		
    }
}
