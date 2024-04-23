<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'from_id',
        'to_id',
        'body',
    ];
    public function profile(){
        return $this->belongsTo(Profile::class, "user_id");
    }
}
