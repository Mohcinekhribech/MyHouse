<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    use HasFactory;
    protected $fillable = [
        'homeArea',
        'floorNbrs',
        'Location',
        'homePic',
    ];

    public function Floor()
    {
        return $this->hasMany(Floor::class,'houses_id','id');
    }

   
}
