<?php

namespace App\Http\Resources\AccademicsResource;

use Illuminate\Http\Resources\Json\JsonResource;

class TimeTablesResource extends JsonResource
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
            'class_name'      => $this->classroom->class_name,
            'time_table_link' => $this->time_table,
            'created_by'      => $this->user->name,
        ];
    }
}
