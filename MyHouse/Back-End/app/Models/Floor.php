<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Floor extends Model
{
    use HasFactory;
    protected $fillable = [
        'houses_id'
    ];
    public function House()
    {
        return $this->belongs(House::class,'houses_id','id');
    }
    public function Room()
    {
        return $this->hasMany(Room::class,'floors_id','id');
    }
}
