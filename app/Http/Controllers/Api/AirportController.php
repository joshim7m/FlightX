<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Airport;
use App\Http\Resources\AirportResource;

class AirportController extends Controller
{
    public function index()
    {
      $airports = Airport::when(request('search_airport'), function($query){
        $query->where(function($q){
          $q->where('name', 'like', '%'.request('search_airport').'%')
            ->orWhere('city', 'like', '%'. request('search_airport'). '%')
            ->orWhere('abbr', 'like', ''. request('search_airport'). '%');
        });
      })->paginate(10);

      return AirportResource::collection($airports);
    }

    public function show(Airport $airport)
    {
      return new AirportResource($airport);
    }
}
