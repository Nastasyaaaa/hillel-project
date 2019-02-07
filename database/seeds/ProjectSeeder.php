<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        for($i = 0; $i < 10; $i++) {
            DB::table('country')->insert([
                'name' => $faker->country
            ]);

            DB::table('city')->insert([
                'name' => $faker->city
            ]);

            DB::table('street')->insert([
                'name' => $faker->streetAddress
            ]);

            DB::table('adress')->insert([
                'country_id' => rand(1, $i + 1),
                'city_id' => rand(1, $i + 1),
                'street_id' => rand(1, $i + 1)
            ]);

            DB::table('user')->insert([
                'firstname' => $faker->firstName,
                'lastname' => $faker->lastName,
                'adress_id' => rand(1, $i + 1)
            ]);
        }
    }
}
