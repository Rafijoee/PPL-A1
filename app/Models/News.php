<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class News extends Model
{
    use HasFactory;
    use sluggable;

    protected $fillable = [
        'judul_berita',
        'slug',
        'image',
        'isi_berita',
        'user_id'
    ];

    public function sluggable(): array
    {
        return[
            'slug' => [
                'source' => 'judul_berita'
            ]
        ];
    }
}
