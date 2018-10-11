<?php

use Illuminate\Database\Seeder;
use App\Role;

class RolesTableSeeder extends Seeder
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
        		"name"=>"admin",
        		"description"=>"Superadmin"
        	],
            [
                "id"=>2,
<<<<<<< HEAD
                "name"=>"UMKM",
                "description"=>"umkm"
=======
                "name"=>"umkm",
                "description"=>"UMKM"
>>>>>>> 92cb2a064f4b7ffb88dd348e30a7079fe8e7297e
            ],
		];

        Role::insert($data);		
    }
}
