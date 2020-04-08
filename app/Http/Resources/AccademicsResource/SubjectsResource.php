<?php

namespace App\Http\Resources\AccademicsResource;

use Illuminate\Http\Resources\Json\JsonResource;

class SubjectsResource extends JsonResource
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
            'subject_name'       => $this->subject_name,
            'subject_code'       => $this->subject_code,
            'teacher_first_name' => $this->first_name,
            'teacher_first_name' => $this->last_name
        ];
    }
}
