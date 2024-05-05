<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama',
        'nik',
        'no_hp',
        'alamat',
        'kecamatan_id'
    ];
    public function kecamatan(){
        return $this->hasMany(Kecamatan::class);
    }

    public function user(){
        return $this->hasOne(User::class);
    }
}
