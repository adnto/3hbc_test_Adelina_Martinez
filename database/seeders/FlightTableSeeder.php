<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Flight;
use App\Models\Airport;
use App\Models\Airline;

class FlightTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        // Obtener ids de aeropuertos y aerolíneas
        $airportIds = Airport::pluck('id')->toArray();
        $airlineIds = Airline::pluck('id')->toArray();

        // Crear 50 vuelos ficticios
        for ($i = 0; $i < 50; $i++) {
            $flight = new Flight([
                'code' => $faker->unique()->randomNumber(4),
                'type' => $faker->randomElement(['PASSENGER', 'FREIGHT']),
                'departure_id' => $faker->randomElement($airportIds),
                'destination_id' => $faker->randomElement($airportIds),
                'departure_time' => $faker->dateTimeBetween('-1 week', '+1 week'),
                'arrival_time' => $faker->dateTimeBetween('-1 week', '+1 week'),
                'airline_id' => $faker->randomElement($airlineIds),
            ]);
            $flight->save();
        }
    }
}
