<?php

namespace App\Http\Resources\PersonsResources;

use Illuminate\Http\Resources\Json\JsonResource;

class ParentsResource extends JsonResource
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
            'first_name'    => $this->first_name,
            'last_name'     => $this->last_name,
            'date_of_birth' => $this->date_of_birth,
            'image_path'    => $this->image_path,
            'RelationShip'  => $this->RelationShip,
            'District'      => $this->District,
            'Village'       => $this->Village,
            'national_id'   => $this->NIN,
            'Telephone'     => $this->Telephone 
        ];
    }
}
