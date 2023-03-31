<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class House extends Model
{
    use HasFactory;
    protected $fillable = [
        'Home_Area',
        'Floor_Nbrs',
        'Location',
        'Home_Pic',
    ];

    public function floor()
    {
        return $this->hasMany(Floor::class,'id','houseId');
    }

   
}
