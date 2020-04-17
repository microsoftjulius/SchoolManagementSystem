<?php

namespace App\Http\Resources\MessagesPackage;

use Illuminate\Http\Resources\Json\JsonResource;

class MessagesResource extends JsonResource
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
            'message'         => $this->message,
            'date_of_sending' => $this->date_of_sending,
            'recievers_group' => $this->personalGroup->group_name,
            'senders_id'      => $this->user->name
        ];
    }
}
