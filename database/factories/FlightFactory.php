<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Airport;

class FlightFactory extends Factory
{

    public function definition(): array
    { 
        $transports = ['US-Bangla', 'Novo-Air', 'Emirates Airlines'];
        $durations = ['2.5', '4', '3', '3.5', '4.20'];
        $stops = ['0', '1', '2'];
        $prices = ['7500', '12000', '8200', '15200'];
        $toCities = Airport::pluck('city');
        $toAirports = Airport::pluck('name');

        return [
            'name'        => $this->faker->randomElement($transports),
            'number'      => $this->faker->postcode,
            'from_city'   => 'Dubai',
            'from_airport' => 'Dubai International Airport',
            'to_city'     => $toCities->random(),
            'to_airport'  => $toAirports->random(),
            'duration'    => $this->faker->randomElement($durations),
            'stops'       => $this->faker->randomElement($stops),
            'ticket_price' => $this->faker->randomElement($prices),
        ];
    }
}
