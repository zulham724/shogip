<?php

use Illuminate\Database\Seeder;
use App\Product;
class ProductTableSeeder extends Seeder
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
        		"name"=>"Jus Kacang Ijo",
        		"description"=>"Kerajinan"
        	],

        	[
		    	"id"=>2,
        		"umkm_id"=>2,
        		"name"=>"Jus Sawi",
        		"description"=>"Kerajinan"
        	],
		];

        Product::insert($data);		
    }
}
