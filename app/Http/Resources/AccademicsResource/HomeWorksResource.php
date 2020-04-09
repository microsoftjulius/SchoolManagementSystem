<?php

namespace App\Http\Resources\AccademicsResource;

use Illuminate\Http\Resources\Json\JsonResource;

class HomeWorksResource extends JsonResource
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
            'class_id'   => $this->class_id,
            'subject_id' => $this->subject_id,
            'created_by' => $this->created_by,
            'paper_path' => $this->paper_path
        ];
    }
}
