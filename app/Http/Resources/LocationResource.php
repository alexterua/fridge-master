<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LocationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'countOfFreeBlocks' => $this->getCountOfFreeBlocks($this),
        ];
    }

    private function getCountOfFreeBlocks(LocationResource $resource) : int
    {
        $countOfFreeBlocks = 0;
        $premises = $resource->premises;
        foreach ($premises as $premis) {
            $blocks = $premis->blocks;
            foreach ($blocks as $block) {
                if ($block->is_free === 1)
                    $countOfFreeBlocks++;
            }
        }
        return $countOfFreeBlocks;
    }
}
