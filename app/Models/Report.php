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
        'user_id',
        'alamat',
        'isi_aduan',
        'handling__statuses_id',
        'verification_statuses_id',
        'foto_lokasi',
        'foto_penyuluh',
        'tanggapan_penyuluh',
        'tanggapan_pemerintah',
    ];

    public function user(){
        return $this->belongsTo(User::class, "user_id");
    }

}
