<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\CalculateRequest;
use App\Http\Resources\LocationResource;
use App\Models\Block;
use App\Models\Booking;
use App\Models\Location;

class IndexController extends Controller
{
    public function getAllLocations()
    {
        $locations = Location::all();

        return LocationResource::collection($locations);
    }

    public function getLocationById(int $id)
    {
        $location = Location::find($id);

        return new LocationResource($location);
    }

    public function calculate(int $id, CalculateRequest $request)
    {
        $data = $request->validated();

        $productVolume = $data['product_volume'];
        $calculateCountOfBlocks = ceil($productVolume / Block::DEFAULT_PRODUCT_VOLUME);

        $expirationDate = $data['expiration_date'];

        // toDO price is not static (data stub)
        $price = 100;
        $storageCost = $price * $expirationDate;

        $location = Location::find($id);
        $storageTemperature = $data['storage_temperature'];

        $countOfFreeBlocks = $location->getCountOfFreeBlocksWithTemperature($storageTemperature);

        if ($calculateCountOfBlocks <= $countOfFreeBlocks) {
            $dataResponse['product_volume'] = $productVolume;
            $dataResponse['storage_temperature'] = $storageTemperature;
            $dataResponse['expiration_date'] = $expirationDate;
            $dataResponse['count_of_blocks'] = $calculateCountOfBlocks;
            $dataResponse['storage_cost'] = $storageCost;

            return response()->json($dataResponse);
        }

        return response('The required number of free blocks is missing', 403);
    }

    public function createBooking(int $id, CalculateRequest $request)
    {
        $data = $this->calculate($id, $request);
        $data = json_decode($data->content(), true);
        // toDO $data['user_id'] = auth()->user->id (data stub)
        $data['user_id'] = 1;
        $data['status'] = Booking::STATUS_WAITING;
        $data['access_code'] = substr(str_shuffle("0123456789abcdefghijklmnopqrstvwxyz"), 0, 12);
        $booking = Booking::create($data);

        return response()->json($booking);
    }
}
