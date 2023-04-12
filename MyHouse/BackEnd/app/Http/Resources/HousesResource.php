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
            'housePic' => $this->housePic,
            'floorNbrs' => $this->floorNbrs,
            'conditions' => $this->Condition,
            'Owner_id' => $this->Owner_id,
            'description' => $this->description,
            'houseArea' => $this->houseArea,
            'contractType' => $this->contractType,
            'housePrice' => $this->housePrice,
            'houseTitle' => $this->houseTitle,
            'created_at' => $this->created_at,
            'updates_at' => $this->updated_at
        ];
    }
}
