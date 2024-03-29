<?php

namespace App\Http\Resources\ClassesResources;

use Illuminate\Http\Resources\Json\JsonResource;

class Streams extends JsonResource
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
            'stream_name'    => $this->stream_name,
            'creators_name'  => $this->users->name,
            'status'         => $this->status
        ];
    }
}
