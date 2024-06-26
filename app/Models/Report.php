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
        'kecamatan_id',
        'isi_aduan',
        'handling__statuses_id',
        'verification_statuses_id',
        'foto_lokasi',
        'isi_aduan_penyuluh',
        'foto_penyuluh',

        
        'tanggapan_penyuluh',
        'tanggapan_pemerintah',
    ];

    public function user(){
        return $this->belongsTo(User::class, "user_id");
    }

    public function handling_status(){
        return $this->belongsTo(Handling_Status::class, "handling__statuses_id");
    }
}
