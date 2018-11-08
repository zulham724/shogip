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
   		$file = fopen(database_path('csv/districts.csv'),"r");
            $data = array();
            while (($row = fgetcsv($file, 0, ",")) !== FALSE) {
                $data[] = $row;
            }
            foreach ($data as $d) {
                $s = new District();
                $s->id = $d[0];
                $s->city_id = $d[1];
                $s->name = $d[3];
                $s->save();
            }
        }		
    }
}
