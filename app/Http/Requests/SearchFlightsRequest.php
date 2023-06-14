<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchFlightsRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'from_city' => 'required',
            'to_city' => 'required',
            'departure_on' => 'required'
        ];
    }
}
