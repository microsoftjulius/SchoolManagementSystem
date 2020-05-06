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
            'stream_name'     => $this->streams->stream_name,
            'creators_name'   => $this->users['name'],
            'fclass_teacher'  => $this->teachers['efirst_name'],
            'lclass_teacher'  => $this->teachers['elast_name'],
            'students'        => $this->students,
            'fees_amount'     => number_format($this->fees_amount),
            'status'          => $this->status,
        ];
    }
}
