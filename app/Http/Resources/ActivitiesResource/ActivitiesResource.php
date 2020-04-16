<?php

namespace App\Http\Resources\ActivitiesResource;

use Illuminate\Http\Resources\Json\JsonResource;

class ActivitiesResource extends JsonResource
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
            'created_by' => $this->user->name,
            'activity'   => $this->activity,
            'date'       => $this->date
        ];
    }
}
