<?php

namespace App\Http\Resources\AccademicsResource;

use Illuminate\Http\Resources\Json\JsonResource;

class AttendanceResource extends JsonResource
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
            'first_name'   => $this->first_name,
            'last_name'    => $this->last_name,
            'class_name'   => $this->class_name,
            'subject_name' => $this->subject_name
        ];
    }
}