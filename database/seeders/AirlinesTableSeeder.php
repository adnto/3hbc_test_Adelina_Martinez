<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Airline;
use Faker\Factory as Faker;



class AirlinesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) {
            Airline::create([
                'name' => $faker->company,
                'code' => $faker->unique()->regexify('[A-Z]{3}'),
            ]);
        }
    }
}
