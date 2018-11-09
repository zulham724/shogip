<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	$this->call([
            RolesTableSeeder::class,
            UsersTableSeeder::class,
            BiodatasTableSeeder::class,
            UmkmCategoryTableSeeder::class,
            StatesTableSeeder::class,
            CitiesTableSeeder::class,
            DistrictTableSeeder::class,
            UmkmTableSeeder::class,
            UmkmBiodataTableSeeder::class,
            UmkmAchievementTableSeeder::class,
            UmkmTrainingTableSeeder::class,
            ProductTableSeeder::class,
            ProductImageTableSeeder::class,
            LegalityTableSeeder::class,
            ProblemListsTableSeeder::class
            // $this->call(UsersTableSeeder::class);
            ]);
    }
}
