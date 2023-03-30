<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Airport;

use Faker\Factory as Faker;

class AirportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 50; $i++) {
            Airport::create([
                'name' => $faker->unique()->company,
                'code' => $faker->unique()->regexify('[A-Z]{3}'),
                'city' => $faker->city
            ]);
        }
    }
}
