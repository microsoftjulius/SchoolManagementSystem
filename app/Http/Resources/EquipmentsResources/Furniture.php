<?php

namespace App\Http\Resources\EquipmentsResources;

use Illuminate\Http\Resources\Json\JsonResource;

class Furniture extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'created_by' => $this->user
        ];
    }
}
