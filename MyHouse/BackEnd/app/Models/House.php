<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    use HasFactory;
    protected $fillable = [
        'Owner_id',
        'housePic',
        'floorNbrs',
        'description',
        'Location',
        'houseArea',
        'contractType',
        'housePrice',
        'houseTitle',
        'accepted',
    ];

    public function Floor()
    {
        return $this->hasMany(Floor::class,'houses_id','id');
    }
    public function Condition()
    {
        return $this->hasMany(Condition::class,'house_id','id');
    }

   
}
