<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class berita_kategori extends Model
{
    use HasFactory;

    protected $table = 'berita_kategori';

    protected $fillable = [
        'kategori_id',
        'berita_id'
    ];

    public function berita()
    {
        return $this->belongsTo(BeritaModel::class);
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
