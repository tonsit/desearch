<?php

use Illuminate\Database\Seeder;

class VehicleMakesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for ($i = 0; $i < 9; $i++) {
            DB::table('vehicle_makes')->insert(['name' => $faker->word . 'Make']);
        }
    }
}
