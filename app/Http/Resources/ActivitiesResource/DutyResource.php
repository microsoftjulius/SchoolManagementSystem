<?php

namespace App\Http\Resources\ActivitiesResource;

use Illuminate\Http\Resources\Json\JsonResource;

class DutyResource extends JsonResource
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
            'created_by'            => $this->user->name,
            'teacher_first_name'    => $this->teacher->efirst_name,
            'teacher_last_name'     => $this->teacher->elast_name,
            'term'                  => $this->term->term,
            'week'                  => $this->week
        ];
    }
}
