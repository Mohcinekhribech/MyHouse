<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    use HasFactory;
    public function house()
    {
        return $this->belongsTo(House::class,'id','houseId');
    }
    public function room()
    {
        return $this->hasMany(Room::class,'id','floorId');
    }
}
