<?php

namespace App\Http\Resources\AccademicsResource;

use Illuminate\Http\Resources\Json\JsonResource;

class ExamMarksResource extends JsonResource
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
        'subject_name'  => $this->subject_name,
        'student_fname' => $this->first_name,
        'student_lname' => $this->first_name,
        'marks'         => $this->marks,
        'comment'       => $this->comment,
        'created_by'    => $this->created_by,
        'class_id'      => $this->class_id,
        ];
    }
}
