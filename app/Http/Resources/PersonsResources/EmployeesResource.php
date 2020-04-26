<?php

namespace App\Http\Resources\PersonsResources;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeesResource extends JsonResource
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
            'efirst_name'   => $this->efirst_name,
            'elast_name'    => $this->elast_name,
            'date_of_birth' => $this->date_of_birth,
            'image_path'    => $this->image_path,
            'District'      => $this->District,
            'Village'       => $this->Village,
            'NIN'           => $this->NIN,
            'Telephone'     => $this->Telephone,
            'role'          => $this->role,
            'status'        => $this->status,
            'created_by'    => $this->user->name
        ];
    }
}
