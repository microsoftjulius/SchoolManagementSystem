<?php

namespace App\Http\Resources\AccountingsResource;

use Illuminate\Http\Resources\Json\JsonResource;

class FeesResource extends JsonResource
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
            'first_name'  => $this->student->sfirst_name,
            'last_name'   => $this->student->slast_name,
            'term'        => $this->term['term'],
            'amount'      => $this->amount,
            'recieved_by' => $this->user->name
        ];
    }

    public function with($request)
    {
        
        return [
            'meta' => [
                'key' => 'value',
            ],
        ];
    }
}
