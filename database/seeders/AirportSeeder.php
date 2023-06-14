<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Airport;

class AirportSeeder extends Seeder
{
    public function run(): void
    {
      Airport::create(['name' => 'Hazrat Shahjalal International Airport', 'city' => 'Dhaka', 'abbr' => 'DAC']);
      Airport::create(['name' => 'Cox\'s Bazar Airport', 'city' => 'Cox\'s Bazar', 'abbr' => 'CXB']);
      Airport::create(['name' => 'Indira Gandhi International Airport', 'city' => 'Delhi', 'abbr' => 'DEL']);
      Airport::create(['name' => 'Chennai International Airport', 'city' => 'Chennai', 'abbr' => 'MAA']);
      Airport::create(['name' => 'Netaji Subhash Chandra Bose International Airport', 'city' => 'Kolkata', 'abbr' => 'CCU']);
      Airport::create(['name' => 'Pune International Airport', 'city' => 'Pune', 'abbr' => 'PNQ']);
      Airport::create(['name' => 'Chhatrapati Shivaji Maharaj International Airport', 'city' => 'Mumbai', 'abbr' => 'BOM']);
      Airport::create(['name' => 'Tribhuvan International Airport', 'city' => 'Kathmandu', 'abbr' => 'KTM']);
      Airport::create(['name' => 'Suvarnabhumi International Airport', 'city' => 'Bangkok', 'abbr' => 'BKK']);
      Airport::create(['name' => 'Kuala Lumpur International Airport', 'city' => 'Kuala Lumpur', 'abbr' => 'KUL']);
      Airport::create(['name' => 'Singapore Changi Airport', 'city' => 'Changi Singapore', 'abbr' => 'SIN']);
      Airport::create(['name' => 'Abu Dhabi International Airport', 'city' => 'Abu Dhabi', 'abbr' => 'AUH']);
      Airport::create(['name' => 'Dubai International Airport', 'city' => 'Dubai', 'abbr' => 'DXB']);
    }
}
