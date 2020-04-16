<?php

namespace App\Http\Resources\PersonsResources;

use Illuminate\Http\Resources\Json\JsonResource;

class StudentsResource extends JsonResource
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
            'sfirst_name'   => $this->sfirst_name,
            'slast_name'    => $this->slast_name,
            'date_of_birth' => $this->date_of_birth,
            'image_path'    => $this->image_path,
            'former_school' => $this->former_school,
            'pfirst_name'   => $this->guardian->pfirst_name,
            'plast_name'    => $this->guardian->plast_name,
            'class_name'    => $this->classRooms->class_name,
            'status'        => $this->status,
        ];
    }
}
