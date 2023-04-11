<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fasilitasRuang extends Model
{
    use HasFactory;

    protected $table = 'fasilitas_ruang';

    protected $guarded = ['id'];

    public function ruang()
    {
        return $this->belongsTo(Ruang::class);
    }
}