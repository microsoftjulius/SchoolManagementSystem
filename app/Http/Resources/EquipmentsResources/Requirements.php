<?php

namespace App\Http\Resources\EquipmentsResources;

use Illuminate\Http\Resources\Json\JsonResource;

class Requirements extends JsonResource
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
            'created_by' => $this->user->name,
            'requirement_name'      => $this->requirement_name,
            'number_of_items'       => $this->number_bought,
            'student_first_name'    => $this->student->sfirst_name,
            'student_last_name'     => $this->student->slast_name
        ];
    }
}
