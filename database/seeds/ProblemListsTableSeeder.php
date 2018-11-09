<?php

use Illuminate\Database\Seeder;
use App\ProblemList;

class ProblemListsTableSeeder extends Seeder
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
        		"name"=>"Pemasaran"
        	],[
        		"name"=>"Permodalan"
        	],[
        		"name"=>"Legalitas"
        	],[
        		"name"=>"SDM"
        	],[
        		"name"=>"Alat / Produksi"
        	],[
        		"name"=>"Lainnya"
        	]
        ];

        ProblemList::insert($data);
    }
}
