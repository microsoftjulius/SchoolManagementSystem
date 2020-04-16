<?php

namespace App\Http\Resources\ClassesResources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClassRooms extends JsonResource
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
            'stream_name'    => $this->streams->stream_name,
            'creators_name'  => $this->users->name,
            'status'         => $this->status
        ];
    }
}
