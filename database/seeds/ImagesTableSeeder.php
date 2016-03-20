<?php

use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $faker = Faker\Factory::create();
        for ($l = 0; $l < 5; $l++) {
            for ($i = 1; $i < 41; $i++) {
                DB::table('images')->insert([
                    'listing_id' => $i,
                    'image_file' => 'http://lorempixel.com/640/480/transport/' . $faker->numberBetween($min = 1, $max = 10) . '/',
                    'created_at' => $faker->dateTimeThisYear($max = '2016-02-29 23:59:59'),
                    'updated_at' => $faker->dateTimeThisMonth($max = 'now'),
                    'created_at_ip' => $faker->ipv6,
                    'updated_at_ip' => $faker->ipv6
                ]);
            }
        }
    }
}
