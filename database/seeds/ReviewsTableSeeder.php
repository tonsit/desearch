<?php

use Illuminate\Database\Seeder;

class ReviewsTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $faker = Faker\Factory::create();
        $x = 1;
        while ($x < 5) {
            for ($i = 1; $i < 41; $i++) {
                DB::table('reviews')->insert([
                    'seller_id' => $i,
                    'name' => $faker->name,
                    'description' => $faker->text($maxNbChars = 200),
                    'rating' => $faker->numberBetween($min = 1, $max = 5),
                    'created_at' => $faker->dateTimeThisYear($max = '2016-02-29 23:59:59'),
                    'updated_at' => $faker->dateTimeThisMonth($max = 'now'),
                    'created_at_ip' => $faker->ipv6,
                    'updated_at_ip' => $faker->ipv6
                ]);
            }
            $x++;
        }
    }

}
