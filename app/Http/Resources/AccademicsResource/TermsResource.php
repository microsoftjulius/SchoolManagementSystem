<?php

namespace App\Http\Resources\AccademicsResource;

use Illuminate\Http\Resources\Json\JsonResource;

class TermsResource extends JsonResource
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
            'term'          => $this->term,
            'year'          => $this->year,
            'duration'      => $this->duration,
            'created_at'    => $this->created_at
        ];
    }
}
