<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notifikasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'to_id',
        'title',
        'report_id',
        'read_at',
    ];

    public function profile(){
        return $this->belongsTo(Profile::class, 'user_id');
    }
    public function report(){
        return $this->belongsTo(Report::class, 'report_id');
    }
}
