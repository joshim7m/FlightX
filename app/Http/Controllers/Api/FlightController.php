<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SearchFlightsRequest;

use App\Models\Flight;
use App\Http\Resources\FlightResource;

class FlightController extends Controller
{
  public function index(Request $request)
  {
    $flights = Flight::where('from_city', $request->fly_from)
              ->where('to_city', $request->fly_to)
              ->whereDate('departure_on', $request->departure)
              ->paginate(10);

    return FlightResource::collection($flights);
  }
}


// $flights = Flight::when(request('fly_from'), function($query){
//       $query->where('from_city', request('fly_from'));
//     })
//     ->when(request('fly_to'), function($query){
//       $query->where('to_city', request('fly_to'));
//     })
//     ->when(request('departure'), function($query){
//       $query->whereDate('departure_on', request('departure'));
//     })
//     ->paginate(10);