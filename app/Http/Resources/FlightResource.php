<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FlightResource extends JsonResource
{

    public function toArray(Request $request): array
    {
        return [
          'name'          => $this->name,
          'number'        => $this->number,
          'from_city'     => $this->from_city,
          'from_airport'      => $this->from_airport,
          'to_city'       => $this->to_city,
          'to_airport'    => $this->to_airport,
          'departure_on'      => $this->departure_on,
          'arrival_on'    => $this->arrival_on,
          'duration'      => $this->duration,
          'stops'         => $this->stops,
          'ticket_price'  => $this->ticket_price,
        ];
    }
}
