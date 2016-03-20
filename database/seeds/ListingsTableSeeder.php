<?php

use Illuminate\Database\Seeder;

class ListingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $limit = 40;
        for ($i = 0; $i < $limit; $i++) {
            DB::table('listings')->insert([
            'seller_id' => $faker->numberBetween($min = 1, $max = 40),
            'year' => $faker->year($max = 'now'),
            'vehicle_model_id' => $faker->numberBetween($min = 1, $max = 81),
            'vehicle_type' => $faker->numberBetween($min = 1, $max = 4),
            'description' => $faker->text($maxNbChars = 200),
            'price' => $faker->numberBetween($min = 100, $max = 100000),
            'meta_data' => $faker->text($maxNbChars = 150),
            'created_at' => $faker->dateTimeThisYear($max = '2016-02-29 23:59:59'),
            'updated_at' => $faker->dateTimeThisMonth($max = 'now'),
            'created_at_ip' => $faker->ipv6,
            'updated_at_ip' => $faker->ipv6
            ]);
        }
    }
}
