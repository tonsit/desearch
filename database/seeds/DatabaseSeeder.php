<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SellersTableSeeder::class);
        $this->call(VehicleMakesTableSeeder::class);
        $this->call(VehicleModelsTableSeeder::class);
        $this->call(ListingsTableSeeder::class);
        $this->call(ReviewsTableSeeder::class);
        $this->call(ImagesTableSeeder::class);
    }
}
