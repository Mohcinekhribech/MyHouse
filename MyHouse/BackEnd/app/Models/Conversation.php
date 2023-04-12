<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'owner_id'
    ];
    public function client()
    {
        return $this->belongsTo(Messages::class,'client_id','id');
    }
    public function owner()
    {
        return $this->belongsTo(Messages::class,'owner_id','id');
    }
    public function messages()
    {
       return $this->hasMany(Messages::class,'conversations_id','id');
    }

}
