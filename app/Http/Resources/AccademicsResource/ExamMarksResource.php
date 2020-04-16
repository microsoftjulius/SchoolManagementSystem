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
        'subject_name'  => $this->subjects->subject_name,
        'student_fname' => $this->students->sfirst_name,
        'student_lname' => $this->students->slast_name,
        'marks'         => $this->marks,
        'comment'       => $this->comment,
        'created_by'    => $this->users->name,
        'class_id'      => $this->classRooms->class_name,
        ];
    }
}
