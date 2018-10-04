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
        //json
        // $jsonCities = File::get(database_path('json/cities.json'));
        // $dataCities = json_decode($jsonCities);
        // $dataCities = collect($dataCities);
        // foreach ($dataCities as $d) {
        //     $d = collect($d)->toArray();
        //     $city = new City();
        //     $city->id = $d['city_id'];
        //     $city->state_id = $d['province_id'];
        //     $city->name = $d['city_name'];
        //     $city->save();
        // }

        $file = fopen(database_path('csv/productimages.csv'),"r");
        $data = array();
        while (($row = fgetcsv($file, 0, ",")) !== FALSE) {
            $data[] = $row;
        }
        foreach ($data as $d) {
            $s = new ProductImage();
            $s->id = $d[0];
            $s->product_id = $d[1];
            $s->image = $d[2];
            $s->name = $d[3];
            $s->description = $d[4];
            $s->save();
        }
    }
}
