<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\LocationResource;
use App\Models\Location;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function getAllLocations()
    {
        $locations = Location::all();

        return LocationResource::collection($locations);
    }
}
