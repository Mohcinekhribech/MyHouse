<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    use HasFactory;
    protected $fillable = [
        'conversations_id',
        'message',
        'user_id'
    ];

    public function conversations()
    {
        return $this->belongsTo(Conversation::class,'conversations_id','id');
    }
}
