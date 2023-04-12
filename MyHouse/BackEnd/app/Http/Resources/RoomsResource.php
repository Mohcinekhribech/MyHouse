<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RoomsResource extends JsonResource
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
            'RoomArea' => (string) $this->RoomArea,
            'RoomPic' => (string) $this->RoomPicRoomPic,
            'RoomType' => (string) $this->RoomTypeRoomType,
            'WindowsNbrs' => (string) $this->WindowsNbrs,
            'floor_id' => (string) $this->floor_id,
        ];
    }
}
