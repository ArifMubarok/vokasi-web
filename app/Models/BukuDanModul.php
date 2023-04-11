<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuDanModul extends Model
{
    use HasFactory;

    protected $table = 'buku';

    protected $fillable = [
        'prodi_id',
        'penulis',
        'judul',
        'cover',
        'deskripsi',
        'link'
    ];

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }
}
