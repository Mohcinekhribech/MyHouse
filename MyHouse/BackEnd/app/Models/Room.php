<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $fillable = [
        'RoomArea',
        'RoomPic',
        'RoomType',
        'WindowsNbrs',
        'floors_id'
    ];
    public function Floor()
    {
        return $this->belongsTo(Floor::class,'floors_id','id');
    }
}