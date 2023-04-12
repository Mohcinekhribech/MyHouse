<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Condition extends Model
{
    use HasFactory;
    protected $fillable = [
        'condition',
        'house_id'
    ];
    public function House()
    {
        return $this->belongsTo(House::class,'houses_id','id');
    }

}
