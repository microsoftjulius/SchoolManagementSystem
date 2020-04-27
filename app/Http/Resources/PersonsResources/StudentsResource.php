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
            'parent'        => $this->guardian,
            'class_name'    => $this->classRooms,
            'status'        => $this->status,
            'marks'         => $this->subjects,
            'created_by'    => $this->user
        ];
    }
    public function with($request)
    {
        $fees = 0;
        for($i=0; $i<count($this->fees); $i++){
            $fees += $this->fees[$i]->amount; 
        }
        return [
                'fees' => $fees,
        ];
    }
}
