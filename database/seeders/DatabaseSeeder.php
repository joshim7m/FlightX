<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use \Database\Seeders\AirportSeeder;
use \Database\Seeders\FlightSeeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        $this->call([
          AirportSeeder::class,
          FlightSeeder::class,
        ]);
    }
}
