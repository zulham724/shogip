<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\ProductImage;

class ProductImageTableSeeder extends Seeder
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
                "product_id"=>1,
                "image"=>"Jus.jpg",
                "description"=>"Kerajinan"
            ],

            [
                "id"=>2,
                "product_id"=>2,
                "image"=>"Sawi.jpg",
                "description"=>"Kerajinan"
            ],
        ];

        ProductImage::insert($data);     
    }
}
