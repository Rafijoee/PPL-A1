<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Report extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul_laporan',
        'alamat',
        'isi_aduan',
    ];

    public function user(){
        return $this->belongsTo(User::class, "user_id");
    }

}
