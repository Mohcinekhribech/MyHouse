<?php

namespace App\Http\Resources;

use App\Http\Resources\MessagesResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ConversationsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'client_id'=>$this->client_id,
            'owner_id'=>$this->owner_id,
            'client'=>$this->client,
            'owner'=>$this->owner,
            'messages'=>MessagesResource::collection($this->messages)
        ];
    }
}
