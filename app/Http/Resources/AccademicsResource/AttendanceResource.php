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
            'first_name'              => $this->student->sfirst_name,
            'last_name'               => $this->student->slast_name,
            'class_name'              => $this->classRoom->class_name,
            'subject_name'            => $this->subjects->subject_name,
            'subject_code'            => $this->subjects->subject_code,
            'teacher_first_name'      => $this->teacher->efirst_name,
            'teacher_last_name'       => $this->teacher->elast_name
        ];
    }
}
