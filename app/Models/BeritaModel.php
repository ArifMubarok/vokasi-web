<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeritaModel extends Model
{
    use HasFactory;

    protected $table = 'berita';

    protected $fillable = [
        'prodi_id',
        'judul',
        'slug', 
        'foto_header', 
        'konten', 
        'status',
        'isValidate' 
    ];

    public function berita_kategori()
    {
        return $this->hasMany(berita_kategori::class, foreignKey:'berita_id');
    }

    public function prodi()
    {
        return $this->belongsTo(Prodi::class);
    }
}
