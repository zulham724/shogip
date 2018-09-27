<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
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
                "role_id"=>1,
                "name"=>"admin",
                "email"=>"admin@admin.com",
                "password"=>bcrypt("password")
            ]
           
        ];
        User::insert($data);
    }
}
