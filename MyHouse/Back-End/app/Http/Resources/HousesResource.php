<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HousesResource extends JsonResource
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
            'id' => (string) $this->id,
            'Location' => $this->Location,
            'floors' => FloorsResource::collection($this->Floor),
            'homePic' => $this->homePic,
            'floorNbrs' => $this->floorNbrs,
            'created_at' =>$this->created_at,
            'updates_at' => $this->updated_at
        ];
    }
}
