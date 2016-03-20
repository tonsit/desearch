<?php

use Illuminate\Database\Seeder;

class SellersTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $faker = Faker\Factory::create();
        $limit = 40;
        for ($i = 0; $i < $limit; $i++) {
            DB::table('sellers')->insert([ //,
                'name' => $faker->name,
                'type' => $this->randomType($i),
                'address_street' => $faker->streetAddress,
                'address_city' => $faker->city,
                'address_state' => $faker->stateAbbr,
                'email' => $faker->unique()->safeEmail,
                'phone' => $faker->unique()->phoneNumber,
                'website' => $faker->url,
                'created_at' => $faker->dateTimeThisYear($max = '2016-02-29 23:59:59'),
                'updated_at' => $faker->dateTimeThisMonth($max = 'now'),
                'created_at_ip' => $faker->ipv6,
                'updated_at_ip' => $faker->ipv6]);
        }
    }

    public function randomType($i) {
        $r = $i % 3;
        switch ($r) {
            case 0: {
                    return 'Broker';
                }
            case 1: {
                    return 'Dealer';
                }
            case 2: {
                    return 'Private Party';
                }
        }
    }

}
