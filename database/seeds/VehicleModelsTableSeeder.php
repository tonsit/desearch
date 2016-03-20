<?php

use Illuminate\Database\Seeder;

class VehicleModelsTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $faker = Faker\Factory::create();
        for ($i = 1; $i < 10; $i++) {
            for ($l = 0; $l < 9; $l++) {
                DB::table('vehicle_models')->insert(['name' => $faker->word . 'Model', 'vehicle_make_id' => $i]);
            }
        }
    }
}
