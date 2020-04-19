<?php

namespace App\Http\Resources\AccademicsResource;

use Illuminate\Http\Resources\Json\JsonResource;

class PastPapersResource extends JsonResource
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
            'year'       => $this->year,
            'class_id'   => $this->classRoom->class_name,
            'subject_id' => $this->subject->subject_name,
            'created_by' => $this->user->name,
            'paper_path' => $this->paper_path,
            'created_at' => $this->created_at
        ];
    }
}
