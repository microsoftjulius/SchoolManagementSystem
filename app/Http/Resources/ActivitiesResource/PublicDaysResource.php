<?php

namespace App\Http\Resources\ActivitiesResource;

use Illuminate\Http\Resources\Json\JsonResource;

class PublicDaysResource extends JsonResource
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
            'public_day' => $this->public_day,
            'date'       => $this->date,
            'created_by' => $this->user->name,
            'created_at' => $this->created_at
        ];
    }
}
